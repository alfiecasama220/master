<?php 

  require_once("connection.php");
  session_start();
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<!-- HEAD -->
<?php require_once("head.php") ?>
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
  <!-- Header -->
  <?php require_once("header.php") ?>

  <!-- Start main-content -->
  <form method="POST" action="order.php">
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Your Transaction</h2>
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
        <div class="section-content">
          <form id="checkout-form" action="#">
            <div class="row mt-6">
              <div class="col-md-6">

              </div>
              <div class="col-md-6">

              </div>
              <div class="col-md-12 mt-30">
                <h3>Your package</h3>
                <table class="table table-striped table-bordered tbl-shopping-cart">
                  <thead>
                    <tr>
                      <th>Photo</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                  
                  $clientID = $_SESSION['id'];
                  $selectAllOrder = mysqli_query($connection, "SELECT * FROM finalorder WHERE clientID = '$clientID' && status = '1'");

                  $proID = 0;
                  $fullname = null;
                  if(mysqli_num_rows($selectAllOrder) > 0) {
                    
                    while($rows = mysqli_fetch_assoc($selectAllOrder)) {
                      $productID = $rows['productID'];
                      $productID = explode(",", $productID);
                      $total = $rows['orderTotal'];
                      $_SESSION['parcelFullname'] = $rows['Fullname'];

                      $ID = $rows['id'];

                      $quantity = $rows['quantity'];
                      $quantity = explode(",", $quantity);
                      // print_r($productID);

                      $servicesID = $rows['servicesID'];
                      $servicesID = explode(",", $servicesID);
                    
                    }

                    

                    foreach($productID as $proID) {
                      $selectPro = mysqli_query($connection, "SELECT * FROM package WHERE id = '$proID'");
                      
                      while($rowPackage = mysqli_fetch_assoc($selectPro)) {
                        $image = $rowPackage['Image'];
                        $Title = $rowPackage['Title'];
                        $desc = $rowPackage['Description'];
                        $price = $rowPackage['Price'];

                        
                        $selectAllTransaction = mysqli_query($connection, "SELECT * FROM total WHERE clientID = '$clientID'");

                        while($totalTransactions = mysqli_fetch_assoc($selectAllTransaction)) {
                          $quantity = $totalTransactions['quantity'];
                          $quantity = explode(",", $quantity);
                          $totalTrans = $totalTransactions['total'];
                          
                          

                          
                               
                          // $totalData = $price * $quantity;
                          // echo $totalData;
                          // (<?php echo $quantity;)
                          ?>
                          <tr>
                            <td class="product-thumbnail"><a href="shop-product-details.html"><img alt="package" src="packages/<?php echo $image; ?>"></a></td>
                            <td><a href="#"><?php echo $Title; ?></a></td>
                            <td><?php echo $desc; ?></td>
                            <td><span class="amount">₱ <?php echo number_format($totalTrans); ?></span></td>
                          </tr>
                        <?php

                        }
                        ?>
                        
                        

                        <?php
                      }    
                    }
                   
                  } else {
                    echo "<td>No data found</td>  ";
                  }
                  
                  
                  ?>
                    
                  </tbody>
                </table>


                <h3>Your services</h3>
                <table class="table table-striped table-bordered tbl-shopping-cart">
                  <thead>
                    <tr>
                      <th>Title</th>                    
                      <th>Description</th>
                      <th>Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                  
                  $clientID = $_SESSION['id'];
                  $selectAllOrder = mysqli_query($connection, "SELECT * FROM total WHERE clientID = '$clientID' and isProcessing = '1'");

                  if(mysqli_num_rows($selectAllOrder) > 0) {
                    
                    while($rows = mysqli_fetch_assoc($selectAllOrder)) {
                      // $productID = $rows['servicesID'];
                      // $productID = explode(",", $productID);
                      
                      
                      $quantity = $rows['quantity'];
                      $quantity = explode(",", $quantity);
                      // print_r($productID);

                      $servicesID = $rows['servicesID'];
                      $servicesID = explode(",", $servicesID);
                    
                    }

                    foreach($servicesID as $servicesIDArr) {
                      $selectPro = mysqli_query($connection, "SELECT * FROM services WHERE id = '$servicesIDArr'");
                      
                      while($rowPackage = mysqli_fetch_assoc($selectPro)) {
                        $TitleServices = $rowPackage['Title'];
                        $descServices = $rowPackage['Description'];
                        $servicesTotal = $rowPackage['Price'];
                        
                        $selectAllTransaction = mysqli_query($connection, "SELECT * FROM finalorder WHERE clientID = '$clientID'");
                        while($totalTransactions = mysqli_fetch_assoc($selectAllTransaction)) {
                          $quantity = $totalTransactions['quantity'];
                          $totalTrans = $totalTransactions['orderTotal'];
                          ?>
                          <tr>
                          <td class="product-thumbnail"><a href=""><?php echo $TitleServices ; ?></a></td>                
                          <td><?php echo $descServices; ?></td>
                          <td>₱ <?php echo number_format($servicesTotal); ?></td>
                          <td><span class="amount">₱ <?php echo number_format($servicesTotal); ?></span></td>
                        </tr>
                        <?php

                        }
                        ?>
                        
                        

                        <?php
                      }    
                    }
                   
                  } else {
                    echo "<td>No data found</td>  ";
                  }
                  
                  
                  ?>
         
                      <!-- <td>&nbsp;</td>
                      <td></td>
                      <td>Order Total</td>
                      <td>₱ <?php echo number_format($total); ?></td>
                    </tr> -->
                    
                  </tbody>
                </table>

                
                <div class="w-100 border d-flex">
                  <div class="col-sm"></div>
                  <div class="col-sm w-100 p-3 text-right"><h5 class="text-dark">Order Total: </h5></div>
                  <div class="col-sm d-flex justify-content-center align-items-center border bg-theme-colored1"><h5 class="text-white">₱ <?php if(isset($total)) {echo number_format($total);} ?></h5></div>
                  <a href="deleteTransactionData.php?ID=<?php echo $ID; ?>" class="w-25 bg-theme-colored1 d-flex align-items-center"><div class="col-sm w-100 text-white d-flex justify-content-center">Cancel Order</div></a>
                  <a href="parcelReceipt.php" class="w-25 bg-theme-colored2 d-flex align-items-center"><div class="col-sm w-100 text-white d-flex justify-content-center">View Receipt</div></a>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  </form>
  <!-- end main-content -->

  <!-- Footer -->
  <?php require_once("footer.php") ?>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

</body>
</html>