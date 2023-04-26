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
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl WHERE mit_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){
                $db_mit_id = $row["mit_id"];
                $db_mit_engine = $row["mit_engine"];
                $db_mit_chassis_num = $row["mit_chassis_num"];
                $db_mit_plate_num = $row["mit_plate_num"];
                $db_mit_mpuj_num = $row["mit_mpuj_num"];
                $db_mit_status = $row["mit_status"];

                echo'
                    <!-- Edit MpujInfo-->
                    <div id="editMpujInfoContainer" class="dashboard-edit-update-container yot-bg-white">
                        <div class="yot-mb-16 yot-pa-24 yot-bg-see-goddess yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <h3>Editing MPUJ Info</h3> <br>
                                <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                            </div>
                        </div>
        
                        <!-- Form -->
                        <form id="formMpujInfoEdit" style=" overflow-x: auto;margin-top:24px;">
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Chasis No.</b></label>
                                    <input class="yot-form-input chasisNumEdit" type="text" name="chasisNumEdit" id="chasisNumEdit" value="' . $db_mit_chassis_num .'">
                                    <span class="yot-tc-red errchasisNumEdit" style="display: none;"><b>The Last Name field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Plate No.</b></label>
                                    <input class="yot-form-input plateNumEdit" type="text" name="plateNumEdit" id="plateNumEdit" value="' . $db_mit_plate_num .'">
                                    <span class="yot-tc-red errPlateNumEdit" style="display: none;"><b>The First Name field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Mpuj No.</b></label>
                                    <input class="yot-form-input mpujNumEdit" type="text" name="mpujNumEdit" id="mpujNumEdit" value="' . $db_mit_mpuj_num .'">
                                    <span class="yot-tc-red errmpujNumEdit" style="display: none;"><b>The First Name field is required.</b></span>
                                </div>

                                <div class="yot-form-group" style="displaye:none">
                                    <input type="hidden" name="dataIdMpujEdit" id="dataIdMpujEdit" value="' . $db_mit_id . '" disabled>
                                </div>
                            </div>


                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Engine No.</b></label>
                                    <input class="yot-form-input engineNumEdit" type="text" name="engineNumEdit" id="engineNumEdit" value="'. $db_mit_engine .'">
                                    <span class="yot-tc-red errEngineNumEdit" style="display: none;"><b>The Engine No. field is required.</b></span>
                                </div>

                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Status</b></label>
                                    <select class="yot-form-input" name="statusEdit" id="statusEdit" style="width: 200px;">
                                        '; 
                                            echo'
                                                <option selected value="'. $db_mit_status .'">'. $db_mit_status .'</option>
                                            ';
                                            echo'
                                                <option value="Active">Active</option>
                                                <option value="Maintenance">Maintenance</option>
                                            ';
                                        echo'
                                    </select>
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