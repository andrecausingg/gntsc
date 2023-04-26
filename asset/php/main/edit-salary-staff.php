<?php
    if(isset($_POST["dataId"]) && isset($_POST["numDaysStaff"]) && isset($_POST["rateStaff"]) && isset($_POST["amountStaff"])){
        $classEditSalaryStaff = new classEditSalaryStaff($_POST["dataId"], $_POST["numDaysStaff"], $_POST["rateStaff"], $_POST["amountStaff"]);
        $classEditSalaryStaff->updateDate();
    }

    class classEditSalaryStaff{
        private $dataId;
        private $numDaysStaff;
        private $rateStaff;
        private $amountStaff;

        // Methods
        function __construct($dataId, $numDaysStaff, $rateStaff, $amountStaff){
            $this->dataId = $dataId;
            $this->numDaysStaff = $numDaysStaff;
            $this->rateStaff = $rateStaff;
            $this->amountStaff = $amountStaff;
        }

        function updateDate(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // File Date and Time
            require_once("../helper/others/date-and-timeHF.php");
            
            // Class
            $classDataBaseConnection = new classDataBaseConnection();
            $classDateAndTime = new classDateAndTime();

            $timeNow = $classDateAndTime->timeNowF();
            $dateNNOW = date("Y-m-d");

            $cookie_name = "user";
            if(isset($_COOKIE[$cookie_name])) {
                $id = $_COOKIE[$cookie_name];

                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = $id");
                while($row = mysqli_fetch_assoc($fetch_data)){

                    $fullName = $row["u_last_name"] ."," . $row["u_middle_name"] ." " . $row["u_first_name"];
                    $action = "edit";
                    $page = "MANAGE STAFF SALARY";

                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_payroll_tbl WHERE spt_id = $this->dataId");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        
                        if($this->numDaysStaff != $row["spt_num_days"] && $this->rateStaff != $row["spt_rate"]){
                            $description = $fullName . " change data of |No. of Days = ". $row["spt_num_days"] . " to " . $this->numDaysStaff . "| and Rate = " . $row["spt_rate"] . " to " . $this->rateStaff ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_payroll_tbl SET spt_num_days = '$this->numDaysStaff', spt_rate = '$this->rateStaff', spt_amount =  '$this->amountStaff' WHERE spt_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->numDaysStaff != $row["spt_num_days"]){
                            $description = $fullName . " change data of |No. of Days = ". $row["spt_num_days"] . " to " . $this->numDaysStaff ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_payroll_tbl SET spt_num_days = '$this->numDaysStaff', spt_rate = '$this->rateStaff', spt_amount =  '$this->amountStaff' WHERE spt_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->rateStaff != $row["spt_rate"]){
                            $description = $fullName . " change data of |Rate = " . $row["spt_rate"] . " to " . $this->rateStaff ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_payroll_tbl SET spt_num_days = '$this->numDaysStaff', spt_rate = '$this->rateStaff', spt_amount =  '$this->amountStaff' WHERE spt_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>