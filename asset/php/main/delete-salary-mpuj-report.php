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

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // Delete Code
            $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM salary_mpuj_report WHERE smr_id = '$this->dataId'");

            if($query_delete){
                echo "Success Delete";
            }
        }
    }
?>