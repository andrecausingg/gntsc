<?php
    if(isset($_POST["dataId"]) && isset($_POST["driverFullNameDispatch"]) && isset($_POST["paoFullNameDispatch"]) && isset($_POST["mpujNumDispatch"]) && isset($_POST["plateNumDispatch"]) && isset($_POST["timeOfDepartureDispatch"]) && isset($_POST["timeOfArrivalDispatch"])){
        $classDispatchCttoNovaEdit = new classDispatchCttoNovaEdit($_POST["dataId"], $_POST["driverFullNameDispatch"], $_POST["paoFullNameDispatch"], $_POST["mpujNumDispatch"], $_POST["plateNumDispatch"], $_POST["timeOfDepartureDispatch"], $_POST["timeOfArrivalDispatch"]);
        $classDispatchCttoNovaEdit->editData();
    }


    class classDispatchCttoNovaEdit{
        private $dataId;
        private $driverFullNameDispatch;
        private $paoFullNameDispatch;
        private $mpujNumDispatch;
        private $plateNumDispatch;
        // private $destinationDispatch;
        private $timeOfDepartureDispatch;
        private $timeOfArrivalDispatch;

        // Methods
        function __construct($dataId, $driverFullNameDispatch, $paoFullNameDispatch, $mpujNumDispatch, $plateNumDispatch, $timeOfDepartureDispatch , $timeOfArrivalDispatch){
            $this->dataId = $dataId;
            $this->driverFullNameDispatch = $driverFullNameDispatch;
            $this->paoFullNameDispatch = $paoFullNameDispatch;
            $this->mpujNumDispatch = $mpujNumDispatch;
            $this->plateNumDispatch = $plateNumDispatch;
            // $this->destinationDispatch = $destinationDispatch;
            $this->timeOfDepartureDispatch = $timeOfDepartureDispatch;
            $this->timeOfArrivalDispatch = $timeOfArrivalDispatch;
        }

        function editData(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // File Date and Time
            require_once("../helper/others/date-and-timeHF.php");
            
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // Update Code
            $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE dispatch_tbl SET dt_driver_full_name = '$this->driverFullNameDispatch', dt_pao_full_name = '$this->paoFullNameDispatch', dt_mpuj_num = '$this->mpujNumDispatch', dt_plate_num = '$this->plateNumDispatch', dt_time_of_departure = '$this->timeOfDepartureDispatch', dt_expected_arrival = '$this->timeOfArrivalDispatch' WHERE dt_id ='$this->dataId'");

            if($query_update){
                echo "Success Update";
            }
        }
    }
?>