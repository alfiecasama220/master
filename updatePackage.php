<?php 

    require_once("connection.php");
    session_start();

    
        $clientID = $_SESSION['id'];
        $getID = $_GET['ID'];
        $getQuantity = $_GET['quantity'];

        echo $getID . "<br>" . $getQuantity;

        $select = mysqli_query($connection, "UPDATE transaction SET quantity = '$getQuantity' WHERE productID = '$getID' and clientID = '$clientID'");
        if($select) {
            header("Location: shop-cart.php");
        }
    

    


?>