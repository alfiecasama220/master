<?php 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: GET');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

    require_once("function.php");

    $requestMethods = $_SERVER['REQUEST_METHOD'];

    if($requestMethods == "GET") {
        $customerData = getCustomerList();
        echo $customerData;
    } 
    else {
        $data = [
            'status' => 405,
            'message' => $requestMethod . "Method not Allowed",

        ];
        header("HTTP/1.0 405 Method Not Allowed");
        return json_encode($data);
    }
?>



