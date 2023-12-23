<?php 

    require_once("connection.php");
    session_start();

    $id = $_GET['ID'];
    $clientID = $_SESSION['id'];
    $fetch = "DELETE FROM transaction WHERE id = $id";
    $result = mysqli_query($connection, $fetch);

    if($result) {
        $ifSelected = mysqli_query($connection, "SELECT * FROM total WHERE clientID = '$clientID'");

        if(mysqli_num_rows($ifSelected) > 0) {
            $deleted = mysqli_query($connection, "DELETE FROM total WHERE clientID = '$clientID'");

            if($deleted) {
                header("Location: shop-cart.php");
            }
        } else {
            header("Location: shop-cart.php");
        }
    }

    

?>