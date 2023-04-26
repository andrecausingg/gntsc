<?php
    if(isset($_POST["dataId"])){
        $classDisplayEdit = new classDisplayEdit($_POST["dataId"]);
        $classDisplayEdit->displayEdit();
    }

    class classDisplayEdit{
        private $dataId;

        function __construct($dataId){
            $this->dataId = $dataId;
        }

        function displayEdit(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
        
            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM remarks_tbl WHERE rt_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $rt_id = $row["rt_id"];
                $rt_sit_id = $row["rt_sit_id"];
                $rt_description = $row["rt_description"];

                echo'
                    <!-- Edit Remarks-->
                    <div class="editRemarksContainerWithForm dashboard-edit-update-container yot-bg-white">
                        <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-sea-of-tears yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <h3>Edit Description</h3> <br>
                                <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                            </div>
                        </div>
        
                        <!-- Form -->
                        <form id="formEditRemarks" style=" overflow-x: auto;margin-top:24px;">
                            <div class="yot-form-group" style="displaye:none">
                                <input type="hidden" class="dataId" name="dataId" id="dataId" value="' . $this->dataId . '" disabled>
                            </div>
                            <div class="yot-form-group" style="displaye:none">
                                <input type="hidden" class="dataIdUser" name="dataIdUser" id="dataIdUser" value="' . $rt_sit_id . '" disabled>
                            </div>

                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Remarks</b></label>
                                    <textarea style="resize: vertical;" class="yot-form-input remarksEdit" id="remarksEdit" name="remarksEdit" rows="4" cols="100%" value="'. $rt_description .'"></textarea>
                                    <span class="yot-tc-red errRemarksEdit" style="display: none;"><b>The Remarks field is required.</b></span>
                                </div>
                            </div>

                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-secondary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                ';
            }
        }
    }
?>