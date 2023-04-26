<?php
    if(isset($_POST["dataId"]) && isset($_POST["plateNum"])){
        $classEditTradInfo = new classEditTradInfo($_POST["dataId"], $_POST["plateNum"]);
        $classEditTradInfo->editData();
    }

    class classEditTradInfo{
        private $dataId;
        private $plateNum;

        // Methods
        function __construct($dataId, $plateNum){
            $this->dataId = $dataId;
            $this->plateNum = $plateNum;
        }

        function editData(){
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
                    $page = "MANAGE TRAD";

                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM tradjeep_info_tbl WHERE tjt_id = $this->dataId");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        
                        if($this->plateNum != $row["tjt_plate_num"]){
                            $description = $fullName . " change data of |Plate No. = ". $row["tjt_plate_num"] . " to " . $this->plateNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE tradjeep_info_tbl SET tjt_plate_num = '$this->plateNum' WHERE tjt_id ='$this->dataId'");
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