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
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM remarks_tbl WHERE rt_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_rt_sit_id = $row["rt_sit_id"];
                $db_rt_description = $row["rt_description"];
                
                echo'
                    <!-- Delete Data-->
                    <div class="deleteContainer dashboard-edit-update-container yot-bg-rapsody-blue yot-tc-white yot-text-center"  style="border-radius:8px">
                        <h3 class="yot-mb-16">ARE YOU SURE YOU WANT TO DELETE?</h3>

                        <h4 class="yot-mb-8">Description</h4>
                        <h4 class="yot-mb-8">'. $db_rt_description .'</h4>

                        <div class="yot-flex yot-flex-ai-c-jc-c yot-mt-16">
                            <div class="yot-text-center yot-mr-8">
                                <form id="formDeleteRemarks">
                                    <input style="font-size: 20px;" class="yot-btn-primary dataIdDeleteRemarks" id="dataIdDeleteRemarks" type="hidden" value="'. $this->dataId .'">
                                    <input style="font-size: 20px;" class="yot-btn-primary dataIdUserDeleteRemarks" id="dataIdUserDeleteRemarks" type="hidden" value="'. $db_rt_sit_id .'">
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