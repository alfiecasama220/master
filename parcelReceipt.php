<?php 

    session_start();
    require_once("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @media print {
        #header {
            display: none;
        }

        .img-fluid {
            width: 5rem;
        }

        .card {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
        }

        
    }
</style>
<?php require_once("head.php") ?>
<?php require_once("header.php") ?>
<body>
<section class="h-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
            <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #a8729a;"><?php echo explode(' ', trim($_SESSION['parcelFullname']))[0]; ?></span>!</h5>
          </div>
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
              <!-- <p class="small text-muted mb-0">Receipt Voucher : 1KAU9-84UIL</p> -->
            </div>

            <h6>Packages</h6>

            <?php 
                  
                  $clientID = $_SESSION['id'];
                  $selectAllOrder = mysqli_query($connection, "SELECT * FROM finalorder WHERE clientID = '$clientID' && status = '1'");

                  $proID = 0;
                  $fullname = null;
                  if(mysqli_num_rows($selectAllOrder) > 0) {
                    $readyFinal = 0;
                    while($rows = mysqli_fetch_assoc($selectAllOrder)) {
                      $productID = $rows['productID'];
                      $productID = explode(",", $productID);
                      $total = $rows['orderTotal'];
                      $date = $rows['date'];
                      $_SESSION['parcelFullname'] = $rows['Fullname'];
                    
                      $ready = $rows['ready'];

                      if($ready == 1) {
                        $readyFinal = 100;
                      } else {
                        $readyFinal = 50;
                      }
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
                          <div class="card shadow-0 border mb-4">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-2">
                                    <img src="packages/<?php echo $image; ?>"
                                    class="img-fluid" alt="Phone">
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0"><?php echo $Title ?></p>
                                </div>
                                <div class="col-md-6 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0 small"><?php echo $desc; ?></p>
                                </div>
                                <!-- <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0 small">Capacity: 64GB</p>
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    
                                </div> -->
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0 small">₱ <?php echo $price; ?></p>
                                </div>
                                </div>
                                <!-- <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                <div class="row d-flex align-items-center"> -->


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
                          <!-- <div class="card shadow-0 border mb-4"> -->
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-2">
                                    <p class="text-muted mb-0"><?php echo $TitleServices ?></p>
                                </div>
                                <div class="col-md-8 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0"><?php echo $descServices ?></p>
                                </div>
                                <!-- <div class="col-md-6 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0 small"><?php echo $desc; ?></p>
                                </div> -->
                                <!-- <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0 small">Capacity: 64GB</p>
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    
                                </div> -->
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0 small">₱ <?php echo $servicesTotal; ?></p>
                                </div>
                                </div>
                                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                <div class="row d-flex align-items-center">
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


                                    
                                <div class="col-md-2">
                                    <p class="text-muted mb-0 small">Track Order</p>
                                </div>



                                <div class="col-md-10">
                                    <div class="progress" style="height: 6px; border-radius: 16px;">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: <?php echo $readyFinal ?>%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-around mb-1">
                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Processing</p>
                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Ready for pickup</p>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                            </div>
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


            <!-- <div class="card shadow-0 border mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp"
                      class="img-fluid" alt="Phone">
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0">Samsung Galaxy</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">White</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Capacity: 64GB</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Qty: 1</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">$499</p>
                  </div>
                </div>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                <div class="row d-flex align-items-center">
                  <div class="col-md-2">
                    <p class="text-muted mb-0 small">Track Order</p>
                  </div>
                  <div class="col-md-10">
                    <div class="progress" style="height: 6px; border-radius: 16px;">
                      <div class="progress-bar" role="progressbar"
                        style="width: 65%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-around mb-1">
                      <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                      <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            

            <div class="d-flex justify-content-between pt-2">
              <p class="fw-bold mb-0">Order Details</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Total: </span>₱ <?php echo $totalTrans; ?></p>
            </div>

            <!-- <div class="d-flex justify-content-between pt-2">
              <p class="text-muted mb-0">Invoice Number : 788152</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> $19.00</p>
            </div> -->

            <div class="d-flex justify-content-between">
              <p class="text-muted mb-0">Parcel Date : <?php echo date('F d Y' , strtotime($date));?></p>
              <!-- <p class="text-muted mb-0"><span class="fw-bold me-4">GST 18%</span> 123</p> -->
            </div>

            <!-- <div class="d-flex justify-content-between mb-5">
              <p class="text-muted mb-0">Recepits Voucher : 18KU-62IIK</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
            </div> -->
          </div>
          <div class="card-footer border-0 px-4 py-5"
            style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <button class="btn btn-danger" onclick="print()">Print</button>
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
              paid: <span class="h2 mb-0 ms-2">₱ <?php if(isset($total)) {echo number_format($total);} ?></span></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>