<?php
    if(isset($_POST["dataId"])){
        $classDisplayMpujInfo = new classDisplayMpujInfo();
        $classDisplayMpujInfo->setDataId($_POST["dataId"]);
        $classDisplayMpujInfo->displayMpujInfo();
    }

    class classDisplayMpujInfo{
        private $dataId;

        function setDataId($dataId){
            $this->dataId = $dataId;
        }

        function displayMpujInfo(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
        
            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM tradjeep_info_tbl WHERE tjt_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_tjt_id = $row["tjt_id"];
                $db_tjt_plate_num = $row["tjt_plate_num"];

                echo'
                    <!-- Edit MpujInfo-->
                    <div id="editTradInfoContainer" class="dashboard-edit-update-container yot-bg-white">
                        <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-see-goddess yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <h3>Adding Trad Info</h3> <br>
                                <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                            </div>
                        </div>
        
                        <!-- Form -->
                        <form id="formTradInfoEdit" style=" overflow-x: auto;margin-top:24px;">
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Plate No.</b></label>
                                    <input class="yot-form-input plateNumEdit" type="text" name="plateNumEdit" id="plateNumEdit" value="' . $db_tjt_plate_num .'">
                                    <span class="yot-tc-red errPlateNumEdit" style="display: none;"><b>The Plate No. field is required.</b></span>
                                </div>
                                
                                <div class="yot-form-group" style="displaye:none">
                                    <input type="hidden" name="dataIdTradEdit" id="dataIdTradEdit" value="' . $db_tjt_id . '" disabled>
                                </div>
                            </div>
        
                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <!-- <button  id="compute">Compute</button> -->
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-five computSave" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                ';
            }
        }
    }
?>