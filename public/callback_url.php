<?php
header("Content-Type:application/json");

$id = $_GET['id'];

  $stkCallbackResponse = file_get_contents('php://input');
  $logFile = "stkPushCallbackResponse.json";
  
  
        $jsonMpesaResponse = json_decode($stkCallbackResponse, true);
 
          $strResultCode=$jsonMpesaResponse["Body"]["stkCallback"]["ResultCode"];
          $strCheckoutRequestID=$jsonMpesaResponse["Body"]["stkCallback"]["CheckoutRequestID"];
          if($strResultCode==0){
          $strMpesaReceiptNumber=$jsonMpesaResponse["Body"]["stkCallback"]["CallbackMetadata"]["Item"][1]["Value"];
         $strAmount=$jsonMpesaResponse["Body"]["stkCallback"]["CallbackMetadata"]["Item"][0]["Value"];
          }
        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "development";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
              $log = fopen($logFile, "a");
              fwrite($log, $stkCallbackResponse);
              fclose($log);
              
              if($strResultCode==0){
  
                         $sql = "INSERT INTO mpesa_resp (receipt_number, ref_number, phone, amount, source)
                        VALUES ('$strMpesaReceiptNumber', '$ref', '$ref', '$ref', '$ref');";
                        
                        
                        if ($conn->multi_query($sql) === TRUE) {
                            
                            
                           echo "success";
                          
                        }     else{
                            echo "Error 1";
                        }
              
              }else{
                  echo "Error 2";
              }
                 

    
