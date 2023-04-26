<?php
    if(isset($_POST["driverNameStaff"]) && isset($_POST["numDaysStaff"]) && isset($_POST["rateStaff"]) && isset($_POST["amountStaff"])){
        $classCRUD = new classCRUD($_POST["driverNameStaff"], $_POST["numDaysStaff"], $_POST["rateStaff"], $_POST["amountStaff"]);
        $classCRUD->insertData();
    }

    class classCRUD{
        private $driverNameStaff;
        private $numDaysStaff;
        private $rateStaff;
        private $amountStaff;

        // Methods
        function __construct($driverNameStaff, $numDaysStaff, $rateStaff, $amountStaff){
            $this->driverNameStaff = $driverNameStaff;
            $this->numDaysStaff = $numDaysStaff;
            $this->rateStaff = $rateStaff;
            $this->amountStaff = $amountStaff;
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
                    $description = $fullName . " add data of |Staff Name = ". $this->driverNameStaff . "| |No. of Days = " .$this->numDaysStaff . "| |Rate = ". $this->rateStaff . "| |Amount = ". $this->amountStaff ."| on";
                    $page = "Manage Staff Salary";

                    $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                    if($query_insert){
                        // Insert Code
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO staff_payroll_tbl (spt_fullname, spt_num_days, spt_rate, spt_amount, spt_time, spt_date, spt_datee) VALUES ('$this->driverNameStaff', '$this->numDaysStaff', '$this->rateStaff', '$this->amountStaff', '$timeNow', '$dateNow', ' $dateNNOW')");
                                
                        if($query_insert){
                            echo "Success Insert";
                        }
                    }
                }
            }
        }
    }
?>