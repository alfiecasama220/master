<?php 

    require_once("connection.php");

    $id = $_GET['ID'];

    $status = false;
    $database = mysqli_query($connection, "DELETE FROM finalorder WHERE id = '$id'");

    if($database) {
        header("Location: transactionDetails.php");
    }

?>