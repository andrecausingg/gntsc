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
                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id = '$this->dataId'");
                    while($row = mysqli_fetch_assoc($fetch_data)){

                        $action = "delete";
                        $page = "MANAGE MPUJ SALARY";
                        $description = $fullName . " delete data of |Pao FullName = ". $row["mpt_pao_fullname"] . "| |Driver FullName = " . $row["mpt_driver_fullname"] . "| |Rounds No.1 = ". $row["mpt_rounds_one"] . "| |Rounds No.2 = ". $row["mpt_rounds_two"] . "| |Rounds No.3 = ". $row["mpt_rounds_three"] . "| |Rounds No.4 = ". $row["mpt_rounds_four"] . "| |Rounds No.5 = ". $row["mpt_rounds_five"] . "| |Rounds No.6 = ". $row["mpt_rounds_six"] . "| |Cash = ". $row["mpt_total_cash"] . "| |Expenses = ". $row["mpt_expenses"] . "| |Handeld = ". $row["mpt_handheld"] . "| |Boundary = ". $row["mpt_boundery"] . "| |Diesel = ". $row["mpt_diesel"] . "| |Total Amount = ". $row["mpt_amount"] . "| |Pao Income = ". $row["mpt_pao_income"] . "| |Driver Income = ". $row["mpt_driver_income"] ."| on";

                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                        if($query_insert){
                            // Delete Code
                            $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM mpuj_payroll_tbl WHERE mpt_id = '$this->dataId'");

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