<?php 

    require_once($_SERVER['DOCUMENT_ROOT'] . "\connection.php");
    session_start();

    function getCustomerList() {
        global $connection;

        $database = mysqli_query($connection, 
        "SELECT date,  GROUP_CONCAT(orderTotal SEPARATOR ',') as total, GROUP_CONCAT(status SEPARATOR ',') as status FROM finalorder group by date");
        // print_r(mysqli_fetch_all($database, MYSQLI_ASSOC));
        while($row = mysqli_fetch_assoc($database)) {

            $total = $row['total'];
            $total = explode("," ,$total);

            $date = $row['date'];

            $status = $row['status'];
            $dateTotal = 0;

            foreach($total as $totals) {
                $dateTotal += $totals;
            }
            
            
            $selectALL = mysqli_query($connection, "SELECT * FROM salestatistics WHERE date = '$date'");
            $numCheck = mysqli_num_rows($selectALL);

            if($numCheck > 0) {
                $insert = mysqli_query($connection,"UPDATE salestatistics SET total = '$dateTotal' , status = '$status' WHERE date = '$date'");
                if($insert) {
                    header("Location: read.php");
                }
            } else {
                $insert = mysqli_query($connection, "INSERT INTO salestatistics(date, total, status) values('$date', '$dateTotal', '$status')");
                if($insert) {
                    header("Location: read.php");
                }
            }
            


            // echo "(" . $totals . ")";
            // $saleStatistics = mysqli_query($connection, "INSERT INTO ");
        }

        

        $statistics = mysqli_query($connection, "SELECT * FROM salestatistics");


        if($statistics) {
            if(mysqli_num_rows($statistics) > 0) {
                $customers = mysqli_query($connection, 
                "SELECT * FROM client");

                $datas = mysqli_fetch_all($statistics, MYSQLI_ASSOC);
                $customerData = mysqli_num_rows($customers);

                $productsCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM package"));
                $servicesCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM services"));
                $finalOrder = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM finalorder"));
                

                $data = [
                    'status' => 200,
                    'message' => "Data Found",
                    'data' => $datas,
                    'customers' => $customerData,
                    'products' => $productsCount,
                    'services' => $servicesCount,
                    'orders' => $finalOrder
                ];
                header("HTTP/1.0 200 Data Found");
                return json_encode($data);
            } else {
                $data = [
                    'status' => 404,
                    'message' => "No Data Found",
        
                ];
                header("HTTP/1.0 404 No Data Found");
                return json_encode($data);
            }
        } else {
            $data = [
                'status' => 500,
                'message' => "Internal Server Error",
    
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }





    }

?>