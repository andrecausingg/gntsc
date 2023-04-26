<?php
    if(isset($_POST["chasisNum"]) && isset($_POST["plateNum"]) && isset($_POST["mpujNum"]) && isset($_POST["engineNum"]) && isset($_POST["status"])){
        $classInsertMpujInfo = new classInsertMpujInfo($_POST["chasisNum"], $_POST["plateNum"], $_POST["mpujNum"], $_POST["engineNum"], $_POST["status"]);
        $classInsertMpujInfo->insertData();
    }

    class classInsertMpujInfo{
        private $chasisNum;
        private $plateNum;
        private $mpujNum;
        private $engineNum;
        private $status;

        // Methods
        function __construct($chasisNum, $plateNum, $mpujNum, $engineNum, $status){
            $this->chasisNum = $chasisNum;
            $this->plateNum = $plateNum;
            $this->mpujNum = $mpujNum;
            $this->engineNum = $engineNum;
            $this->status = $status;
        }

        function insertData(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // File Date and Time
            require_once("../helper/others/date-and-timeHF.php");
            
            // Class
            $classDataBaseConnection = new classDataBaseConnection();
            $classDateAndTime = new classDateAndTime();

            $timeNow = $classDateAndTime->timeNowF();
            $dateNow = $classDateAndTime->dateNowF();

            $dateNNOW = date("Y-m-d");

            $cookie_name = "user";
            if(isset($_COOKIE[$cookie_name])) {
                $id = $_COOKIE[$cookie_name];

                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = $id");
                while($row = mysqli_fetch_assoc($fetch_data)){

                    $fullName = $row["u_last_name"] ."," . $row["u_middle_name"] ." " . $row["u_first_name"];
                    $action = "create";
                    $page = "MANAGE MPUJ";
                    $description = $fullName . " add data of |Chasis No. = ". $this->chasisNum . "| |Engine No. = " .$this->engineNum . "| |Plate No. = ". $this->plateNum . "| |Mpuj No. = ". $this->mpujNum . "| |Status = ". $this->status ."| on";
                    
                    $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                    if($query_insert){
                        // Insert Code
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO mpuj_info_tbl (mit_chassis_num, mit_engine, mit_plate_num, mit_mpuj_num, mit_status, mit_time, mit_date, mit_datee) VALUES ('$this->chasisNum', '$this->engineNum', '$this->plateNum', '$this->mpujNum', '$this->status', '$timeNow', '$dateNow', '$dateNNOW')");
                                
                        if($query_insert){
                            echo "Success Insert";
                        }
                    }
                }
            }
        }
    }
?>