<?php
    if(isset($_POST["dataId"])){
        $classDelete = new classDelete($_POST["dataId"]);
        $classDelete->deleteData();
    }

    class classDelete{
        private $dataId;

        // Methods
        function __construct($dataId){
            $this->dataId = $dataId;
        }

        function deleteData(){
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

                // User Account Info
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = $id");
                while($row = mysqli_fetch_assoc($fetch_data)){

                    $fullName = $row["u_last_name"] ."," . $row["u_middle_name"] ." " . $row["u_first_name"];
                    
                    // Manage Salary Staff Info
                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM dispatch_tbl WHERE dt_id = '$this->dataId'");
                    while($row = mysqli_fetch_assoc($fetch_data)){

                        if($row["dt_route"] == "1"){
                            $cttonova = "Central Terminal To Novaliches";
                            $action = "delete";
                            $page = "MANAGE DISPATCH";
                            $description = $fullName . " add data of |Pao FullName = ". $row["dt_pao_full_name"] . "| |Driver FullName = " . $row["dt_driver_full_name"] . "| |Mpuj No. = ". $row["dt_mpuj_num"] . "| |Plate No. = ". $row["dt_plate_num"] . "| |Time of Departure = ". $row["dt_time_of_departure"] . "| |Expected arrival = ". $row["dt_expected_arrival"] . "| |Route = ". $cttonova  ."| on";

                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Delete Code
                                $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM dispatch_tbl WHERE dt_id = '$this->dataId'");

                                if($query_delete){
                                    echo "Success Delete";
                                }
                            }
                        }else{
                            $novatoct = "Novaliches to Central Terminal";
                            $action = "delete";
                            $page = "MANAGE DISPATCH";
                            $description = $fullName . " add data of |Pao FullName = ". $row["dt_pao_full_name"] . "| |Driver FullName = " . $row["dt_driver_full_name"] . "| |Mpuj No. = ". $row["dt_mpuj_num"] . "| |Plate No. = ". $row["dt_plate_num"] . "| |Time of Departure = ". $row["dt_time_of_departure"] . "| |Expected arrival = ". $row["dt_expected_arrival"] . "| |Route = ". $novatoct  ."| on";

                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Delete Code
                                $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM dispatch_tbl WHERE dt_id = '$this->dataId'");

                                if($query_delete){
                                    echo "Success Delete";
                                }
                            }
                        }

                        
                    }
                }
            }
        }
    }
?>