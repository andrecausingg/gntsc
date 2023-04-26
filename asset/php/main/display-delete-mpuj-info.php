<?php
    if(isset($_POST["dataId"])){
        $classDisplayDelete = new classDisplayDelete();
        $classDisplayDelete->setDataId($_POST["dataId"]);
        $classDisplayDelete->displayDelete();
    }

    class classDisplayDelete{
        private $dataId;

        function setDataId($dataId){
            $this->dataId = $dataId;
        }

        function displayDelete(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
        
            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl WHERE mit_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_mit_id = $row["mit_id"];
                $db_mit_chassis_num = $row["mit_chassis_num"];
                $db_mit_plate_num = $row["mit_plate_num"];
                $db_mit_mpuj_num = $row["mit_mpuj_num"];
                
                echo'
                    <!-- Delete Data-->
                    <div class="deleteContainer dashboard-edit-update-container yot-bg-rapsody-blue yot-tc-white yot-text-center"  style="border-radius:8px">
                        <h3 class="yot-mb-16">ARE YOU SURE YOU WANT TO DELETE?</h3>

                        <h4 class="yot-mb-8">'. "Chasis No. " . $db_mit_chassis_num .'</h4>
                        <h4 class="yot-mb-8">'. "Plate No. " . $db_mit_plate_num .'</h4>
                        <h4 class="yot-mb-8">'. "Mpuj No. " . $db_mit_mpuj_num .'</h4>

                        <div class="yot-flex yot-flex-ai-c-jc-c yot-mt-16">
                            <div class="yot-text-center yot-mr-8">
                                <form id="formDelete">
                                    <input style="font-size: 20px;" class="yot-btn-primary" id="dataIdDelete" type="hidden" value="'. $db_mit_id .'">
                                    <input style="font-size: 20px;" class="yot-btn-primary" type="submit" value="Agree">
                                </form>
                            </div>
        
                            <div class="cancelBtn yot-text-center yot-ml-8">
                                <button style="font-size: 20px;" class="yot-btn-primary">Cancel</button>
                            </div>
                        </div>
                    </div>
                ';
            }
        }
    }
?>