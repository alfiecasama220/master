<?php 

    session_start();

    session_destroy();
    $host = $_SERVER['HTTP_HOST'];
    header("Location: $hostadmin/admin");

?>