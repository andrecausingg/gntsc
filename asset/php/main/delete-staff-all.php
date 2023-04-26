<?php
    if(isset($_POST["dataId"])){
        $classDeleteStaff = new classDeleteStaff($_POST["dataId"]);
        $classDeleteStaff->deleteStaff();
    }

    class classDeleteStaff{
        private $dataId;

        // Methods
        function __construct($dataId){
            $this->dataId = $dataId;
        }

        function deleteStaff(){
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
                    $action = "delete";

                    // Manage Staff Info
                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_id = '$this->dataId'");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        $fullNameInsert = $row["sit_surname"] . "," . $row["sit_middlename"]  ." ". $row["sit_firstname"];

                        if($row["sit_role_name"] == "PUJ"){
                            $page = "MANAGE MPUJ DRIVER";
                            $description = $fullName . " delete data of |Role = ". $row["sit_role_name"] . "| |Full Name = " . $fullNameInsert . "| |Address = ". $row["sit_address"] . "| |Contact No. = ". $row["sit_contact_num"] . "| |Birth Date(M/D/Y) = ". $row["sit_birthdate"] . "| |Birth Place = ". $row["sit_birthplace"] . "| |Gender = ". $row["sit_gender"] . "| |Civil Status = ". $row["sit_civil_status"] . "| |License = ". $row["sit_license"] ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Delete Code
                                $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM staff_info_tbl WHERE sit_id = '$this->dataId'");
    
                                if($query_delete){
                                    echo "Success Delete";
                                }
                            }
                        }else if($row["sit_role_name"] == "TRA"){
                            $page = "MANAGE TRAD DRIVER";
                            $description = $fullName . " delete data of |Role = ". $row["sit_role_name"] . "| |Full Name = " . $fullNameInsert . "| |Address = ". $row["sit_address"] . "| |Contact No. = ". $row["sit_contact_num"] . "| |Birth Date(M/D/Y) = ". $row["sit_birthdate"] . "| |Birth Place = ". $row["sit_birthplace"] . "| |Gender = ". $row["sit_gender"] . "| |Civil Status = ". $row["sit_civil_status"] . "| |License = ". $row["sit_license"] ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Delete Code
                                $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM staff_info_tbl WHERE sit_id = '$this->dataId'");
    
                                if($query_delete){
                                    echo "Success Delete";
                                }
                            }
                        }else if($row["sit_role_name"] == "PAO"){
                            $page = "MANAGE MPUJ PAO";
                            $description = $fullName . " delete data of |Role = ". $row["sit_role_name"] . "| |Full Name = " . $fullNameInsert . "| |Address = ". $row["sit_address"] . "| |Contact No. = ". $row["sit_contact_num"] . "| |Birth Date(M/D/Y) = ". $row["sit_birthdate"] . "| |Birth Place = ". $row["sit_birthplace"] . "| |Gender = ". $row["sit_gender"] . "| |Civil Status = ". $row["sit_civil_status"] ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Delete Code
                                $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM staff_info_tbl WHERE sit_id = '$this->dataId'");
    
                                if($query_delete){
                                    echo "Success Delete";
                                }
                            }
                        }else if($row["sit_role_name"] == "STA"){
                            $page = "MANAGE STAFF";
                            $description = $fullName . " add data of |Role = ". $row["sit_role_name"] . "| |Position = " .$row["sit_position"] . "| |Full Name = " .$fullNameInsert . "| |Address = ". $row["sit_address"] . "| |Contact No. = ". $row["sit_contact_num"] . "| |Birth Date (M/D/Y) = ". $row["sit_birthdate"] . "| |Birth Place = ". $row["sit_birthplace"] . "| |Gender = ". $row["sit_gender"] . "| |Civil Status = ". $row["sit_civil_status"] ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Delete Code
                                $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM staff_info_tbl WHERE sit_id = '$this->dataId'");
    
                                if($query_delete){
                                    echo "Success Delete";
                                }
                            }
                        }else if($row["sit_role_name"] == "OPE"){
                            $page = "MANAGE MPUJ OPERATOR";
                            $description = $fullName . " delete data of |Role = ". $row["sit_role_name"] . "| |Full Name = " . $fullNameInsert . "| |Plate No. = ". $row["sit_plate_num"] . "| |Address = ". $row["sit_address"] . "| |Contact No. = ". $row["sit_contact_num"] . "| |Birth Date(M/D/Y) = ". $row["sit_birthdate"] . "| |Birth Place = ". $row["sit_birthplace"] . "| |Gender = ". $row["sit_gender"] . "| |Civil Status = ". $row["sit_civil_status"] ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Delete Code
                                $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM staff_info_tbl WHERE sit_id = '$this->dataId'");
    
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