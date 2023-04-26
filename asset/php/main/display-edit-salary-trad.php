<?php
    if(isset($_POST["dataId"])){
        $classDisplaySalaryTradEdit = new classDisplaySalaryTradEdit();
        $classDisplaySalaryTradEdit->setDataId($_POST["dataId"]);
        $classDisplaySalaryTradEdit->displaySalaryTradEdit();
    }

    class classDisplaySalaryTradEdit{
        private $dataId;

        function setDataId($dataId){
            $this->dataId = $dataId;
        }

        function displaySalaryTradEdit(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
        
            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM tradjeep_payroll_tbl WHERE tpt_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_tpt_id = $row["tpt_id"];
                $db_tpt_drivers_name = $row["tpt_drivers_name"];
                $db_tpt_plate_num = $row["tpt_plate_num"];
                $db_tpt_daily_butaw = $row["tpt_daily_butaw"];
                $db_tpt_savings = $row["tpt_savings"];
                $db_tpt_terminal_fee = $row["tpt_terminal_fee"];
                $db_tpt_monthly_butaw = $row["tpt_monthly_butaw"];
                $db_tpt_membership = $row["tpt_membership"];
                $db_tpt_others = $row["tpt_others"];
                $db_tpt_remarks = $row["tpt_remarks"];

                echo'
                    <!-- Salary Computation Trad-->
                    <div class="salaryTradComputeEdit dashboard-edit-update-container yot-bg-white">
                        <!-- Computation Trad -->
                        <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-see-goddess yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <h3>Computation for Butaw</h3> <br>
                                <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                            </div>
                            <hr>
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <div>
                                    <h3>Updating Salary</h3>
                                    <h5>'. $db_tpt_drivers_name .'</h5>
                                </div>
        
                                <div id="saveTradSalaryBtnEdit" class="yot-mt-8 saveEditTrad" style="display:none">
                                    <button style="font-size: 16px;" class="yot-btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
        
                        <!-- Form -->
                        <form id="formSalaryTradEdit" style=" overflow-x: auto; height: 500px; margin-top:24px;">
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Plate No.</b></label>
                                    <input class="yot-form-input plateNumTradEdit" type="text" name="plateNumTradEdit" id="plateNumTradEdit" value="'. $db_tpt_plate_num .'">
                                    <span class="yot-tc-red errPlateNumTradEdit" style="display: none;"><b>The Plate No. field is required.</b></span>
                                </div>
                            </div>
        
                            <hr class="yot-mb-16">
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Daily Butaw</b></label>
                                    <input class="yot-form-input dailyButawTradEdit" type="text" name="dailyButawTradEdit" id="dailyButawTradEdit" value="'. $db_tpt_daily_butaw .'">
                                    <span class="yot-tc-red errdailyButawTradEdit" style="display: none;"><b>The Daily Butaw field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Savings</b></label>
                                    <input class="yot-form-input savingsTradEdit" type="text" name="savingsTradEdit" id="savingsTradEdit"  value="'. $db_tpt_savings .'">
                                    <span class="yot-tc-red errsavingsTradEdit" style="display: none;"><b>The Expenses field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Terminal Fee </b></label>
                                    <input class="yot-form-input terminalFeeTradEdit" type="text" name="terminalFeeTradEdit" id="terminalFeeTradEdit" value="'. $db_tpt_terminal_fee .'">
                                    <span class="yot-tc-red errterminalFeeTradEdit" style="display: none;"><b>The Terminal Fee field is required.</b></span>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Monthly Butaw </b></label>
                                    <input class="yot-form-input monthlyButawTradEdit" type="text" name="monthlyButawTradEdit" id="monthlyButawTradEdit" value="'. $db_tpt_monthly_butaw .'">
                                    <span class="yot-tc-red errmonthlyButawTradEdit" style="display: none;"><b>The Monthly Butaw field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Membership fee </b></label>
                                    <input class="yot-form-input memberShipFeeTradEdit" type="text" name="memberShipFeeTradEdit" id="memberShipFeeTradEdit" value="'. $db_tpt_membership .'">
                                    <span class="yot-tc-red errmemberShipFeeTradEdit" style="display: none;"><b>The Membership Fee field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Others</b></label>
                                    <input class="yot-form-input othersTradEdit" type="text" name="othersTradEdit" id="othersTradEdit" value="'. $db_tpt_others .'">
                                    <span class="yot-tc-red errothersTradEdit" style="display: none;"><b>The Membership Fee field is required.</b></span>
                                </div>
                            </div>
        
                            <hr class="yot-mb-16">
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Total Remarks</b></label>
                                    <input value="'. $db_tpt_remarks .'"  class="yot-form-input totalRemarksTradEdit" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="totalRemarksTradEdit" id="totalRemarksTradEdit" disabled>
                                </div>

                                <div class="yot-form-group" style="displaye:none">
                                    <input class="dataIdEditTrad" type="hidden" name="dataIdEditTrad" id="dataIdEditTrad" value="' . $db_tpt_id . '" disabled>
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