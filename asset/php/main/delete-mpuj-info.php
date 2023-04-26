<?php
    if(isset($_POST["dataId"])){
        $classDeleteData = new classDeleteData($_POST["dataId"]);
        $classDeleteData->deleteData();
    }

    class classDeleteData{
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

            // Variables
            $timeNow = $classDateAndTime->timeNowF();
            $dateNNOW = date("Y-m-d");

            $cookie_name = "user";
            if(isset($_COOKIE[$cookie_name])) {
                $id = $_COOKIE[$cookie_name];

                // User Account Info
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = $id");
                while($row = mysqli_fetch_assoc($fetch_data)){

                    $fullName = $row["u_last_name"] ."," . $row["u_middle_name"] ." " . $row["u_first_name"];
                    
                    // Manage Salary Staff Info
                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl WHERE mit_id = '$this->dataId'");
                    while($row = mysqli_fetch_assoc($fetch_data)){

                        $action = "delete";
                        $page = "MANAGE MPUJ";
                        $description = $fullName . " delete data of |Chasis No. = ". $row["mit_chassis_num"] . "| |Engine No. = " .$row["mit_engine"] . "| |Plate No. = ". $row["mit_plate_num"] . "| |Mpuj No. = ". $row["mit_mpuj_num"] . "| |Status = ". $row["mit_status"] ."| on";

                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                        if($query_insert){
                            // Delete Code
                            $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM mpuj_info_tbl WHERE mit_id = '$this->dataId'");

                            if($query_delete){
                                echo "Success Delete";
                            }
                        }
                    }
                }
            }
        }
    }
?>