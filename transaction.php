<?php 

  require_once("connection.php");
  session_start();
  
  $clientID = $_SESSION['id'];
  if(isset($_GET['ID'])) {

    $id = $_GET['ID'];

    $verify = "SELECT * FROM transaction WHERE productID = '$id' and clientID = '$clientID'";
    $execute = mysqli_query($connection, $verify);

    if(mysqli_num_rows($execute) > 0) {
        header("Location: shop-cart.php?inserted=0");
    } else {
        $quantity = 1;
        $price = 180;
        $database = "INSERT INTO transaction(productID, clientID, quantity, total, price) values('$id', '$clientID', '$quantity', '$price', '$price')";
        $result = mysqli_query($connection, $database);

        if($result) {
            header("Location: shop-cart.php?inserted=1");
        }
    }
  }

?>