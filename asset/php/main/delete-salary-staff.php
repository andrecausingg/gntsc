<?php
    if(isset($_POST["dataId"])){
        $classDeleteSalary = new classDeleteSalary($_POST["dataId"]);
        $classDeleteSalary->deleteSalary();
    }

    class classDeleteSalary{
        private $dataId;

        // Methods
        function __construct($dataId){
            $this->dataId = $dataId;
        }

        function deleteSalary(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // Date Time
            require_once("../helper/others/date-and-timeHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
            $classDateAndTime = new classDateAndTime();

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
                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_payroll_tbl WHERE spt_id = '$this->dataId'");
                    while($row = mysqli_fetch_assoc($fetch_data)){

                        $action = "delete";
                        $page = "MANAGE STAFF SALARY";
                        $description = $fullName . " delete data of |Staff Name = ". $row["spt_fullname"] . "| |No. of Days = " . $row["spt_num_days"] . "| |Rate = ". $row["spt_rate"] . "| |Amount = ". $row["spt_amount"] ."| on";
               
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                        if($query_insert){
                            // Delete Code
                            $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM staff_payroll_tbl WHERE spt_id = '$this->dataId'");
    
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