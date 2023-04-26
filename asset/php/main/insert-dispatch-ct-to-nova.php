<?php
    if(isset($_POST["routeDispatch"]) && isset($_POST["driverFullNameDispatch"]) && isset($_POST["paoFullNameDispatch"]) && isset($_POST["mpujNumDispatch"]) && isset($_POST["plateNumDispatch"]) && isset($_POST["timeOfDepartureDispatch"]) && isset($_POST["timeOfArrivalDispatch"])){
        $classDispatchCttoNova = new classDispatchCttoNova($_POST["routeDispatch"], $_POST["driverFullNameDispatch"], $_POST["paoFullNameDispatch"], $_POST["mpujNumDispatch"], $_POST["plateNumDispatch"], $_POST["timeOfDepartureDispatch"], $_POST["timeOfArrivalDispatch"]);
        $classDispatchCttoNova->insertData();
    }

    class classDispatchCttoNova{
        private $routeDispatch;
        private $driverFullNameDispatch;
        private $paoFullNameDispatch;
        private $mpujNumDispatch;
        private $plateNumDispatch;
        // private $destinationDispatch;
        private $timeOfDepartureDispatch;
        private $timeOfArrivalDispatch;

        // Methods
        function __construct($routeDispatch, $driverFullNameDispatch, $paoFullNameDispatch, $mpujNumDispatch, $plateNumDispatch, $timeOfDepartureDispatch , $timeOfArrivalDispatch){
            $this->routeDispatch = $routeDispatch;
            $this->driverFullNameDispatch = $driverFullNameDispatch;
            $this->paoFullNameDispatch = $paoFullNameDispatch;
            $this->mpujNumDispatch = $mpujNumDispatch;
            $this->plateNumDispatch = $plateNumDispatch;
            // $this->destinationDispatch = $destinationDispatch;
            $this->timeOfDepartureDispatch = $timeOfDepartureDispatch;
            $this->timeOfArrivalDispatch = $timeOfArrivalDispatch;
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
                    $page = "MANAGE DISPATCH";

                    if($this->routeDispatch == "1"){
                        $cttonova = "Central Terminal To Novaliches";
                        $description = $fullName . " add data of |Pao FullName = ". $this->paoFullNameDispatch . "| |Driver FullName = " .$this->driverFullNameDispatch . "| |Mpuj No. = ". $this->mpujNumDispatch . "| |Plate No. = ". $this->plateNumDispatch . "| |Time of Departure = ". $this->timeOfDepartureDispatch . "| |Expected arrival = ". $this->timeOfArrivalDispatch . "| |Route = ". $cttonova  ."| on";
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                        if($query_insert){
                            // Insert Code
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO dispatch_tbl (dt_route, dt_driver_full_name, dt_pao_full_name, dt_mpuj_num, dt_plate_num, dt_time_of_departure, dt_expected_arrival, dt_time, dt_date) VALUES ('$this->routeDispatch', '$this->driverFullNameDispatch', '$this->paoFullNameDispatch', '$this->mpujNumDispatch', '$this->plateNumDispatch','$this->timeOfDepartureDispatch', '$this->timeOfArrivalDispatch', '$timeNow', '$dateNow')");
                                    
                            if($query_insert){
                                echo "Success Insert";
                            }
                        }
                    }else{
                        $novatoct = "Novaliches to Central Terminal";
                        $description = $fullName . " add data of |Pao FullName = ". $this->paoFullNameDispatch . "| |Driver FullName = " .$this->driverFullNameDispatch . "| |Mpuj No. = ". $this->mpujNumDispatch . "| |Plate No. = ". $this->plateNumDispatch . "| |Time of Departure = ". $this->timeOfDepartureDispatch . "| |Expected arrival = ". $this->timeOfArrivalDispatch . "| |Route = ". $novatoct  ."| on";
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                        if($query_insert){
                            // Insert Code
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO dispatch_tbl (dt_route, dt_driver_full_name, dt_pao_full_name, dt_mpuj_num, dt_plate_num, dt_time_of_departure, dt_expected_arrival, dt_time, dt_date) VALUES ('$this->routeDispatch', '$this->driverFullNameDispatch', '$this->paoFullNameDispatch', '$this->mpujNumDispatch', '$this->plateNumDispatch','$this->timeOfDepartureDispatch', '$this->timeOfArrivalDispatch', '$timeNow', '$dateNow')");
                                    
                            if($query_insert){
                                echo "Success Insert";
                            }
                        }
                    }
                }
            }
        }
    }
?>