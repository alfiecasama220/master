<?php 

    require_once($_SERVER['DOCUMENT_ROOT'] . "\connection.php");
    session_start();

    function error() {
        $self = $_SERVER['PHP_SELF'] . "?error=true";
        header("Location: $self");
    }


    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordVerify = md5(sha1($password));
        

        if($_POST['selectRole'] == "admin") {
            echo $_POST['selectRole'];
        $database = mysqli_query($connection, "SELECT * FROM admin WHERE Username = '$username' or Email='$username' and Password = '$passwordVerify'");

        $result = mysqli_fetch_assoc($database);

        if(is_array($result)) {
            $_SESSION['username'] = $result['Username'];
            $_SESSION['email'] = $result['Email'];
            $_SESSION['password'] = $result['Password'];
            $_SESSION['name'] = $result['Name'];
            $_SESSION['role'] = $result['Role'];
            $_SESSION['loggedAdmin'] = true;

            header("Location: ../admin/html/index.php?");

        } else {
            error();
        }
    }

        if($_POST['selectRole'] == "manager") {
            $databaseManager = mysqli_query($connection, "SELECT * FROM manager WHERE Username = '$username' or Email='$username' and Password = '$passwordVerify'");

            $resultManager = mysqli_fetch_assoc($databaseManager);

            if(is_array($resultManager)) {
                $_SESSION['username'] = $resultManager['Username'];
                $_SESSION['email'] = $resultManager['Email'];
                $_SESSION['password'] = $resultManager['Password'];
                $_SESSION['name'] = $resultManager['Name'];
                $_SESSION['role'] = $resultManager['Role'];
                $_SESSION['loggedManager'] = true;

                header("Location: ../admin/html/index.php");

            } else {
                error();
            }
        }

        if($_POST['selectRole'] == "staff") {
            $databaseStaff = mysqli_query($connection, "SELECT * FROM staff WHERE Username = '$username' or Email='$username' and Password = '$passwordVerify'");

            $resultStaff = mysqli_fetch_assoc($databaseStaff);

            if(is_array($resultStaff)) {
                $_SESSION['username'] = $resultStaff['Username'];
                $_SESSION['email'] = $resultStaff['Email'];
                $_SESSION['password'] = $resultStaff['Password'];
                $_SESSION['name'] = $resultStaff['Name'];
                $_SESSION['role'] = $resultStaff['Role'];
                $_SESSION['loggedStaff'] = true;

                header("Location: ../admin/html/index.php");

            } else {
                error();
            }
        }

        

    

            

            
            // else {
            //     $databaseManager = mysqli_query($connection, "SELECT * FROM manager WHERE Username = '$username' || Email = '$username' and Password = '$passwordVerify'");
            //     $resultManager = mysqli_fetch_assoc($databaseManager);

            //     if(is_array($resultManager)) {
            //         $_SESSION['username'] = $result['Username'];
            //         $_SESSION['email'] = $result['Email'];
            //         $_SESSION['password'] = $result['Password'];
            //         $_SESSION['name'] = $result['Name'];
            //         $_SESSION['loggedManager'] = true;

            //         header("Location: ../admin/html/index.php");

            //     } else {
            //         $self = $_SERVER['PHP_SELF'] . "?error=true";
            //         header("Location: $self");
            //     }
            // }
        
    }
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- head -->
<?php require_once("html/head.php") ?>

<body class="nk-body ui-rounder npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="./img/logo.png" srcset="./img/logo.png 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="./img/logo.png" srcset="./img/logo.png 2x" alt="logo-dark">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign-In</h4>
                                        <div class="nk-block-des">
                                            <p>Access the Laundrybest panel using your email and passcode.</p>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                
                                    if(isset($_GET['error']) == "true") {
                                        echo '<h5 class="mb-3 text-danger">Invalid Username or Password</h5>';
                                    }

                                ?>
                                <form method="POST">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email or Username</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" name="username" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address or username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Passcode</label>
                                            <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot Code?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="form-label">Select2 With Search</label><div class="form-control-wrap"><select class="form-select js-select2 select2-hidden-accessible" name="selectRole" data-search="on" data-select2-id="6" tabindex="-1" aria-hidden="true"><option value="admin" data-select2-id="8">Admin</option><option value="manager" data-select2-id="19">Manager</option><option value="staff" data-select2-id="20">Staff</option></select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" data-select2-id="7" style="width: 578px;"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div></div>
                                    <div class="form-group">
                                        <button name="login" class="btn btn-lg btn-block text-white" style="background: #816bff;">Sign in</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="html/register.php">Create an account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Help</a>
                                        </li>
                                        <li class="nav-item dropup">
                                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-bs-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                <ul class="language-list">
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/english.png" alt="" class="language-flag">
                                                            <span class="language-name">English</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/spanish.png" alt="" class="language-flag">
                                                            <span class="language-name">Español</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/french.png" alt="" class="language-flag">
                                                            <span class="language-name">Français</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/turkey.png" alt="" class="language-flag">
                                                            <span class="language-name">Türkçe</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2023 DashLite. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.3"></script>
    <script src="./assets/js/scripts.js?ver=3.1.3"></script>
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Select Your Country</h5>
                    <div class="nk-country-region">
                        <ul class="country-list text-center gy-2">
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/arg.png" alt="" class="country-flag">
                                    <span class="country-name">Argentina</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/aus.png" alt="" class="country-flag">
                                    <span class="country-name">Australia</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/bangladesh.png" alt="" class="country-flag">
                                    <span class="country-name">Bangladesh</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/canada.png" alt="" class="country-flag">
                                    <span class="country-name">Canada <small>(English)</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">Centrafricaine</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">China</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/french.png" alt="" class="country-flag">
                                    <span class="country-name">France</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/germany.png" alt="" class="country-flag">
                                    <span class="country-name">Germany</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/iran.png" alt="" class="country-flag">
                                    <span class="country-name">Iran</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/italy.png" alt="" class="country-flag">
                                    <span class="country-name">Italy</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/mexico.png" alt="" class="country-flag">
                                    <span class="country-name">México</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/philipine.png" alt="" class="country-flag">
                                    <span class="country-name">Philippines</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/portugal.png" alt="" class="country-flag">
                                    <span class="country-name">Portugal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/s-africa.png" alt="" class="country-flag">
                                    <span class="country-name">South Africa</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/spanish.png" alt="" class="country-flag">
                                    <span class="country-name">Spain</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/switzerland.png" alt="" class="country-flag">
                                    <span class="country-name">Switzerland</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/uk.png" alt="" class="country-flag">
                                    <span class="country-name">United Kingdom</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/english.png" alt="" class="country-flag">
                                    <span class="country-name">United State</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->

</html>
