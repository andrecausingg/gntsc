<?php
    if(isset($_POST["dataId"]) && isset($_POST["remarks"])){
        $classInsertMpujInfo = new classInsertMpujInfo($_POST["dataId"] ,$_POST["remarks"]);
        $classInsertMpujInfo->insertData();
    }

    class classInsertMpujInfo{
        private $dataId;
        private $remarks;

        // Methods
        function __construct($dataId ,$remarks){
            $this->dataId = $dataId;
            $this->remarks = $remarks;
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

            // Insert Code
            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO remarks_tbl (rt_sit_id, rt_description, rt_time , rt_date) VALUES ('$this->dataId', '$this->remarks', '$timeNow', '$dateNow')");
        
            if($query_insert){
                // DISPLAY
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM remarks_tbl WHERE rt_sit_id ='$this->dataId' ORDER BY rt_id DESC");
                while($row = mysqli_fetch_assoc($fetch_data)){

                    $rt_id = $row["rt_id"];
                    $rt_sit_id = $row["rt_sit_id"];
                    $rt_description = $row["rt_description"];
                    $rt_time = $row["rt_time"];
                    $rt_date = $row["rt_date"];

                    echo'
                        <tr>
                            <td>' . $rt_description .'</td>
                            <td>' . $rt_time .'</td>
                            <td>' . $rt_date .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $rt_id .'  data-id-user='. $rt_sit_id .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $rt_id .'  data-id-user='. $rt_sit_id .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }
    }
?>