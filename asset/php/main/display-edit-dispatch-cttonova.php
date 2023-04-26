<?php
    if(isset($_POST["dataId"])){
        $classDisplayAccount = new classDisplayAccount();
        $classDisplayAccount->setDataId($_POST["dataId"]);
        $classDisplayAccount->displayAccount();
    }

    class classDisplayAccount{
        private $dataId;

        function setDataId($dataId){
            $this->dataId = $dataId;
        }

        function displayAccount(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
        
            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM dispatch_tbl WHERE dt_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_dt_id = $row["dt_id"];
                $db_dt_driver_full_name = $row["dt_driver_full_name"];
                $db_dt_pao_full_name = $row["dt_pao_full_name"];
                $db_dt_mpuj_num = $row["dt_mpuj_num"];
                $db_dt_plate_num = $row["dt_plate_num"];
                // $db_dt_destination = $row["dt_destination"];
                $db_dt_time_of_departure = $row["dt_time_of_departure"];
                $db_dt_expected_arrival = $row["dt_expected_arrival"];

                echo'
                    <!-- Edit Account-->
                    <div id="dispatchContainerCtToNovaEdit" class="dispatchContainerCtToNovaEdit dashboard-edit-update-container yot-bg-white">
                        <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-see-goddess yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <h3>Adding Dispatch Info</h3> <br>
                                <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                            </div>
        
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <h4>Central Terminal to Novaliches</h5> <br>
                            </div>
                        </div>
        
                        <!-- Form -->
                        <form id="formDispatchCttoNovaEdit" style=" overflow-x: auto;margin-top:24px;">
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Driver</b></label>
                                    <select class="yot-form-input" name="driverFullNameDispatch" id="driverFullNameDispatchEdit" style="width: 250px;">
                                       ';
                                            echo'
                                                <option value="'. $db_dt_driver_full_name .'">' . $db_dt_driver_full_name .'</option>
                                            ';

                                            // DISPLAY
                                            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name = 'PUJ' ");
                                            while($row = mysqli_fetch_assoc($fetch_data)){

                                                $db_sit_firstname = $row["sit_firstname"];

                                                echo'
                                                    <option value="'. $db_sit_firstname .'">' . $db_sit_firstname .'</option>
                                                ';
                                            }
                                       echo'
                                    </select>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>PAO </b></label>
                                    <select class="yot-form-input" name="paoFullNameDispatch" id="paoFullNameDispatchEdit" style="width: 250px;">
                                        ';
                                            echo'
                                                <option value="'. $db_dt_pao_full_name .'">' . $db_dt_pao_full_name .'</option>
                                            ';

                                            // DISPLAY
                                            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name = 'PAO' ");
                                            while($row = mysqli_fetch_assoc($fetch_data)){

                                                $db_sit_firstname = $row["sit_firstname"];

                                                echo'
                                                    <option value="'. $db_sit_firstname .'">' . $db_sit_firstname .'</option>
                                                ';
                                            }
                                        echo'
                                    </select>
                                </div>
                            </div>
        
                            <hr>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Mpuj No.</b></label>
                                    <select class="yot-form-input" name="mpujNumDispatch" id="mpujNumDispatchEdit" style="width: 250px;">
                                        ';
                                            echo'
                                                <option value="'. $db_dt_mpuj_num .'">' . $db_dt_mpuj_num .'</option>
                                            ';

                                            // DISPLAY
                                            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl");
                                            while($row = mysqli_fetch_assoc($fetch_data)){

                                                $db_mit_mpuj_num = $row["mit_mpuj_num"];

                                                echo'
                                                    <option value="'. $db_mit_mpuj_num .'">' . $db_mit_mpuj_num .'</option>
                                                ';
                                            }
                                        echo'
                                    </select>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Plate No. </b></label>
                                    <select class="yot-form-input" name="plateNumDispatchEdit" id="plateNumDispatchEdit" style="width: 250px;">
                                        ';
                                            echo'
                                                <option value="'. $db_dt_plate_num .'">' . $db_dt_plate_num .'</option>
                                            ';

                                            // DISPLAY
                                            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl");
                                            while($row = mysqli_fetch_assoc($fetch_data)){

                                                $db_mit_plate_num = $row["mit_plate_num"];

                                                echo'
                                                    <option value="'. $db_mit_plate_num .'">' . $db_mit_plate_num .'</option>
                                                ';
                                            }
                                        echo'
                                    </select>
                                </div>
                            </div>
        
                            <hr>
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Time of Departure</b></label>
                                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                                        <span>Day/Month/Year</span>
                                        <span>Hour:Minute</span>
                                    </div>
                                    <input class="yot-form-input datePicker datePickerTimeOfDepatureEdit" type="text" id="timeOfDepartureDispatchEdit" value="'. $db_dt_time_of_departure .'">
                                    <span class="yot-tc-red errDatePickerEdit" style="display: none;"><b>The Time of Departure field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Time of Arrival</b></label>
                                    <div class="yot-flex yot-flex-ai-c-jc-sb">
                                        <span>Day/Month/Year</span>
                                        <span>Hour:Minute</span>
                                    </div>
                                    <input class="yot-form-input datePicker datePickerTimeOfArrivalEdit" type="text" id="timeOfArrivalDispatchEdit" value="'. $db_dt_expected_arrival .'">
                                    <span class="yot-tc-red errDatePickerEdit" style="display: none;"><b>The Time of Arrival field is required.</b></span>
                                </div>

                                <div class="yot-form-group" style="displaye:none">
                                    <input type="hidden" name="dataId" id="dataId" value="' . $db_dt_id . '" disabled>
                                </div>
                            </div>
        
                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <!-- <button  id="compute">Compute</button> -->
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-five" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                ';
            }
        }
    }
?>