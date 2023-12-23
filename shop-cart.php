<?php 

  require_once("connection.php");
  session_start();

  if(!isset($_SESSION['id'])) {
    header("Location: index.php");
  }

  $clientID = $_SESSION['id'];

  if(isset($_POST['update'])) {
      $ifSelected = mysqli_query($connection, "TRUNCATE TABLE total");

      if($ifSelected) {

      // $quantity = $_POST['quantity'];
      // foreach($quantity as $quan) {
      //   echo $quantityTotal += $quan;
      // }

      if(!empty($_POST['services'])) {

        // echo $quantity; 

        $services = $_POST['services'];
        $conServ = implode(',', $services);

        $selectProduct = "SELECT * FROM transaction WHERE clientID = '$clientID'";
        $query = mysqli_query($connection, $selectProduct);

        $OverAlltotalPrice = 0;
        $totalTransaction = 0;
        while($row = mysqli_fetch_assoc($query)) {
          $productID[] = $row['productID'];
          $productIDConverted = implode(',', $productID);

          $transactionID[] = $row['id'];
          $transactionIDConvert = implode(',', $transactionID);

          $quantityLabel[] = $row['quantity'];
          $quantityLabelConvert = implode(',', $quantityLabel);

          $id = $row['id'];
          $totalTransaction += $row['total'];
 

        }

        foreach($productID as $proID) {

          

          $selectTotal = "SELECT * FROM package WHERE id = '$proID'";
          $exe = mysqli_query($connection, $selectTotal);

          while($package = mysqli_fetch_assoc($exe)) {
            $price = $package['Price'];
            $productPriceNot = $price;
            // $productPrice = $productPriceNot * $quantityTotal;
          }
        }

        $serviceTotal = 0;
        foreach($services as $servID) {
          $loopServices = mysqli_query($connection, "SELECT * FROM services WHERE id = '$servID'");
          while($loopRow = mysqli_fetch_assoc($loopServices)) {
            $servicesPrice = $loopRow['Price'];
            $serviceTotal += $servicesPrice;
        }

        $allTotal = $totalTransaction + $serviceTotal;

          // $OverAlltotalPrice = $productPrice + $serviceTotal;
          $_SESSION['OveerAlltotalPrice'] = $OverAlltotalPrice;

        }

        $isProcessing = true;
        $order = "INSERT INTO total(productID, servicesID, clientID, transactionID, total, quantity , isProcessing) values('$productIDConverted','$conServ', '$clientID', '$transactionIDConvert','$allTotal', '$quantityLabelConvert', '$isProcessing')";
        $result = mysqli_query($connection, $order);
    
        if($result) {
          // $selectTotal = mysqli_query($connection, "SELECT * FROM total WHERE clientID = '$clientID'");
          // while($rowSelectTotal = mysqli_fetch_assoc($selectTotal)) {
          //   $totalID = $rowSelectTotal;
          // }

          
          // header("Location: shop-cart.php");
          
        }


      } else {
        $noServices = mysqli_query($connection, "SELECT * FROM transaction WHERE clientID = '$clientID'");
        while($noServicesRows = mysqli_fetch_assoc($noServices)) {
          
        }

      }    
    }

      // $total = $packagePrice + $servicesPrice;
      //   echo $total;


      if(isset($_POST['buttonUpdate'])) {
        echo "Hello";
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
  <!-- Header -->
    <?php require_once("header.php") ?>
  <!-- /HEADER -->

  <!-- Start main-content -->
  <form method="POST">
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Shop Cart</h2>
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
          <?php 
          
            if(isset($_GET['inserted'])) {
              if($_GET['inserted'] == 0) {
                echo "<h5 class='text-danger mb-3'>Data already exist</h5>";
              } else {
                echo "<h5 class='text-success mb-3'>Data successfully added</h5>";
              }
              
            }
          
          ?>
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-striped table-bordered tbl-shopping-cart">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Photo</th>
                      <th>Schedule</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php if(isset($_POST['update'])) {
                            $getQuantity = $_POST['quantity'];
                            $id = $_POST['id'];
                            $addedPrice = $_POST['price'];
                            

                            $selectPrice = mysqli_query($connection, "SELECT * FROM transaction WHERE id='$id' and clientID = '$clientID'");
                            while($rowPrices = mysqli_fetch_assoc($selectPrice)) {
                              $packageTotal = $rowPrices['price'];
                              $total += $packageTotal * $getQuantity;
                            }
                            
                            $select = mysqli_query($connection, "UPDATE transaction SET quantity = '$getQuantity', total='$total' WHERE id = '$id' and clientID = '$clientID'");
                            if($select) {
                              echo "<script>window.location.href = 'shop-cart.php'; </script>";     
                          } 
                        }
                          
                  ?>

                  <?php 

                    require_once("connection.php");

                    $id = $_SESSION['id'];
                    $getDatabase = "SELECT * FROM transaction WHERE clientID = '$id'";
                    $result = mysqli_query($connection, $getDatabase);
                    $nodata = false;

                  if(mysqli_num_rows($result) > 0) {

                    $nodata = false;
                    while($rows = mysqli_fetch_assoc($result)) {
                        $transID = $rows['id'];
                        $package = $rows['productID'];
                        $quantityTrans = $rows['quantity'];

                        $viewPackage = "SELECT * FROM package WHERE id = '$package'";
                        $resultPackage = mysqli_query($connection, $viewPackage);
                      
                        $totalPrice = 0;
                        while($package = mysqli_fetch_assoc($resultPackage)) {
                          $id = $package['id'];
                          $image = $package['Image'];
                          $title = $package['Title'];
                          $category = $package['Category'];
                          $desc = $package['Description'];
                          $price = $package['Price'];

                          

                          $totalPrice += $price;
                          $addedPrice = $totalPrice * $quantityTrans;

                  
                          ?>
                          
                          <form method="POST">
                          <input type="hidden" name="id" value="<?php echo $transID; ?>">
                          <input type="hidden" name="price" value="<?php echo $addedPrice; ?>">
                          <tr class="cart_item">
                          <td class="product-remove"><a title="Remove this item" class="remove" href="deletePackageTransaction.php?ID=<?php echo $transID; 
                           ?>">×</a></td>
                          <td class="product-thumbnail"><a href="#"><img alt="member" src="schedules/<?php echo $image; ?>"></a></td>
                          <td class="product-name"><a href="#"><?php echo $title;  ?></a>
                            <ul class="variation">
                              <li class="variation-size"><span><?php echo $desc; ?></span></li>
                            </ul></td>
                          <td class="product-price"><span class="amount">₱ <?php echo number_format($price); ?></span></td>
                          <input class="d-none" id="idValue" value="<?php echo $id; ?>">
                          <td class="product-quantity"><div class="quantity buttons_added">
                              <input type="button" class="minus" value="-">
                              <input id="quantity" type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo $quantityTrans; ?>" name="quantity" min="1" step="1">
                              <input type="button" class="plus" value="+">

                              <!-- <div class="w-100 text-right">
                                <button name="buttonUpdate" id="buttonUpdate" class="-cart-update-btn btn btn-theme-colored1 text-white buttonUpdate">Update Package</button>
                              </div> -->
                              <div class="w-100 text-right">
                                <!-- Button trigger modal -->
                                <button name="update" class="btn btn-theme-colored1 text-right" data-toggle="modal" value="<?php echo $transID; ?>">
                                  Update Quantity
                                </button>

                                <!-- Modal -->
                                <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $transID; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        ...
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div> -->
                              </form> 
                            </div></td>
                          <td class="product-subtotal"><span class="amount" name="itemSubtotal">₱ <?php echo number_format($addedPrice); ?></span></td>
                        </tr>
                        <?php
                        }
                    } 
                  } else {
                    $nodata = true;
                    $noTrans = "No transactions yet";
                  }
                  
                  
                  ?>
                    <!-- <tr class="cart_item">
                      <td colspan="3">
                        <div class="form-inline coupon-form">
                          <div class="coupon form-group">
                            <input type="text" name="coupon_code" class="input-text form-control mr-1" id="coupon_code" value="" placeholder="Coupon code"> <button type="submit" class="button btn btn-theme-colored1" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                          </div>
                        </div>
                      </td>
                      <td colspan="2">&nbsp;</td>
                      <td><button type="button" class="-cart-update-btn btn btn-theme-colored2">Update Cart</button></td>
            
                    </tr> -->
                  </tbody>
                </table>
                
                <?php 
                  if(isset($noTrans)) {
                    echo "<div class='w-100 mb-4 text-center'>$noTrans</div>";
                  }
                ?>
                <div class="title-separator mb-60 mt-70">
                  <span class="text-uppercase font-26"> Services</span>
                </div>

                <table class="table table-striped table-bordered tbl-shopping-cart" style="<?php if($nodata == true) { echo "display: none";} ?>;">
                  <thead>
                    <tr>
                      <th>Title</th>                     
                      <th>Description</th>
                      <th>Select</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 

                    require_once("connection.php");

                    $id = $_SESSION['id'];
                    $getDatabase = "SELECT * FROM services";
                    $result = mysqli_query($connection, $getDatabase);


                        while($package = mysqli_fetch_assoc($result)) {
                          $id = $package['id'];
                          $title = $package['Title'];
                          $desc = $package['Description'];
                          $price = $package['Price'];

                          ?>
                          <tr class="cart_item">
                          <td class="product-name"><a href="#"><?php echo $title;  ?></a>
                           </td>
                          <td class="product-price"><span class="amount"><?php echo $desc; ?></span></td>
                          <td class="product-quantity"><div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services[]" value="<?php echo $id; ?>" id="defaultCheck1" style="width: 20px; height: 20px">
                            <label class="form-check-label" for="defaultCheck1">
                              
                            </label>
                          </div></td>
                          <td class="product-subtotal"><span class="amount">₱ <?php echo  number_format($price) ?></span></td>
                        </tr>
                        <?php
                        }
                    
                  
                  ?>
                    <!-- <tr class="cart_item">
                      <td colspan="3">
                        <div class="form-inline coupon-form">
                          <div class="coupon form-group">
                            <input type="text" name="coupon_code" class="input-text form-control mr-1" id="coupon_code" value="" placeholder="Coupon code"> <button type="submit" class="button btn btn-theme-colored1" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                          </div>
                        </div>
                      </td>
                      <td colspan="2">&nbsp;</td>
                      <td><button type="button" class="-cart-update-btn btn btn-theme-colored2">Update Cart</button></td>
            
                    </tr> -->
                  </tbody>
                </table>
                <div class="w-100 text-center mb-5" style="<?php if($nodata == false) { echo "display: none;";} ?>">Please add transaction to view services</div>
                <div class="w-100">
                <button name="update" class="-cart-update-btn btn btn-theme-colored2" <?php if($nodata == true) { echo "disabled";} ?>>Update Cart</button>
                </div>
              </div>
            </div>
            <div class="col-md-12 mt-30">
              <div class="row">
                <!-- <div class="col-md-6">
                  <h4>Calculate Shipping</h4>
                  <form class="form" action="#">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td><select class="form-control">
                              <option>Select Country</option>
                              <option>Australia</option>
                              <option>UK</option>
                              <option>USA</option>
                            </select></td>
                        </tr>
                        <tr>
                          <td><input type="text" class="form-control" placeholder="State/country" value=""></td>
                        </tr>
                        <tr>
                          <td><input type="text" class="form-control" placeholder="Postcod/zip" value=""></td>
                        </tr>
                        <tr>
                          <td><button type="button" class="cart-update-total-button btn btn-theme-colored1">Update Totals</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </form>
                </div> -->
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  <h4>Cart Totals</h4>
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Order Total</td>
                        <td>₱ <?php 
                        
                          $selectTotal = mysqli_query($connection, "SELECT * FROM total WHERE clientID = '$clientID'");
                          while($total = mysqli_fetch_assoc($selectTotal)) {
                            if($total['isProcessing'] == 1) {
                              echo number_format($total['total']);
                            } if($total['isProcessing'] == 0){
                              echo "0";
                            }
                          }

                        ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <a class="cart-checkout-button btn btn-theme-colored1" href="shop-checkout.php">Proceed to Checkout</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </form>
  <!-- end main-content -->

<?php require_once("footer.php")?>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
                          
<script src="js/custom.js"></script>

</body>
</html>