<?php
    
    // $classDisplayRemarksData = new classDisplayRemarksData($_POST["dataId"]);
    // $classDisplayRemarksData->displayData();
    
    if(isset($_POST["dataId"])){
        $classDisplayRemarksData = new classDisplayRemarksData($_POST["dataId"]);
        $classDisplayRemarksData->displayData();
    }

    class classDisplayRemarksData{
        private $dataId;

        function __construct($dataId){
            $this->dataId = $dataId;
        }

        function displayData(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // require_once("./asset/php/helper/database-connection/connectionHF.php");
            
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

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
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="editRemarks" data-id='. $rt_id .' data-id-user='. $rt_sit_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $rt_id .'  data-id-user=' . $rt_sit_id .'></i>
                        </td>
                    </tr>
                ';
            }
        }
    }
?>