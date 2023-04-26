<?php
    if(isset($_POST["dataIdMpuj"]) && isset($_POST["roundsMpujOne"]) && isset($_POST["roundsMpujTwo"]) && isset($_POST["roundsMpujThree"]) && isset($_POST["roundsMpujFour"]) && isset($_POST["roundsMpujFive"]) && isset($_POST["roundsMpujSix"]) && isset($_POST["cashMpuj"]) && isset($_POST["expensesMpuj"]) && isset($_POST["handHeldMpuj"]) && isset($_POST["boundaryMpuj"]) && isset($_POST["dieselMpuj"]) && isset($_POST["paoIncome"]) && isset($_POST["pujIncome"]) && isset($_POST["totalAmountMpuj"])){
        $classUpdateMpujSalary = new classUpdateMpujSalary($_POST["dataIdMpuj"], $_POST["roundsMpujOne"], $_POST["roundsMpujTwo"], $_POST["roundsMpujThree"], $_POST["roundsMpujFour"], $_POST["roundsMpujFive"], $_POST["roundsMpujSix"], $_POST["cashMpuj"], $_POST["expensesMpuj"], $_POST["handHeldMpuj"], $_POST["boundaryMpuj"], $_POST["dieselMpuj"], $_POST["paoIncome"], $_POST["pujIncome"], $_POST["totalAmountMpuj"]);
        $classUpdateMpujSalary->updateDate();

        // echo $_POST["dataIdMpuj"];
        // echo $_POST["roundsMpuj"];
        // echo $_POST["cashMpuj"];
        // echo $_POST["expensesMpuj"];
        // echo $_POST["handHeldMpuj"];
        // echo $_POST["boundaryMpuj"];
        // echo $_POST["dieselMpuj"];
        // echo $_POST["paoIncome"];
        // echo $_POST["pujIncome"];
        // echo $_POST["totalAmountMpuj"];
    }

    class classUpdateMpujSalary{
        private $dataIdMpuj;
        private $roundsMpujOne;
        private $roundsMpujTwo;
        private $roundsMpujThree;
        private $roundsMpujFour;
        private $roundsMpujFive;
        private $roundsMpujSix;
        private $cashMpuj;
        private $expensesMpuj;
        private $handHeldMpuj;
        private $boundaryMpuj;
        private $dieselMpuj;
        private $paoIncome;
        private $pujIncome;
        private $totalAmountMpuj;

        // Methods
        function __construct($dataIdMpuj, $roundsMpujOne, $roundsMpujTwo, $roundsMpujThree, $roundsMpujFour, $roundsMpujFive, $roundsMpujSix, $cashMpuj, $expensesMpuj, $handHeldMpuj, $boundaryMpuj, $dieselMpuj, $paoIncome, $pujIncome, $totalAmountMpuj){
            $this->dataIdMpuj = $dataIdMpuj;
            $this->roundsMpujOne =  $roundsMpujOne;
            $this->roundsMpujTwo =  $roundsMpujTwo;
            $this->roundsMpujThree =  $roundsMpujThree;
            $this->roundsMpujFour =  $roundsMpujFour;
            $this->roundsMpujFive =  $roundsMpujFive;
            $this->roundsMpujSix =  $roundsMpujSix;
            $this->cashMpuj = $cashMpuj;
            $this->expensesMpuj = $expensesMpuj;
            $this->handHeldMpuj = $handHeldMpuj;
            $this->boundaryMpuj = $boundaryMpuj;
            $this->dieselMpuj = $dieselMpuj;
            $this->paoIncome = $paoIncome;
            $this->pujIncome = $pujIncome;
            $this->totalAmountMpuj = $totalAmountMpuj;
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
            if(isset($_COOKIE[$cookie_name])){
                $id = $_COOKIE[$cookie_name];

                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = $id");
                while($row = mysqli_fetch_assoc($fetch_data)){

                    $fullName = $row["u_last_name"] ."," . $row["u_middle_name"] ." " . $row["u_first_name"];
                    $action = "edit";
                    $page = "MANAGE MPUJ SALARY";

                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id = $this->dataIdMpuj");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        
                        if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujTwo != $row["mpt_rounds_two"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujSix != $row["mpt_rounds_six"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujFive != $row["mpt_rounds_five"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujFour != $row["mpt_rounds_four"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujThree != $row["mpt_rounds_three"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"] && $this->roundsMpujTwo != $row["mpt_rounds_two"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne . "| and Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujThree != $row["mpt_rounds_three"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujSix != $row["mpt_rounds_six"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujFive != $row["mpt_rounds_five"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . $this->roundsMpujFive ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"] && $this->roundsMpujFour != $row["mpt_rounds_four"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFour != $row["mpt_rounds_four"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujSix != $row["mpt_rounds_six"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"] && $this->roundsMpujFive != $row["mpt_rounds_five"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"]){
                            $description = $fullName . " change data of |Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujFive != $row["mpt_rounds_five"]){
                            $description = $fullName . " change data of |Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFour != $row["mpt_rounds_four"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFour != $row["mpt_rounds_four"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFour != $row["mpt_rounds_four"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFour != $row["mpt_rounds_four"] && $this->roundsMpujSix != $row["mpt_rounds_six"]){
                            $description = $fullName . " change data of |Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFive != $row["mpt_rounds_five"] && $this->roundsMpujSix != $row["mpt_rounds_six"]){
                            $description = $fullName . " change data of |Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFive != $row["mpt_rounds_five"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFive != $row["mpt_rounds_five"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFive != $row["mpt_rounds_five"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujSix != $row["mpt_rounds_six"] && $this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujSix != $row["mpt_rounds_six"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujSix != $row["mpt_rounds_six"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->expensesMpuj != $row["mpt_expenses"] && $this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->expensesMpuj != $row["mpt_expenses"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->boundaryMpuj != $row["mpt_boundery"] && $this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj . "| and Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->dieselMpuj != $row["mpt_diesel"]){
                            $description = $fullName . " change data of |Diesel = " . $row["mpt_diesel"] . " to " . $this->dieselMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->boundaryMpuj != $row["mpt_boundery"]){
                            $description = $fullName . " change data of |Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->expensesMpuj != $row["mpt_expenses"]){
                            $description = $fullName . " change data of |Expenses = " . $row["mpt_expenses"] . " to " . $this->expensesMpuj . "| and Boundary = " . $row["mpt_boundery"] . " to " . $this->boundaryMpuj ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujSix != $row["mpt_rounds_six"]){
                            $description = $fullName . " change data of |Rounds No.6 = " . $row["mpt_rounds_six"] . " to " . $this->roundsMpujSix ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFive != $row["mpt_rounds_five"]){
                            $description = $fullName . " change data of |Rounds No.5 = " . $row["mpt_rounds_five"] . " to " . $this->roundsMpujFive ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujFour != $row["mpt_rounds_four"]){
                            $description = $fullName . " change data of |Rounds No.4 = " . $row["mpt_rounds_four"] . " to " . $this->roundsMpujFour ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujThree != $row["mpt_rounds_three"]){
                            $description = $fullName . " change data of |Rounds No.3 = " . $row["mpt_rounds_three"] . " to " . $this->roundsMpujThree ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujTwo != $row["mpt_rounds_two"]){
                            $description = $fullName . " change data of |Rounds No.2 = " . $row["mpt_rounds_two"] . " to " . $this->roundsMpujTwo ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->roundsMpujOne != $row["mpt_rounds_one"]){
                            $description = $fullName . " change data of |Rounds No.1 = ". $row["mpt_rounds_one"] . " to " . $this->roundsMpujOne ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_payroll_tbl SET mpt_rounds_one = '$this->roundsMpujOne', mpt_rounds_two = '$this->roundsMpujTwo', mpt_rounds_three = '$this->roundsMpujThree', mpt_rounds_four = '$this->roundsMpujFour', mpt_rounds_five = '$this->roundsMpujFive', mpt_rounds_six = '$this->roundsMpujSix', mpt_total_cash = '$this->cashMpuj', mpt_expenses =  '$this->expensesMpuj', mpt_handheld = '$this->handHeldMpuj', mpt_boundery = '$this->boundaryMpuj', mpt_diesel = '$this->dieselMpuj', mpt_amount = '$this->totalAmountMpuj', mpt_pao_income = '$this->paoIncome', mpt_driver_income = '$this->pujIncome' WHERE mpt_id ='$this->dataIdMpuj'");
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