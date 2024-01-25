<?php 
    require_once("connection.php");
    session_start();
    $paymentMethodData;
    

        if(isset($_POST['placeOrder'])) {
        
        if(isset($_POST['paymentMethod'])) {
        $selectPayment = $_POST['paymentMethod'];

        if($selectPayment == 0) {
            $paymentMethodData = "Cash on delivery";
        }

        if($selectPayment == 1) {
            $paymentMethodData = "Gcash";
        }

        }
    }

    // $insertDataOrder = "INSERT INTO finalorder(Email) values('AlfieJohnCasama')";
    //     $exe = mysqli_query($connection, $insertDataOrder);

    function insertData($paymentMethodData) {
        $clientID = $_SESSION['id'];
        include("connection.php");
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $apartment = $_POST['apartment'];
        $message = $_POST['message'];

        if($apartment == "") {
            $apartmentData = "N/A";
        } else {
            $apartmentData = $_POST['apartment'];
        }

        if($message == "") {
            $messageData = "N/A";
        } else {
            $messageData = $_POST['message'];
        }

        $selectAllOrder = mysqli_query($connection, "SELECT * FROM total WHERE clientID = '$clientID'");
        while($orderDatas = mysqli_fetch_assoc($selectAllOrder)) {
            $productID = $orderDatas['productID'];
            $totalOrder = $orderDatas['total'];
            $quantity = $orderDatas['quantity'];

            $services = $orderDatas['servicesID'];

            if($services == "") {
                $servicesData = null;
            } else {
                $servicesData = $services;
            }
        }

        // echo $fullname . $email . $address . $apartmentData . $paymentMethodData;
        $status = true;
        $ready = false;
        $insertDataOrder = "INSERT INTO finalorder(Fullname, Email, Address, ApartmentNum, message, orderTotal, paymentMethod, quantity , productID, servicesID, clientID, status, ready) values('$fullname', '$email', '$address', '$apartmentData', '$messageData', '$totalOrder', '$paymentMethodData', '$quantity' , '$productID', '$servicesData', '$clientID', '$status', '$ready')";
        $exe = mysqli_query($connection, $insertDataOrder);

        if($insertDataOrder) {
            
            $deleteTrans = mysqli_query($connection, "DELETE FROM transaction WHERE clientID = '$clientID'");
            if($deleteTrans) {
                header("Location: transactionDetails.php");
            }
            
        }


    }

    insertData($paymentMethodData);

    


?>