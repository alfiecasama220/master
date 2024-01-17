<?php 

  require_once("connection.php");
  session_start();

  $not = null;
  if(isset($_POST['submit'])) {
    $form_name = $_POST['form_name'];
    $form_email = $_POST['form_email'];
    $form_choose_username = $_POST['form_choose_username'];
    $form_choose_password = $_POST['form_choose_password'];
    $form_re_enter_password = $_POST['form_re_enter_password'];

    if($form_choose_password != $form_re_enter_password) {
      $not = "PASSWORD DON'T MATCH";
    } else {
      $securityPassword = password_hash($form_choose_password, PASSWORD_DEFAULT);
      $database = "INSERT INTO client(Name, Email, Username, Password) values('$form_name', '$form_email', '$form_choose_username', '$securityPassword')";
      $result = mysqli_query($connection, $database);

      if($result) {
        $redirect = $_SERVER['PHP_SELF'];
        $successMessage = true;
        header("Location: $redirect?success=$successMessage");
      }
    }


  }


  if(isset($_POST['login'])) {
    $form_username_email = $_POST['form_username_email']; 
    $form_password = $_POST['form_password'];

    // $password = password_verify($form_password, PASSWORD_BCRYPT);

    $databaseLogin = mysqli_query($connection, "SELECT * FROM client WHERE Email = '$form_username_email' or Username = '$form_username_email'");
    $login = mysqli_fetch_assoc($databaseLogin);

    if(is_array($login)) {

      $_SESSION['username'] = $login['Username'];
      $_SESSION['id'] = $login['clientID'];  
      $passwordVerify = $login['Password'];

      if(password_verify($form_password, $passwordVerify)) {
        $_SESSION['logged'] = true;
        $loginSuccess = true;
        header("Location: index.php?logged=$loginSuccess");
      } else {
        $invalid = "Invalid Username or Password";
      }
      
    } 
  }

?>



<!DOCTYPE html>
<html dir="ltr" lang="en">
<!-- HEAD -->
<?php require_once("head.php") ?>
<!-- /HEAD -->
<body class="container-1340px has-side-panel side-panel-right">
<!-- preloader -->
<div id="preloader">
  <div id="spinner">
    <div class="preloader-dot-loading">
      <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
    </div>
  </div>
  <div id="disable-preloader" class="btn btn-default btn-sm bg-white-f5">Disable Preloader</div>
