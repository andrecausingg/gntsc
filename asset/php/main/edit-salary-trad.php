<?php
    if(isset($_POST["dataIdTradEdit"]) && isset($_POST["plateNumTradEdit"]) && isset($_POST["dailyButawTradEdit"]) && isset($_POST["savingsTradEdit"]) && isset($_POST["terminalFeeTradEdit"]) && isset($_POST["monthlyButawTradEdit"]) && isset($_POST["memberShipFeeTradEdit"]) && isset($_POST["totalRemarksTrad"]) && isset($_POST["othersTradEdit"])){
        $classUpdateTradSalary = new classUpdateTradSalary($_POST["dataIdTradEdit"], $_POST["plateNumTradEdit"], $_POST["dailyButawTradEdit"], $_POST["savingsTradEdit"], $_POST["terminalFeeTradEdit"], $_POST["monthlyButawTradEdit"], $_POST["memberShipFeeTradEdit"], $_POST["totalRemarksTrad"], $_POST["othersTradEdit"]);
        $classUpdateTradSalary->updateDate();
        // echo $_POST["dataIdTradEdit"];
        // echo $_POST["plateNumTradEdit"];
        // echo $_POST["dailyButawTradEdit"];
        // echo $_POST["savingsTradEdit"];
        // echo $_POST["terminalFeeTradEdit"];
        // echo $_POST["monthlyButawTradEdit"];
        // echo $_POST["memberShipFeeTradEdit"];
        // echo $_POST["othersTradEdit"];
        // echo $_POST["totalRemarksTrad"];
    }

    class classUpdateTradSalary{
        private $dataIdTradEdit;
        private $plateNumTradEdit;
        private $dailyButawTradEdit;
        private $savingsTradEdit;
        private $terminalFeeTradEdit;
        private $monthlyButawTradEdit;
        private $memberShipFeeTradEdit;
        private $totalRemarksTrad;
        private $othersTradEdit;

        // Methods
        function __construct($dataIdTradEdit, $plateNumTradEdit, $dailyButawTradEdit, $savingsTradEdit, $terminalFeeTradEdit, $monthlyButawTradEdit, $memberShipFeeTradEdit, $totalRemarksTrad, $othersTradEdit){
            $this->dataIdTradEdit = $dataIdTradEdit;
            $this->plateNumTradEdit = $plateNumTradEdit;
            $this->dailyButawTradEdit = $dailyButawTradEdit;
            $this->savingsTradEdit = $savingsTradEdit;
            $this->terminalFeeTradEdit = $terminalFeeTradEdit;
            $this->monthlyButawTradEdit = $monthlyButawTradEdit;
            $this->memberShipFeeTradEdit = $memberShipFeeTradEdit;
            $this->othersTradEdit = $othersTradEdit;
            $this->totalRemarksTrad = $totalRemarksTrad;
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
                    $page = "MANAGE BUTAW";

                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM tradjeep_payroll_tbl WHERE tpt_id = $this->dataIdTradEdit");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                    
                        if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->dailyButawTradEdit != $row["tpt_daily_butaw"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->savingsTradEdit != $row["tpt_savings"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"] && $this->dailyButawTradEdit != $row["tpt_daily_butaw"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit . "| and Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"] && $this->savingsTradEdit != $row["tpt_savings"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit . "| and Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"]){
                            $description = $fullName . " change data of |Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"]){
                            $description = $fullName . " change data of |Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->savingsTradEdit != $row["tpt_savings"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->savingsTradEdit != $row["tpt_savings"] && $this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->savingsTradEdit != $row["tpt_savings"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"]){
                            $description = $fullName . " change data of |Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->savingsTradEdit != $row["tpt_savings"] && $this->terminalFeeTradEdit != $row["tpt_terminal_fee"]){
                            $description = $fullName . " change data of |Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit . "| and Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"]){
                            $description = $fullName . " change data of |Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->terminalFeeTradEdit != $row["tpt_terminal_fee"] && $this->monthlyButawTradEdit != $row["tpt_monthly_butaw"]){
                            $description = $fullName . " change data of |Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit . "| and Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->monthlyButawTradEdit != $row["tpt_monthly_butaw"] && $this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit . "| and Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->memberShipFeeTradEdit != $row["tpt_membership"] && $this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit . "| and Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->memberShipFeeTradEdit != $row["tpt_membership"]){
                            $description = $fullName . " change data of |Membership = " . $row["tpt_membership"] . " to " . $this->memberShipFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->othersTradEdit != $row["tpt_others"]){
                            $description = $fullName . " change data of |Others = " . $row["tpt_others"] . " to " . $this->othersTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNumTradEdit != $row["tpt_plate_num"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tpt_plate_num"] . " to " . $this->plateNumTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dailyButawTradEdit != $row["tpt_daily_butaw"]){
                            $description = $fullName . " change data of |Daily Butaw = " . $row["tpt_daily_butaw"] . " to " . $this->dailyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->savingsTradEdit != $row["tpt_savings"]){
                            $description = $fullName . " change data of |Savings = " . $row["tpt_savings"] . " to " . $this->savingsTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->terminalFeeTradEdit != $row["tpt_terminal_fee"]){
                            $description = $fullName . " change data of |Terminal Fee = " . $row["tpt_terminal_fee"] . " to " . $this->terminalFeeTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->monthlyButawTradEdit != $row["tpt_monthly_butaw"]){
                            $description = $fullName . " change data of |Monthly Butaw = " . $row["tpt_monthly_butaw"] . " to " . $this->monthlyButawTradEdit ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_payroll_tbl SET tpt_plate_num = '$this->plateNumTradEdit', tpt_daily_butaw = '$this->dailyButawTradEdit', tpt_savings =  '$this->savingsTradEdit', tpt_terminal_fee = '$this->terminalFeeTradEdit', tpt_monthly_butaw = '$this->monthlyButawTradEdit', tpt_membership = '$this->memberShipFeeTradEdit', tpt_others = '$this->othersTradEdit', tpt_remarks = '$this->totalRemarksTrad' WHERE tpt_id ='$this->dataIdTradEdit'");
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