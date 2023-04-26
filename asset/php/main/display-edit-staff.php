<?php
    if(isset($_POST["dataId"])){
        $classDisplayStaffSalary = new classDisplayStaffSalary();
        $classDisplayStaffSalary->setDataId($_POST["dataId"]);
        $classDisplayStaffSalary->displayStaffSalary();
    }

    class classDisplayStaffSalary{
        private $dataId;

        function setDataId($dataId){
            $this->dataId = $dataId;
        }

        function displayStaffSalary(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
        
            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_payroll_tbl WHERE spt_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                echo'
                    <!-- Compute Salary Staff Edit-->
                    <div class="editStaffContainer dashboard-edit-update-container yot-bg-white" >
                        <div class="yot-bg-see-goddess yot-pa-24 yot-flex yot-flex-ai-c-jc-sb yot-tc-white" style=" border-radius: 8px; margin-top:-30px;">
                            <div>
                                <h4>Editing Staff Salary Information</h4>
                                <h5>'. $row["spt_fullname"] .'</h5>
                            </div>
        
                            <i class="fa-solid fa-x closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                        </div>
        
                        <!-- Form -->
                        <form id="formSalaryStaffEdit" style=" overflow-x: auto; margin-top:24px;">
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>No. of Days</b></label>
                                    <input class="yot-form-input numDaysStaffEdit" type="text" name="numDaysStaffEdit" id="numDaysStaffEdit" value="'. $row["spt_num_days"] .'">
                                    <span class="yot-tc-red errNumDaysStaff" style="display: none;"><b>The No of Days field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Rate</b></label>
                                    <input class="yot-form-input rateStaffEdit" type="text" name="rateStaffEdit" id="rateStaffEdit" value="'. $row["spt_rate"] .'">
                                    <span class="yot-tc-red errRateStaffEdit" style="display: none;"><b>The Rate field is required.</b></span>
                                </div>

                                <div class="yot-form-group" style="displaye:none">
                                    <input class="dataIdEditStaff" type="hidden" name="dataIdEditStaff" id="dataIdEditStaff" value="' . $row["spt_id"] . '" disabled>
                                </div>
                            </div>
        
                            <hr class="yot-mb-16">
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Amount</b></label>
                                    <input class="yot-form-input amountStaffEdit" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="amountStaffEdit" id="amountStaffEdit" value="'. $row["spt_amount"] .'" disabled>
                                </div>
                            </div>
        
                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <!-- <button  id="compute">Compute</button> -->
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-five" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                ';
            }
        }
    }
?>