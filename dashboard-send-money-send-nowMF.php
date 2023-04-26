<?php
    
    if(isset($_POST["dashboardSendReceiverID"]) || isset($_POST["amountToSend"])){
        $classMoneySendNow = new classMoneySendNow();
        $classMoneySendNow->setReceiverAndAmountToSend($_POST["dashboardSendReceiverID"], $_POST["amountToSend"]);
        $classMoneySendNow->transaction();
    }


    class classMoneySendNow{
        private $receiverID;
        private $amountToSend;

        function setReceiverAndAmountToSend($receiverID ,$amountToSend){
            $this->receiverID = $receiverID;
            $this->amountToSend = $amountToSend;
        }

        function transaction(){
            // PAGE Connection on Database 
            require_once __DIR__ . './helper/connectionHF.php';
            // Page User Session ID
            require_once("loginMF.php");
            // PAGE Reference Number
            require_once __DIR__ . './helper/reference-noHF.php';
            // PAGE Date and Time
            require_once("./helper/date-and-timeHF.php");

            // CLASS Connection on Database 
            $classDataBaseConnection = new classDataBaseConnection();
            // CLASS Reference Number
            $classReferenceNo = new classReferenceNo();
            // CLASS Date and Time
            $classDateAndTime = new classDateAndTime();

            // Variable Reference Number
            $referenceNo = $classReferenceNo->referenceNumberF();
            // VARIABLES Time Now
            $timeRegister = $classDateAndTime->timeNowF();
            // VARIABLES Date Now
            $dateRegister = $classDateAndTime->dateNowF();

            if(isset($_SESSION["uat_id"])){
                $uatID = $_SESSION["uat_id"];
            }

            // Minuser on Sender balance
            $fetch_money = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_balance_tbl WHERE ubt_uat_id = '$uatID' ");
            while($row = mysqli_fetch_assoc($fetch_money)){
                $db_ubt_balance = $row["ubt_balance"];
                $totalBalance = $db_ubt_balance - $this->amountToSend;

                // Update the Balance of Sender
                $query_update = mysqli_query($classDataBaseConnection->connect(), "UPDATE user_balance_tbl SET ubt_balance ='$totalBalance' WHERE ubt_uat_id ='$uatID' ");
                if($query_update){

                    // Fetch Receiver UAT ID
                    $fetch_id = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_personal_details_tbl WHERE updt_etnebID = '$this->receiverID' ");
                    while($row = mysqli_fetch_assoc($fetch_id)){
                        $db_updt_uat_id = $row["updt_uat_id"];

                        // Fetch The Balance of Receiver
                        $fetch_receiver_balance = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_balance_tbl WHERE ubt_uat_id = '$db_updt_uat_id' ");
                        while($row = mysqli_fetch_assoc($fetch_receiver_balance)){
                            $db_ubt_balance = $row["ubt_balance"];
                            $totalBalanceReceive =  $db_ubt_balance + $this->amountToSend;

                            // Update the Balance of Receiver
                            $query_update = mysqli_query($classDataBaseConnection->connect(), "UPDATE user_balance_tbl SET ubt_balance ='$totalBalanceReceive' WHERE ubt_uat_id ='$db_updt_uat_id' ");
                            if($query_update){
                                
                                // Fetch Sender Etneb ID
                                $fetch_id = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_personal_details_tbl WHERE updt_uat_id = '$uatID' ");
                                while($row = mysqli_fetch_assoc($fetch_id)){
                                    $db_updt_etnebID = $row["updt_etnebID"];
                                    
                                    // Insert the transaction Information
                                    $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO user_history_tbl (uht_uat_sender_id ,uht_uat_receiver_id ,uht_sender_id, uht_receiver_id, uht_reference_no, uht_amount_to_send ,uht_create_time, uht_create_date) VALUES  ('$uatID' ,'$db_updt_uat_id' ,'$db_updt_etnebID' ,'$this->receiverID' ,'$referenceNo' ,'$this->amountToSend' ,'$timeRegister','$dateRegister')");
                                    if($query_insert){
                                        echo "Success";
                                    }
                                }
                            }   
                        }
                    }
                }
            }
        }
    }
?>