</div>
<div class="side-panel-body-overlay"></div>
<div id="side-panel-container" class="dark" data-tm-bg-img="images/side-push-bg.jpg">
  <div class="side-panel-wrap">
    <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="fa fa-times side-panel-trigger-icon"></i></a></div>
    <img class="logo mb-50" src="images/logo-wide.png" alt="Logo">
    <p>Our motive is to help the poor, helpless and orphan children all over the world.</p>
    <div class="widget">
      <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Latest News</h4>
      <div class="latest-posts">
        <article class="post media-post clearfix pb-0 mb-10">
          <a class="post-thumb" href="#"><img src="https://placehold.it/75x75" alt=""></a>
          <div class="post-right">
            <h5 class="post-title mt-0"><a href="#">Sustainable Construction</a></h5>
            <p>Lorem ipsum dolor...</p>
          </div>
        </article>
        <article class="post media-post clearfix pb-0 mb-10">
          <a class="post-thumb" href="#"><img src="https://placehold.it/75x75" alt=""></a>
          <div class="post-right">
            <h5 class="post-title mt-0"><a href="#">Industrial Coatings</a></h5>
            <p>Lorem ipsum dolor...</p>
          </div>
        </article>
        <article class="post media-post clearfix pb-0 mb-10">
          <a class="post-thumb" href="#"><img src="https://placehold.it/75x75" alt=""></a>
          <div class="post-right">
            <h5 class="post-title mt-0"><a href="#">Storefront Installations</a></h5>
            <p>Lorem ipsum dolor...</p>
          </div>
        </article>
      </div>
    </div>

    <div class="widget">
      <h5 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Contact Info</h5>
      <div class="tm-widget-contact-info contact-info-style1 contact-icon-theme-colored1">
        <ul>
          <li class="contact-name">
            <div class="icon"><i class="flaticon-contact-037-address"></i></div>
            <div class="text">John Doe</div>
          </li>
          <li class="contact-phone">
            <div class="icon"><i class="flaticon-contact-042-phone-1"></i></div>
            <div class="text"><a href="tel:+510-455-6735">+510-455-6735</a></div>
          </li>
          <li class="contact-email">
            <div class="icon"><i class="flaticon-contact-043-email-1"></i></div>
            <div class="text"><a href="mailto:info@yourdomain.com">info@yourdomain.com</a></div>
          </li>
          <li class="contact-address">
            <div class="icon"><i class="flaticon-contact-047-location"></i></div>
            <div class="text">3982 Browning Lane Carolyns Circle, California</div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="wrapper" class="clearfix">
  <!-- HEADER -->
  <?php require_once("header.php") ?>
  <!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Login/Register</h2>
              <!-- <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                <div class="breadcrumbs">
                  <span><a href="#" rel="home">Home</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span><a href="#">Pages</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">Page Title</span>
                </div>
              </nav> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-40">
            <h4 class="text-gray mt-0 pt-10"> Login</h4>
            <hr>
     
            <form name="login-form" class="clearfix" method="POST">
              <div class="row">
                <?php
                  if(isset($invalid)) {
                    echo "<h5 class='text-danger'>$invalid</h5>"; 
                  }
                ?>
                <div class="form-group col-md-12">
                  <label for="form_username_email">Username/Email</label>
                  <input id="form_username_email" name="form_username_email" class="form-control" type="text" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="form_password">Password</label>
                  <input id="form_password" name="form_password" class="form-control" type="password" required>
                </div>
              </div>
              <div class="checkbox pull-left mt-15">
                <label for="form_checkbox">
                  <input id="form_checkbox" name="form_checkbox" type="checkbox">
                  Remember me </label>
              </div>
              <div class="form-group tm-sc-button pull-right mt-10">
                <button name="login" class="btn btn-dark btn-xs">Login</button>
              </div>
              <!-- <div class="clear text-center pt-10">
                <a class="text-theme-colored1 font-weight-600 font-size-12" href="#">Forgot Your Password?</a>
              </div>
              <div class="clear tm-sc-button pt-10">
                <a href="#" target="_self" class="btn btn-theme-colored1 btn-block" data-tm-bg-color="#3b5998"> Login with facebook </a>
                <a href="#" target="_self" class="btn btn-theme-colored1 btn-block" data-tm-bg-color="#00acee"> Login with twitter </a>
              </div> -->
            </form>
          </div>
          <div class="col-md-7 offset-md-1">
            <form name="reg-form" class="register-form" method="POST">
              <div class="icon-box mb-0 p-0">
                <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mt-10 mb-0 mr-10">
                  <i class="pe-7s-users"></i>
                </a>
                <h4 class="text-gray pt-10 mt-0 mb-30">Don't have an Account? Register Now.</h4>
              </div>
              <hr>

              
                <?php 
                  if(isset($not)) {
                    echo "<h5 class='text-dange'>$not</h5>";
                  } 
                  
                  if (isset($_GET['success']) == 1) {
                    echo "<h5 class='text-success'>Successfully Registered</h5>";
                  }
                  
                ?>

              <div class="row">
                <div class="form-group col-md-6">
                  <label>Name</label>
                  <input name="form_name" class="form-control" type="text" required>
                </div>
                <div class="form-group col-md-6">
                  <label>Email Address</label>
                  <input name="form_email" class="form-control" type="email" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="form_choose_username">Choose Username</label>
                  <input id="form_choose_username" name="form_choose_username" class="form-control" type="text" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="form_choose_password">Choose Password</label>
                  <input id="form_choose_password" name="form_choose_password" class="form-control" type="text" required>
                </div>
                <div class="form-group col-md-6">
                  <label>Re-enter Password</label>
                  <input id="form_re_enter_password" name="form_re_enter_password"  class="form-control" type="text" required>
                </div>
              </div>
              <div class="form-group tm-sc-button">
                <button class="btn btn-dark btn-block mt-15" name="submit">Register Now</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
<!-- FOOTERR -->
  <?php require_once("footer.php") ?>

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

</body>
</html>