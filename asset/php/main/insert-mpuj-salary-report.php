<?php

    if(isset($_POST["roundOne"]) || isset($_POST["roundTwo"]) || isset($_POST["roundThree"]) || isset($_POST["roundFour"]) || isset($_POST["roundFive"]) || isset($_POST["roundSix"])){
        $classInsertMpujSalaryReport = new classInsertMpujSalaryReport($_POST["roundOne"], $_POST["roundTwo"], $_POST["roundThree"], $_POST["roundFour"], $_POST["roundFive"], $_POST["roundSix"]);
        $classInsertMpujSalaryReport->insertData();

        // echo $_POST["roundOne"];
        // echo $_POST["roundTwo"];
        // echo $_POST["roundThree"];
        // echo $_POST["roundFour"];
        // echo $_POST["roundFive"];
        // echo $_POST["roundSix"];
        // echo $_POST["boundaryMpuj"];
        // echo $_POST["dieselMpuj"];
        // echo $_POST["paoIncome"];
        // echo $_POST["pujIncome"];
        // echo $_POST["totalAmountMpuj"];
    }

    class classInsertMpujSalaryReport{
        private $roundOne;
        private $roundTwo;
        private $roundThree;
        private $roundFour;
        private $roundFive;
        private $roundSix;

        // Methods
        function __construct($roundOne, $roundTwo, $roundThree, $roundFour, $roundFive, $roundSix){
            $this->roundOne = $roundOne;
            $this->roundTwo = $roundTwo;
            $this->roundThree = $roundThree;
            $this->roundFour = $roundFour;
            $this->roundFive = $roundFive;
            $this->roundSix = $roundSix;
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

            if($this->roundOne != 0 && $this->roundTwo != 0 && $this->roundThree != 0 && $this->roundFour != 0 && $this->roundFive != 0 && $this->roundSix != 0){
                // Round 1 
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundOne'");
                while($row = mysqli_fetch_assoc($fetch_data)){
                    $mpt_pao_fullnameOne = $row["mpt_pao_fullname"];
                    $mpt_driver_fullnameOne = $row["mpt_driver_fullname"];
                    $mpt_rounds = $row["mpt_rounds"];
                    $mpt_total_cashOne = $row["mpt_total_cash"];
                    $mpt_expensesOne = $row["mpt_expenses"];
                    $mpt_handheldOne = $row["mpt_handheld"];
                    $mpt_bounderyOne = $row["mpt_boundery"];
                    $mpt_dieselOne = $row["mpt_diesel"];
                    $mpt_amountOne = $row["mpt_amount"];
                    $mpt_pao_incomeOne = $row["mpt_pao_income"];
                    $mpt_driver_incomeOne = $row["mpt_driver_income"];

                    // Round 2
                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundTwo'");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        $mpt_pao_fullnameTwo = $row["mpt_pao_fullname"];
                        $mpt_driver_fullnameTwo = $row["mpt_driver_fullname"];
                        $mpt_roundsTwo = $row["mpt_rounds"];
                        $mpt_total_cashTwo = $row["mpt_total_cash"];
                        $mpt_expensesTwo = $row["mpt_expenses"];
                        $mpt_handheldTwo = $row["mpt_handheld"];
                        $mpt_bounderyTwo = $row["mpt_boundery"];
                        $mpt_dieselTwo = $row["mpt_diesel"];
                        $mpt_amountTwo = $row["mpt_amount"];
                        $mpt_pao_incomeTwo = $row["mpt_pao_income"];
                        $mpt_driver_incomeTwo = $row["mpt_driver_income"];

                        // Round 3
                        $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundThree'");
                        while($row = mysqli_fetch_assoc($fetch_data)){
                            $mpt_pao_fullnameThree = $row["mpt_pao_fullname"];
                            $mpt_driver_fullnameThree = $row["mpt_driver_fullname"];
                            $mpt_roundsThree = $row["mpt_rounds"];
                            $mpt_total_cashThree = $row["mpt_total_cash"];
                            $mpt_expensesThree = $row["mpt_expenses"];
                            $mpt_handheldThree = $row["mpt_handheld"];
                            $mpt_bounderyThree = $row["mpt_boundery"];
                            $mpt_dieselThree = $row["mpt_diesel"];
                            $mpt_amountThree = $row["mpt_amount"];
                            $mpt_pao_incomeThree = $row["mpt_pao_income"];
                            $mpt_driver_incomeThree = $row["mpt_driver_income"];

                            // Round 4
                            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundFour'");
                            while($row = mysqli_fetch_assoc($fetch_data)){
                                $mpt_pao_fullnameFour = $row["mpt_pao_fullname"];
                                $mpt_driver_fullnameFour = $row["mpt_driver_fullname"];
                                $mpt_roundsFour = $row["mpt_rounds"];
                                $mpt_total_cashFour = $row["mpt_total_cash"];
                                $mpt_expensesFour = $row["mpt_expenses"];
                                $mpt_handheldFour = $row["mpt_handheld"];
                                $mpt_bounderyFour = $row["mpt_boundery"];
                                $mpt_dieselFour = $row["mpt_diesel"];
                                $mpt_amountFour = $row["mpt_amount"];
                                $mpt_pao_incomeFour = $row["mpt_pao_income"];
                                $mpt_driver_incomeFour = $row["mpt_driver_income"];

                                // Round 5
                                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundFive'");
                                while($row = mysqli_fetch_assoc($fetch_data)){
                                    $mpt_pao_fullnameFive = $row["mpt_pao_fullname"];
                                    $mpt_driver_fullnameFive = $row["mpt_driver_fullname"];
                                    $mpt_roundsFive = $row["mpt_rounds"];
                                    $mpt_total_cashFive = $row["mpt_total_cash"];
                                    $mpt_expensesFive = $row["mpt_expenses"];
                                    $mpt_handheldFive = $row["mpt_handheld"];
                                    $mpt_bounderyFive = $row["mpt_boundery"];
                                    $mpt_dieselFive = $row["mpt_diesel"];
                                    $mpt_amountFive = $row["mpt_amount"];
                                    $mpt_pao_incomeFive = $row["mpt_pao_income"];
                                    $mpt_driver_incomeFive = $row["mpt_driver_income"];

                                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundSix'");
                                    while($row = mysqli_fetch_assoc($fetch_data)){
                                        $mpt_pao_fullnameSix = $row["mpt_pao_fullname"];
                                        $mpt_driver_fullnameSix = $row["mpt_driver_fullname"];
                                        $mpt_roundsSix = $row["mpt_rounds"];
                                        $mpt_total_cashSix = $row["mpt_total_cash"];
                                        $mpt_expensesSix = $row["mpt_expenses"];
                                        $mpt_handheldSix = $row["mpt_handheld"];
                                        $mpt_bounderySix = $row["mpt_boundery"];
                                        $mpt_dieselSix = $row["mpt_diesel"];
                                        $mpt_amountSix = $row["mpt_amount"];
                                        $mpt_pao_incomeSix = $row["mpt_pao_income"];
                                        $mpt_driver_incomeSix = $row["mpt_driver_income"];

                                        $totalCash = $mpt_total_cashOne + $mpt_total_cashTwo + $mpt_total_cashThree + $mpt_total_cashFour + $mpt_total_cashFive + $mpt_total_cashSix;
                                        $totalExpenses = $mpt_expensesOne + $mpt_expensesTwo + $mpt_expensesThree + $mpt_expensesFour + $mpt_expensesFive + $mpt_expensesSix;
                                        $totalHandHeld = $mpt_handheldOne + $mpt_handheldTwo + $mpt_handheldThree + $mpt_handheldFour + $mpt_handheldFive + $mpt_handheldSix;
                                        $totalBoundary = $mpt_bounderyOne + $mpt_bounderyTwo + $mpt_bounderyThree + $mpt_bounderyFour + $mpt_bounderyFive + $mpt_bounderySix;
                                        $totalDiesel = $mpt_dieselOne + $mpt_dieselTwo + $mpt_dieselThree + $mpt_dieselFour + $mpt_dieselFive + $mpt_dieselSix;
                                        $totalAmount = $mpt_amountOne + $mpt_amountTwo + $mpt_amountThree + $mpt_amountFour + $mpt_amountFive + $mpt_amountSix;
                                        $totalPaoIncome = $mpt_pao_incomeOne + $mpt_pao_incomeTwo + $mpt_pao_incomeThree + $mpt_pao_incomeFour + $mpt_pao_incomeFive + $mpt_pao_incomeSix;
                                        $totalDriverIncome = $mpt_driver_incomeOne + $mpt_driver_incomeTwo + $mpt_driver_incomeThree + $mpt_driver_incomeFour + $mpt_driver_incomeFive + $mpt_driver_incomeSix;

                                        // Insert Code
                                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO salary_mpuj_report (smr_pao_fullname, smr_driver_fullname, smr_rounds_one, smr_rounds_two, smr_rounds_three, smr_rounds_four, smr_rounds_five, smr_rounds_six, smr_total_cash, smr_expenses, smr_handheld, smr_boundery, smr_diesel, smr_amount, smr_pao_income, smr_driver_income, smr_time, smr_date) VALUES ('$mpt_pao_fullnameOne', '$mpt_driver_fullnameOne', '$mpt_total_cashSix', '$mpt_total_cashFive', '$mpt_total_cashFour', '$mpt_total_cashThree', '$mpt_total_cashTwo', '$mpt_total_cashOne','$totalCash', '$totalExpenses', '$totalHandHeld', '$totalBoundary', '$totalDiesel', '$totalAmount', '$totalPaoIncome', '$totalDriverIncome', '$timeNow', '$dateNow')");
                                        if($query_insert){
                                            echo "Success Insert";
                                        } 
                                    } // End of Rounds Six
                                } // End of Rounds Five
                            } // End of Rounds Four
                        } // End of Rounds Three
                    } // End of Rounds Two
                } // End of Rounds One
            }else if($this->roundOne != 0 && $this->roundTwo != 0 && $this->roundThree != 0 && $this->roundFour != 0 && $this->roundFive != 0 && $this->roundSix == 0){
                // Round 1 
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundOne'");
                while($row = mysqli_fetch_assoc($fetch_data)){
                    $mpt_pao_fullnameOne = $row["mpt_pao_fullname"];
                    $mpt_driver_fullnameOne = $row["mpt_driver_fullname"];
                    $mpt_rounds = $row["mpt_rounds"];
                    $mpt_total_cashOne = $row["mpt_total_cash"];
                    $mpt_expensesOne = $row["mpt_expenses"];
                    $mpt_handheldOne = $row["mpt_handheld"];
                    $mpt_bounderyOne = $row["mpt_boundery"];
                    $mpt_dieselOne = $row["mpt_diesel"];
                    $mpt_amountOne = $row["mpt_amount"];
                    $mpt_pao_incomeOne = $row["mpt_pao_income"];
                    $mpt_driver_incomeOne = $row["mpt_driver_income"];

                    // Round 2
                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundTwo'");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        $mpt_pao_fullnameTwo = $row["mpt_pao_fullname"];
                        $mpt_driver_fullnameTwo = $row["mpt_driver_fullname"];
                        $mpt_roundsTwo = $row["mpt_rounds"];
                        $mpt_total_cashTwo = $row["mpt_total_cash"];
                        $mpt_expensesTwo = $row["mpt_expenses"];
                        $mpt_handheldTwo = $row["mpt_handheld"];
                        $mpt_bounderyTwo = $row["mpt_boundery"];
                        $mpt_dieselTwo = $row["mpt_diesel"];
                        $mpt_amountTwo = $row["mpt_amount"];
                        $mpt_pao_incomeTwo = $row["mpt_pao_income"];
                        $mpt_driver_incomeTwo = $row["mpt_driver_income"];

                        // Round 3
                        $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundThree'");
                        while($row = mysqli_fetch_assoc($fetch_data)){
                            $mpt_pao_fullnameThree = $row["mpt_pao_fullname"];
                            $mpt_driver_fullnameThree = $row["mpt_driver_fullname"];
                            $mpt_roundsThree = $row["mpt_rounds"];
                            $mpt_total_cashThree = $row["mpt_total_cash"];
                            $mpt_expensesThree = $row["mpt_expenses"];
                            $mpt_handheldThree = $row["mpt_handheld"];
                            $mpt_bounderyThree = $row["mpt_boundery"];
                            $mpt_dieselThree = $row["mpt_diesel"];
                            $mpt_amountThree = $row["mpt_amount"];
                            $mpt_pao_incomeThree = $row["mpt_pao_income"];
                            $mpt_driver_incomeThree = $row["mpt_driver_income"];

                            // Round 4
                            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundFour'");
                            while($row = mysqli_fetch_assoc($fetch_data)){
                                $mpt_pao_fullnameFour = $row["mpt_pao_fullname"];
                                $mpt_driver_fullnameFour = $row["mpt_driver_fullname"];
                                $mpt_roundsFour = $row["mpt_rounds"];
                                $mpt_total_cashFour = $row["mpt_total_cash"];
                                $mpt_expensesFour = $row["mpt_expenses"];
                                $mpt_handheldFour = $row["mpt_handheld"];
                                $mpt_bounderyFour = $row["mpt_boundery"];
                                $mpt_dieselFour = $row["mpt_diesel"];
                                $mpt_amountFour = $row["mpt_amount"];
                                $mpt_pao_incomeFour = $row["mpt_pao_income"];
                                $mpt_driver_incomeFour = $row["mpt_driver_income"];

                                // Round 5
                                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundFive'");
                                while($row = mysqli_fetch_assoc($fetch_data)){
                                    $mpt_pao_fullnameFive = $row["mpt_pao_fullname"];
                                    $mpt_driver_fullnameFive = $row["mpt_driver_fullname"];
                                    $mpt_roundsFive = $row["mpt_rounds"];
                                    $mpt_total_cashFive = $row["mpt_total_cash"];
                                    $mpt_expensesFive = $row["mpt_expenses"];
                                    $mpt_handheldFive = $row["mpt_handheld"];
                                    $mpt_bounderyFive = $row["mpt_boundery"];
                                    $mpt_dieselFive = $row["mpt_diesel"];
                                    $mpt_amountFive = $row["mpt_amount"];
                                    $mpt_pao_incomeFive = $row["mpt_pao_income"];
                                    $mpt_driver_incomeFive = $row["mpt_driver_income"];

                                    $totalCash = $mpt_total_cashOne + $mpt_total_cashTwo + $mpt_total_cashThree + $mpt_total_cashFour + $mpt_total_cashFive;
                                    $totalExpenses = $mpt_expensesOne + $mpt_expensesTwo + $mpt_expensesThree + $mpt_expensesFour + $mpt_expensesFive;
                                    $totalHandHeld = $mpt_handheldOne + $mpt_handheldTwo + $mpt_handheldThree + $mpt_handheldFour + $mpt_handheldFive;
                                    $totalBoundary = $mpt_bounderyOne + $mpt_bounderyTwo + $mpt_bounderyThree + $mpt_bounderyFour + $mpt_bounderyFive;
                                    $totalDiesel = $mpt_dieselOne + $mpt_dieselTwo + $mpt_dieselThree + $mpt_dieselFour + $mpt_dieselFive;
                                    $totalAmount = $mpt_amountOne + $mpt_amountTwo + $mpt_amountThree + $mpt_amountFour + $mpt_amountFive;
                                    $totalPaoIncome = $mpt_pao_incomeOne + $mpt_pao_incomeTwo + $mpt_pao_incomeThree + $mpt_pao_incomeFour + $mpt_pao_incomeFive;
                                    $totalDriverIncome = $mpt_driver_incomeOne + $mpt_driver_incomeTwo + $mpt_driver_incomeThree + $mpt_driver_incomeFour + $mpt_driver_incomeFive;

                                    // Insert Code
                                    $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO salary_mpuj_report (smr_pao_fullname, smr_driver_fullname, smr_rounds_one, smr_rounds_two, smr_rounds_three, smr_rounds_four, smr_rounds_five, smr_total_cash, smr_expenses, smr_handheld, smr_boundery, smr_diesel, smr_amount, smr_pao_income, smr_driver_income, smr_time, smr_date) VALUES ('$mpt_pao_fullnameOne', '$mpt_driver_fullnameOne', '$mpt_total_cashFive', '$mpt_total_cashFour', '$mpt_total_cashThree', '$mpt_total_cashTwo', '$mpt_total_cashOne','$totalCash', '$totalExpenses', '$totalHandHeld', '$totalBoundary', '$totalDiesel', '$totalAmount', '$totalPaoIncome', '$totalDriverIncome', '$timeNow', '$dateNow')");
                                    if($query_insert){
                                        echo "Success Insert";
                                    } 
                                } // End of Rounds Five
                            } // End of Rounds Four
                        } // End of Rounds Three
                    } // End of Rounds Two
                } // End of Rounds One
            }else if($this->roundOne != 0 && $this->roundTwo != 0 && $this->roundThree != 0 && $this->roundFour != 0 && $this->roundFive == 0 && $this->roundSix == 0){
                // Round 1 
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundOne'");
                while($row = mysqli_fetch_assoc($fetch_data)){
                    $mpt_pao_fullnameOne = $row["mpt_pao_fullname"];
                    $mpt_driver_fullnameOne = $row["mpt_driver_fullname"];
                    $mpt_rounds = $row["mpt_rounds"];
                    $mpt_total_cashOne = $row["mpt_total_cash"];
                    $mpt_expensesOne = $row["mpt_expenses"];
                    $mpt_handheldOne = $row["mpt_handheld"];
                    $mpt_bounderyOne = $row["mpt_boundery"];
                    $mpt_dieselOne = $row["mpt_diesel"];
                    $mpt_amountOne = $row["mpt_amount"];
                    $mpt_pao_incomeOne = $row["mpt_pao_income"];
                    $mpt_driver_incomeOne = $row["mpt_driver_income"];

                    // Round 2
                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundTwo'");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        $mpt_pao_fullnameTwo = $row["mpt_pao_fullname"];
                        $mpt_driver_fullnameTwo = $row["mpt_driver_fullname"];
                        $mpt_roundsTwo = $row["mpt_rounds"];
                        $mpt_total_cashTwo = $row["mpt_total_cash"];
                        $mpt_expensesTwo = $row["mpt_expenses"];
                        $mpt_handheldTwo = $row["mpt_handheld"];
                        $mpt_bounderyTwo = $row["mpt_boundery"];
                        $mpt_dieselTwo = $row["mpt_diesel"];
                        $mpt_amountTwo = $row["mpt_amount"];
                        $mpt_pao_incomeTwo = $row["mpt_pao_income"];
                        $mpt_driver_incomeTwo = $row["mpt_driver_income"];

                        // Round 3
                        $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundThree'");
                        while($row = mysqli_fetch_assoc($fetch_data)){
                            $mpt_pao_fullnameThree = $row["mpt_pao_fullname"];
                            $mpt_driver_fullnameThree = $row["mpt_driver_fullname"];
                            $mpt_roundsThree = $row["mpt_rounds"];
                            $mpt_total_cashThree = $row["mpt_total_cash"];
                            $mpt_expensesThree = $row["mpt_expenses"];
                            $mpt_handheldThree = $row["mpt_handheld"];
                            $mpt_bounderyThree = $row["mpt_boundery"];
                            $mpt_dieselThree = $row["mpt_diesel"];
                            $mpt_amountThree = $row["mpt_amount"];
                            $mpt_pao_incomeThree = $row["mpt_pao_income"];
                            $mpt_driver_incomeThree = $row["mpt_driver_income"];

                            // Round 4
                            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundFour'");
                            while($row = mysqli_fetch_assoc($fetch_data)){
                                $mpt_pao_fullnameFour = $row["mpt_pao_fullname"];
                                $mpt_driver_fullnameFour = $row["mpt_driver_fullname"];
                                $mpt_roundsFour = $row["mpt_rounds"];
                                $mpt_total_cashFour = $row["mpt_total_cash"];
                                $mpt_expensesFour = $row["mpt_expenses"];
                                $mpt_handheldFour = $row["mpt_handheld"];
                                $mpt_bounderyFour = $row["mpt_boundery"];
                                $mpt_dieselFour = $row["mpt_diesel"];
                                $mpt_amountFour = $row["mpt_amount"];
                                $mpt_pao_incomeFour = $row["mpt_pao_income"];
                                $mpt_driver_incomeFour = $row["mpt_driver_income"];

                                $totalCash = $mpt_total_cashOne + $mpt_total_cashTwo + $mpt_total_cashThree + $mpt_total_cashFour;
                                $totalExpenses = $mpt_expensesOne + $mpt_expensesTwo + $mpt_expensesThree + $mpt_expensesFour;
                                $totalHandHeld = $mpt_handheldOne + $mpt_handheldTwo + $mpt_handheldThree + $mpt_handheldFour;
                                $totalBoundary = $mpt_bounderyOne + $mpt_bounderyTwo + $mpt_bounderyThree + $mpt_bounderyFour;
                                $totalDiesel = $mpt_dieselOne + $mpt_dieselTwo + $mpt_dieselThree + $mpt_dieselFour;
                                $totalAmount = $mpt_amountOne + $mpt_amountTwo + $mpt_amountThree + $mpt_amountFour;
                                $totalPaoIncome = $mpt_pao_incomeOne + $mpt_pao_incomeTwo + $mpt_pao_incomeThree + $mpt_pao_incomeFour ;
                                $totalDriverIncome = $mpt_driver_incomeOne + $mpt_driver_incomeTwo + $mpt_driver_incomeThree + $mpt_driver_incomeFour;

                                // Insert Code
                                $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO salary_mpuj_report (smr_pao_fullname, smr_driver_fullname, smr_rounds_one, smr_rounds_two, smr_rounds_three, smr_rounds_four, smr_total_cash, smr_expenses, smr_handheld, smr_boundery, smr_diesel, smr_amount, smr_pao_income, smr_driver_income, smr_time, smr_date) VALUES ('$mpt_pao_fullnameOne', '$mpt_driver_fullnameOne','$mpt_total_cashFour', '$mpt_total_cashThree', '$mpt_total_cashTwo', '$mpt_total_cashOne','$totalCash', '$totalExpenses', '$totalHandHeld', '$totalBoundary', '$totalDiesel', '$totalAmount', '$totalPaoIncome', '$totalDriverIncome', '$timeNow', '$dateNow')");
                                if($query_insert){
                                    echo "Success Insert";
                                } 
                            } // End of Rounds Four
                        } // End of Rounds Three
                    } // End of Rounds Two
                } // End of Rounds One
            }else if($this->roundOne != 0 && $this->roundTwo != 0 && $this->roundThree != 0 && $this->roundFour == 0 && $this->roundFive == 0 && $this->roundSix == 0){
                // Round 1 
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundOne'");
                while($row = mysqli_fetch_assoc($fetch_data)){
                    $mpt_pao_fullnameOne = $row["mpt_pao_fullname"];
                    $mpt_driver_fullnameOne = $row["mpt_driver_fullname"];
                    $mpt_rounds = $row["mpt_rounds"];
                    $mpt_total_cashOne = $row["mpt_total_cash"];
                    $mpt_expensesOne = $row["mpt_expenses"];
                    $mpt_handheldOne = $row["mpt_handheld"];
                    $mpt_bounderyOne = $row["mpt_boundery"];
                    $mpt_dieselOne = $row["mpt_diesel"];
                    $mpt_amountOne = $row["mpt_amount"];
                    $mpt_pao_incomeOne = $row["mpt_pao_income"];
                    $mpt_driver_incomeOne = $row["mpt_driver_income"];

                    // Round 2
                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundTwo'");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        $mpt_pao_fullnameTwo = $row["mpt_pao_fullname"];
                        $mpt_driver_fullnameTwo = $row["mpt_driver_fullname"];
                        $mpt_roundsTwo = $row["mpt_rounds"];
                        $mpt_total_cashTwo = $row["mpt_total_cash"];
                        $mpt_expensesTwo = $row["mpt_expenses"];
                        $mpt_handheldTwo = $row["mpt_handheld"];
                        $mpt_bounderyTwo = $row["mpt_boundery"];
                        $mpt_dieselTwo = $row["mpt_diesel"];
                        $mpt_amountTwo = $row["mpt_amount"];
                        $mpt_pao_incomeTwo = $row["mpt_pao_income"];
                        $mpt_driver_incomeTwo = $row["mpt_driver_income"];

                        // Round 3
                        $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundThree'");
                        while($row = mysqli_fetch_assoc($fetch_data)){
                            $mpt_pao_fullnameThree = $row["mpt_pao_fullname"];
                            $mpt_driver_fullnameThree = $row["mpt_driver_fullname"];
                            $mpt_roundsThree = $row["mpt_rounds"];
                            $mpt_total_cashThree = $row["mpt_total_cash"];
                            $mpt_expensesThree = $row["mpt_expenses"];
                            $mpt_handheldThree = $row["mpt_handheld"];
                            $mpt_bounderyThree = $row["mpt_boundery"];
                            $mpt_dieselThree = $row["mpt_diesel"];
                            $mpt_amountThree = $row["mpt_amount"];
                            $mpt_pao_incomeThree = $row["mpt_pao_income"];
                            $mpt_driver_incomeThree = $row["mpt_driver_income"];

                            $totalCash = $mpt_total_cashOne + $mpt_total_cashTwo + $mpt_total_cashThree;
                            $totalExpenses = $mpt_expensesOne + $mpt_expensesTwo + $mpt_expensesThree;
                            $totalHandHeld = $mpt_handheldOne + $mpt_handheldTwo + $mpt_handheldThree;
                            $totalBoundary = $mpt_bounderyOne + $mpt_bounderyTwo + $mpt_bounderyThree;
                            $totalDiesel = $mpt_dieselOne + $mpt_dieselTwo + $mpt_dieselThree;
                            $totalAmount = $mpt_amountOne + $mpt_amountTwo + $mpt_amountThree;
                            $totalPaoIncome = $mpt_pao_incomeOne + $mpt_pao_incomeTwo + $mpt_pao_incomeThree;
                            $totalDriverIncome = $mpt_driver_incomeOne + $mpt_driver_incomeTwo + $mpt_driver_incomeThree;

                            // Insert Code
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO salary_mpuj_report (smr_pao_fullname, smr_driver_fullname, smr_rounds_one, smr_rounds_two, smr_rounds_three, smr_total_cash, smr_expenses, smr_handheld, smr_boundery, smr_diesel, smr_amount, smr_pao_income, smr_driver_income, smr_time, smr_date) VALUES ('$mpt_pao_fullnameOne', '$mpt_driver_fullnameOne','$mpt_total_cashThree', '$mpt_total_cashTwo', '$mpt_total_cashOne','$totalCash', '$totalExpenses', '$totalHandHeld', '$totalBoundary', '$totalDiesel', '$totalAmount', '$totalPaoIncome', '$totalDriverIncome', '$timeNow', '$dateNow')");
                            if($query_insert){
                                echo "Success Insert";
                            } 
                        } // End of Rounds Three
                    } // End of Rounds Two
                } // End of Rounds One
            }else if($this->roundOne != 0 && $this->roundTwo != 0 && $this->roundThree == 0 && $this->roundFour == 0 && $this->roundFive == 0 && $this->roundSix == 0){
                // Round 1 
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundOne'");
                while($row = mysqli_fetch_assoc($fetch_data)){
                    $mpt_pao_fullnameOne = $row["mpt_pao_fullname"];
                    $mpt_driver_fullnameOne = $row["mpt_driver_fullname"];
                    $mpt_rounds = $row["mpt_rounds"];
                    $mpt_total_cashOne = $row["mpt_total_cash"];
                    $mpt_expensesOne = $row["mpt_expenses"];
                    $mpt_handheldOne = $row["mpt_handheld"];
                    $mpt_bounderyOne = $row["mpt_boundery"];
                    $mpt_dieselOne = $row["mpt_diesel"];
                    $mpt_amountOne = $row["mpt_amount"];
                    $mpt_pao_incomeOne = $row["mpt_pao_income"];
                    $mpt_driver_incomeOne = $row["mpt_driver_income"];

                    // Round 2
                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundTwo'");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        $mpt_pao_fullnameTwo = $row["mpt_pao_fullname"];
                        $mpt_driver_fullnameTwo = $row["mpt_driver_fullname"];
                        $mpt_roundsTwo = $row["mpt_rounds"];
                        $mpt_total_cashTwo = $row["mpt_total_cash"];
                        $mpt_expensesTwo = $row["mpt_expenses"];
                        $mpt_handheldTwo = $row["mpt_handheld"];
                        $mpt_bounderyTwo = $row["mpt_boundery"];
                        $mpt_dieselTwo = $row["mpt_diesel"];
                        $mpt_amountTwo = $row["mpt_amount"];
                        $mpt_pao_incomeTwo = $row["mpt_pao_income"];
                        $mpt_driver_incomeTwo = $row["mpt_driver_income"];

                        $totalCash = $mpt_total_cashOne + $mpt_total_cashTwo;
                        $totalExpenses = $mpt_expensesOne + $mpt_expensesTwo;
                        $totalHandHeld = $mpt_handheldOne + $mpt_handheldTwo;
                        $totalBoundary = $mpt_bounderyOne + $mpt_bounderyTwo;
                        $totalDiesel = $mpt_dieselOne + $mpt_dieselTwo;
                        $totalAmount = $mpt_amountOne + $mpt_amountTwo;
                        $totalPaoIncome = $mpt_pao_incomeOne + $mpt_pao_incomeTwo;
                        $totalDriverIncome = $mpt_driver_incomeOne + $mpt_driver_incomeTwo;

                        // Insert Code
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO salary_mpuj_report (smr_pao_fullname, smr_driver_fullname, smr_rounds_one, smr_rounds_two, smr_total_cash, smr_expenses, smr_handheld, smr_boundery, smr_diesel, smr_amount, smr_pao_income, smr_driver_income, smr_time, smr_date) VALUES ('$mpt_pao_fullnameOne', '$mpt_driver_fullnameOne','$mpt_total_cashTwo', '$mpt_total_cashOne','$totalCash', '$totalExpenses', '$totalHandHeld', '$totalBoundary', '$totalDiesel', '$totalAmount', '$totalPaoIncome', '$totalDriverIncome', '$timeNow', '$dateNow')");
                        if($query_insert){
                            echo "Success Insert";
                        } 
                    } // End of Rounds Two
                } // End of Rounds One
            }else if($this->roundOne != 0 && $this->roundTwo == 0 && $this->roundThree == 0 && $this->roundFour == 0 && $this->roundFive == 0 && $this->roundSix == 0){
                // Round 1 
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id='$this->roundOne'");
                while($row = mysqli_fetch_assoc($fetch_data)){
                    $mpt_pao_fullnameOne = $row["mpt_pao_fullname"];
                    $mpt_driver_fullnameOne = $row["mpt_driver_fullname"];
                    $mpt_rounds = $row["mpt_rounds"];
                    $mpt_total_cashOne = $row["mpt_total_cash"];
                    $mpt_expensesOne = $row["mpt_expenses"];
                    $mpt_handheldOne = $row["mpt_handheld"];
                    $mpt_bounderyOne = $row["mpt_boundery"];
                    $mpt_dieselOne = $row["mpt_diesel"];
                    $mpt_amountOne = $row["mpt_amount"];
                    $mpt_pao_incomeOne = $row["mpt_pao_income"];
                    $mpt_driver_incomeOne = $row["mpt_driver_income"];

                    $totalCash = $mpt_total_cashOne;
                    $totalExpenses = $mpt_expensesOne;
                    $totalHandHeld = $mpt_handheldOne;
                    $totalBoundary = $mpt_bounderyOne;
                    $totalDiesel = $mpt_dieselOne;
                    $totalAmount = $mpt_amountOne;
                    $totalPaoIncome = $mpt_pao_incomeOne;
                    $totalDriverIncome = $mpt_driver_incomeOne;

                    // Insert Code
                    $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO salary_mpuj_report (smr_pao_fullname, smr_driver_fullname, smr_rounds_one, smr_total_cash, smr_expenses, smr_handheld, smr_boundery, smr_diesel, smr_amount, smr_pao_income, smr_driver_income, smr_time, smr_date) VALUES ('$mpt_pao_fullnameOne', '$mpt_driver_fullnameOne','$mpt_total_cashOne','$totalCash', '$totalExpenses', '$totalHandHeld', '$totalBoundary', '$totalDiesel', '$totalAmount', '$totalPaoIncome', '$totalDriverIncome', '$timeNow', '$dateNow')");
                    if($query_insert){
                        echo "Success Insert";
                    } 
                } // End of Rounds One
            }
        }
    }
?>