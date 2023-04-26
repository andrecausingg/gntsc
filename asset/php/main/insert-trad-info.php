<?php
    if(isset($_POST["plateNum"])){
        $classInsertMpujInfo = new classInsertMpujInfo($_POST["plateNum"]);
        $classInsertMpujInfo->insertData();
    }

    class classInsertMpujInfo{
        private $plateNum;

        // Methods
        function __construct($plateNum){
            $this->plateNum = $plateNum;
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
                    $page = "MANAGE TRAD";
                    $description = $fullName . " add data of |Plate No. = ". $this->plateNum ."| on";
                    
                    $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                    if($query_insert){
                        // Insert Code
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO tradjeep_info_tbl (tjt_plate_num, tjt_time, tjt_date, tjt_datee) VALUES ('$this->plateNum', '$timeNow', '$dateNow', '$dateNNOW')");
                                
                        if($query_insert){
                            echo "Success Insert";
                        }
                    }
                }
            }
        }
    }
?>