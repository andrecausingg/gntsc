<?php
    if(isset($_POST["dataId"])){
        $classRemarksDisplayCrud = new classRemarksDisplayCrud();
        $classRemarksDisplayCrud->setDataId($_POST["dataId"]);
        $classRemarksDisplayCrud->displayCrud();
    }

    class classRemarksDisplayCrud{
        private $dataId;

        function setDataId($dataId){
            $this->dataId = $dataId;
        }

        function displayCrud(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
        
            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                // $rt_id = $row["rt_id"];
                // $rt_description = $row["rt_description"];
                // $rt_time = $row["rt_time"];
                // $rt_date = $row["rt_date"];

                $sit_surname = $row["sit_surname"];
                $sit_middlename = $row["sit_middlename"];
                $sit_firstname = $row["sit_firstname"];

                echo '
                    <!-- Remarks Data-->
                    <div class="remarksContainer dashboard-remarks-container yot-bg-rapsody-blue yot-tc-white yot-text-center"  style="border-radius:8px">
                        <div class="yot-mb-4 yot-flex yot-flex-ai-c-jc-sb">
                            <div>
                                <h3>' . $sit_surname . ","  . $sit_middlename . " " . $sit_firstname .'</h3>
                            </div>

                            <div class="yot-flex yot-flex-ai-c">
                                <div class="yot-mr-8">
                                    <button id="btnRemarks" style="font-size: 18px;" class="yot-btn-primary">Add Remarks</button>
                                </div>
                                <i class="fa-solid fa-circle-xmark closeRemarksContainer yot-cursor-pointer" style="font-size: 24px;"></i>
                            </div>
                        </div>

                        <div style=" overflow-y: auto; height: 500px;">
                            <table class="yot-styled-table-remarks" style="overflow: hidden;">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Time Created</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody class="displayRemarksData">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Add Remarks-->
                    <div id="addRemarksContainer" class="dashboard-edit-update-container yot-bg-white" style="display:none">
                        <div class="yot-bg-vibrant-orange yot-pa-24 yot-flex yot-flex-ai-c-jc-sb yot-tc-white" style=" border-radius: 8px; margin-top:-30px;">
                            <div>
                                <h4>Adding Remarks</h4>
                            </div>

                            <i class="fa-solid fa-circle-xmark closeAddRemarks yot-cursor-pointer" style="font-size: 24px;"></i>
                        </div>

                        <!-- Form -->
                        <form id="formRemarks" style=" overflow-x: auto;margin-top:24px;">
                            <div class="yot-form-group" style="displaye:none">
                                <input type="hidden" name="dataId" id="dataId" value="' . $this->dataId . '" disabled>
                            </div>

                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Remarks</b></label>
                                    <textarea style="resize: vertical;" class="yot-form-input remarks" id="remarks" name="remarks" rows="4" cols="100%"></textarea>
                                    <span class="yot-tc-red errRemarks" style="display: none;"><b>The Remarks field is required.</b></span>
                                </div>
                            </div>

                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-primary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>

                    <div id="deleteRemarksContainer"></div>

                    <div id="editRemarksContainer"></div>
                ';

            }


        }
    }
?>