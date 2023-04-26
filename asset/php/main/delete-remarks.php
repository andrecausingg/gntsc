<?php
    if(isset($_POST["dataId"]) && isset($_POST["dataIdUser"])){
        $classDeleteData = new classDeleteData($_POST["dataId"], $_POST["dataIdUser"]);
        $classDeleteData->deleteData();
    }

    class classDeleteData{
        private $dataId;
        private $dataIdUser;

        // Methods
        function __construct($dataId, $dataIdUser){
            $this->dataId = $dataId;
            $this->dataIdUser = $dataIdUser;
        }

        function deleteData(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // Delete Code
            $query_delete = mysqli_query($classDataBaseConnection->connect(),"DELETE FROM remarks_tbl WHERE rt_id = '$this->dataId'");

            if($query_delete){
                // DISPLAY
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM remarks_tbl WHERE rt_sit_id ='$this->dataIdUser' ORDER BY rt_id DESC");
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
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $rt_id .' data-id-user='. $rt_sit_id .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $rt_id .' data-id-user='. $rt_sit_id .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }
    }
?>