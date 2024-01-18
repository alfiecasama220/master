<?php 

  require("fpdf/fpdf.php");
  require("connection.php");
  session_start();

  $clientID = $_SESSION['id'];
  $totalTrans = 0;




  
  
  
  //invoice Products

                $products_info = [];
                $clientID = $_SESSION['id'];
                  $selectAllOrder = mysqli_query($connection, "SELECT * FROM finalorder WHERE clientID = '$clientID' && status = '1'");

                  $proID = 0;
                  if(mysqli_num_rows($selectAllOrder) > 0) {
                    
                    while($rows = mysqli_fetch_assoc($selectAllOrder)) {
                      $productID = $rows['productID'];
                      $productID = explode(",", $productID);
                      $total = $rows['orderTotal'];

                      $ID = $rows['id'];

                      $quantity = $rows['quantity'];
                      $quantity = explode(",", $quantity);


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

                          foreach($quantity as $quantityElement) {
                            $totalPackage = $price * $quantityElement;
                          }

                          foreach($quantity as $quantityElement) {
                            $quantity = $quantityElement;
                          }
                          

                               $products_info[]=[
                                "name"=>$Title,
                                "price"=>$price,
                                "qty"=>$quantity,
                                "total"=>$totalPackage,
                                 ];
                                 

                        }

                      }    
                    }
                   
                  } 

                //   SESRVICES

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
                          $quantity = explode(",", $quantity);
                          $totalTrans = $totalTransactions['orderTotal'];

                          foreach($quantity as $quantityElement) {
                            $totalServices = $servicesTotal * $quantityElement;
                          }

                          $products_info[]=[
                            "name"=>$TitleServices,
                            "price"=>$servicesTotal,
                            "qty"=>2,
                            "total"=>$totalServices,
                             ];


                        }
                    }
                   
                  } 
                }
                






            //customer and invoice details

        $fetchInfo = mysqli_query($connection, "SELECT * FROM finalorder WHERE clientID = '$clientID'");
        if(mysqli_num_rows($fetchInfo) > 0) {
            $rows = mysqli_fetch_assoc($fetchInfo);
            
            $info=[
                "customer"=>$rows['Fullname'],
                "address"=> $rows['Address'],
                // "city"=>"Salem 636204.",
                "invoice_no"=>$rows['id'],
                "invoice_date"=>$rows['date'],
                "total_amt"=>"PHP " . $totalTrans,
                // "words"=>"Rupees Five Thousand Two Hundred Only",
            ];
        }

  
  
  class PDF extends FPDF
  {
    function Header(){
      
      //Display Company Info
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,"LAUNDRY BEST   ",0,1);
      $this->SetFont('Arial','',14);
      $this->Cell(50,7,"Lapu-lapu Street, North Poblacion, Bacong Negros Oriental",0,1);
    //   $this->Cell(50,7,"Salem 636002.",0,1);
      $this->Cell(50,7,"PH : +63 998 4489 709",0,1);
      
      //Display INVOICE text
      $this->SetY(15);
      $this->SetX(-40);
      $this->SetFont('Arial','B',18);
      $this->Cell(50,10,"INVOICE",0,1);
      
      //Display Horizontal line
      $this->Line(0,48,210,48);
    }
    
    function body($info,$products_info){
      
      //Billing Details
      $this->SetY(55);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(50,10,"Bill To: ",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(50,7,$info["customer"],0,1);
      $this->Cell(50,7,$info["address"],0,1);
    //   $this->Cell(50,7,$info["city"],0,1);
      
      //Display Invoice no
      $this->SetY(55);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice No : ".$info["invoice_no"]);
      
      //Display Invoice date
      $this->SetY(63);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice Date : ".$info["invoice_date"]);
      
      //Display Table headings
      $this->SetY(95);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(80,9,"DESCRIPTION",1,0);
      $this->Cell(40,9,"PRICE",1,0,"C");
      $this->Cell(30,9,"QTY",1,0,"C");
      $this->Cell(40,9,"TOTAL",1,1,"C");
      $this->SetFont('Arial','',12);
      
      //Display table product rows
      foreach($products_info as $row){
        $this->Cell(80,9,$row["name"],"LR",0);
        $this->Cell(40,9,$row["price"],"R",0,"R");
        $this->Cell(30,9,$row["qty"],"R",0,"C");
        $this->Cell(40,9,$row["total"],"R",1,"R");
      }
      //Display table empty rows
      for($i=0;$i<12-count($products_info);$i++)
      {
        $this->Cell(80,9,"","LR",0);
        $this->Cell(40,9,"","R",0,"R");
        $this->Cell(30,9,"","R",0,"C");
        $this->Cell(40,9,"","R",1,"R");
      }
      //Display table total row
      $this->SetFont('Arial','B',12);
      $this->Cell(150,9,"TOTAL",1,0,"R");
      $this->Cell(40,9,$info["total_amt"],1,1,"R");
      
      //Display amount in words
      $this->SetY(225);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
    //   $this->Cell(0,9,"Amount in Words ",0,1);
      $this->SetFont('Arial','',12);
    //   $this->Cell(0,9,$info["words"],0,1);
      
    }
    function Footer(){
      
      //set footer position
      $this->SetY(-50);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,10,"for LaundryBest",0,1,"R");
      $this->Ln(15);
      $this->SetFont('Arial','',12);
      $this->Cell(0,10,"Authorized Signature",0,1,"R");
      $this->SetFont('Arial','',10);
      
      //Display Footer Text
      $this->Cell(0,10,"This is a computer generated invoice",0,1,"C");
      
    }
    
  }
  //Create A4 Page with Portrait 
  $pdf=new PDF("P","mm","A4");
  $pdf->AddPage();
  $pdf->body($info,$products_info);
  $pdf->Output();
?>
