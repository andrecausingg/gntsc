<?php

    if(isset($_POST["driverNameMpuj"]) && isset($_POST["paoNameMpuj"]) && isset($_POST["roundsMpujOne"]) && isset($_POST["roundsMpujTwo"]) && isset($_POST["roundsMpujThree"]) && isset($_POST["roundsMpujFour"]) && isset($_POST["roundsMpujFive"]) && isset($_POST["roundsMpujSix"]) && isset($_POST["cashMpuj"]) && isset($_POST["expensesMpuj"]) && isset($_POST["handHeldMpuj"]) && isset($_POST["boundaryMpuj"]) && isset($_POST["dieselMpuj"]) && isset($_POST["paoIncome"]) && isset($_POST["pujIncome"]) && isset($_POST["totalAmountMpuj"])){
        $classInsertMpujSalary = new classInsertMpujSalary($_POST["driverNameMpuj"], $_POST["paoNameMpuj"], $_POST["roundsMpujOne"], $_POST["roundsMpujTwo"], $_POST["roundsMpujThree"], $_POST["roundsMpujFour"], $_POST["roundsMpujFive"], $_POST["roundsMpujSix"], $_POST["cashMpuj"], $_POST["expensesMpuj"], $_POST["handHeldMpuj"], $_POST["boundaryMpuj"], $_POST["dieselMpuj"], $_POST["paoIncome"], $_POST["pujIncome"], $_POST["totalAmountMpuj"]);
        $classInsertMpujSalary->insertData();

        
        // echo $_POST["driverNameMpuj"];
        // echo $_POST["paoNameMpuj"];
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

    class classInsertMpujSalary{
        private $driverNameMpuj;
        private $paoNameMpuj;
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
        function __construct($driverNameMpuj, $paoNameMpuj, $roundsMpujOne, $roundsMpujTwo, $roundsMpujThree, $roundsMpujFour, $roundsMpujFive, $roundsMpujSix, $cashMpuj, $expensesMpuj, $handHeldMpuj, $boundaryMpuj, $dieselMpuj, $paoIncome, $pujIncome, $totalAmountMpuj){
            $this->driverNameMpuj = $driverNameMpuj;
            $this->paoNameMpuj = $paoNameMpuj;
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
                    $page = "MANAGE MPUJ SALARY";
                    $description = $fullName . " add data of |Pao FullName = ". $this->paoNameMpuj . "| |Driver FullName = " .$this->driverNameMpuj . "| |Rounds No.1 = ". $this->roundsMpujOne . "| |Rounds No.2 = ". $this->roundsMpujTwo . "| |Rounds No.3 = ". $this->roundsMpujThree . "| |Rounds No.4 = ". $this->roundsMpujFour . "| |Rounds No.5 = ". $this->roundsMpujFive . "| |Rounds No.6 = ". $this->roundsMpujSix . "| |Cash = ". $this->cashMpuj . "| |Expenses = ". $this->expensesMpuj . "| |Handeld = ". $this->handHeldMpuj . "| |Boundary = ". $this->boundaryMpuj . "| |Diesel = ". $this->dieselMpuj . "| |Total Amount = ". $this->totalAmountMpuj . "| |Pao Income = ". $this->paoIncome . "| |Driver Income = ". $this->pujIncome ."| on";
                    
                    $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                    if($query_insert){
                        // Insert Code
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO mpuj_payroll_tbl (mpt_pao_fullname, mpt_driver_fullname, mpt_rounds_one, mpt_rounds_two, mpt_rounds_three, mpt_rounds_four, mpt_rounds_five, mpt_rounds_six, mpt_total_cash, mpt_expenses, mpt_handheld, mpt_boundery, mpt_diesel, mpt_amount, mpt_pao_income, mpt_driver_income, mpt_time, mpt_date, mpt_datee) VALUES ('$this->paoNameMpuj', '$this->driverNameMpuj', '$this->roundsMpujOne', '$this->roundsMpujTwo', '$this->roundsMpujThree', '$this->roundsMpujFour', '$this->roundsMpujFive', '$this->roundsMpujSix',  '$this->cashMpuj', '$this->expensesMpuj', '$this->handHeldMpuj', $this->boundaryMpuj, '$this->dieselMpuj', '$this->totalAmountMpuj', '$this->paoIncome', '$this->pujIncome', '$timeNow', '$dateNow', '$dateNNOW')");

                        if($query_insert){
                            echo "Success Insert";
                        }
                    }
                }
            }
        }
    }
?>