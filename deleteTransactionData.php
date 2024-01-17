<?php 

    require_once("connection.php");

    $id = $_GET['ID'];

    $status = false;
    $database = mysqli_query($connection, "UPDATE finalorder SET status = '$status' WHERE id = '$id'");

    if($database) {
        header("Location: transactionDetails.php");
    }

?>