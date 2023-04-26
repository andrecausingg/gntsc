<?php

    if(isset($_POST["driverNameTrad"]) && isset($_POST["plateNumTrad"]) && isset($_POST["dailyButawTrad"]) && isset($_POST["savingsTrad"]) && isset($_POST["terminalFeeTrad"]) && isset($_POST["monthlyButawTrad"]) && isset($_POST["memberShipFeeTrad"]) && isset($_POST["othersTrad"]) && isset($_POST["totalRemarksTrad"])){
        $classInsertMpujSalary = new classInsertMpujSalary($_POST["driverNameTrad"], $_POST["plateNumTrad"], $_POST["dailyButawTrad"], $_POST["savingsTrad"], $_POST["terminalFeeTrad"], $_POST["monthlyButawTrad"], $_POST["memberShipFeeTrad"], $_POST["totalRemarksTrad"], $_POST["othersTrad"]);
        $classInsertMpujSalary->insertData();

        // echo $_POST["driverNameTrad"];
        // echo $_POST["plateNumTrad"];
        // echo $_POST["dailyButawTrad"];
        // echo $_POST["savingsTrad"];
        // echo $_POST["terminalFeeTrad"];
        // echo $_POST["monthlyButawTrad"];
        // echo $_POST["memberShipFeeTrad"];
        // echo $_POST["dieselMpuj"];
        // echo $_POST["paoIncome"];
        // echo $_POST["pujIncome"];
        // echo $_POST["totalAmountMpuj"];
    }

    class classInsertMpujSalary{
        private $driverNameTrad;
        private $plateNumTrad;
        private $dailyButawTrad;
        private $savingsTrad;
        private $terminalFeeTrad;
        private $monthlyButawTrad;
        private $memberShipFeeTrad;
        private $totalRemarksTrad;
        private $othersTrad;

        // Methods
        function __construct($driverNameTrad, $plateNumTrad, $dailyButawTrad, $savingsTrad, $terminalFeeTrad, $monthlyButawTrad, $memberShipFeeTrad, $totalRemarksTrad, $othersTrad){
            $this->driverNameTrad = $driverNameTrad;
            $this->plateNumTrad = $plateNumTrad;
            $this->dailyButawTrad = $dailyButawTrad;
            $this->savingsTrad = $savingsTrad;
            $this->terminalFeeTrad = $terminalFeeTrad;
            $this->monthlyButawTrad = $monthlyButawTrad;
            $this->memberShipFeeTrad = $memberShipFeeTrad;
            $this->totalRemarksTrad = $totalRemarksTrad;
            $this->othersTrad = $othersTrad;
        }

        function insertData(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // File Date and Time
            require_once("../helper/others/date-and-timeHF.php");
            
            // Class
            $classDataBaseConnection = new classDataBaseConnection();
            $classDateAndTime = new classDateAndTime();

            // Variables
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
                    $description = $fullName . " add data of |Driver Name = ". $this->driverNameTrad . "| |Plate No. = " .$this->plateNumTrad . "| |Daily Butaw = ". $this->dailyButawTrad . "| |Savings = ". $this->savingsTrad . "| |Terminal Fee = ". $this->terminalFeeTrad . "| |Monthly Butaw = ". $this->monthlyButawTrad . "| |Membership = ". $this->memberShipFeeTrad . "| |Others = ". $this->totalRemarksTrad . "| |Total Remarks = ". $this->othersTrad ."| on";
                    $page = "MANAGE BUTAW";

                    $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                    if($query_insert){
                        // Insert Code
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO tradjeep_payroll_tbl (tpt_drivers_name, tpt_plate_num, tpt_daily_butaw, tpt_savings, tpt_terminal_fee, tpt_monthly_butaw, tpt_membership, tpt_others, tpt_remarks, tpt_time, tpt_date, tpt_datee) VALUES ('$this->driverNameTrad', '$this->plateNumTrad', '$this->dailyButawTrad', '$this->savingsTrad', '$this->terminalFeeTrad', '$this->monthlyButawTrad', '$this->memberShipFeeTrad', '$this->othersTrad', '$this->totalRemarksTrad', '$timeNow', '$dateNow', '$dateNNOW')");

                        if($query_insert){
                            echo "Success Insert";
                        }
                    }
                }
            }
        }
    }
?>