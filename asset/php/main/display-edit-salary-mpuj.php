<?php
    if(isset($_POST["dataId"])){
        $classDisplaySalaryMpujEdit = new classDisplaySalaryMpujEdit();
        $classDisplaySalaryMpujEdit->setDataId($_POST["dataId"]);
        $classDisplaySalaryMpujEdit->displaySalaryMpujEdit();
    }

    class classDisplaySalaryMpujEdit{
        private $dataId;

        function setDataId($dataId){
            $this->dataId = $dataId;
        }

        function displaySalaryMpujEdit(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");

            // // File Connection Database
            // require_once("./asset/php/helper/database-connection/connectionHF.php");
            // // File Option Birth Date
            // require_once("./asset/php/helper/others/option-birthdateHF.php");
            // // File Option Expiration License Date
            // require_once("./asset/php/helper/others/option-licenseHF.php");
            // // File Option Gender
            // require_once("./asset/php/helper/others/option-gender.php");
            // // File Option Gender
            // require_once("./asset/php/helper/others/option-civil-status.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
        
            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $mpt_id = $row["mpt_id"];
                $mpt_pao_fullname = $row["mpt_pao_fullname"];
                $mpt_driver_fullname = $row["mpt_driver_fullname"];
                $mpt_rounds_one = $row["mpt_rounds_one"];
                $mpt_rounds_two = $row["mpt_rounds_two"];
                $mpt_rounds_three = $row["mpt_rounds_three"];
                $mpt_rounds_four = $row["mpt_rounds_four"];
                $mpt_rounds_five = $row["mpt_rounds_five"];
                $mpt_rounds_six = $row["mpt_rounds_six"];
                $mpt_total_cash = $row["mpt_total_cash"];
                $mpt_expenses = $row["mpt_expenses"];
                $mpt_handheld = $row["mpt_handheld"];
                $mpt_boundery = $row["mpt_boundery"];
                $mpt_diesel = $row["mpt_diesel"];
                $mpt_amount = $row["mpt_amount"];
                $mpt_pao_income = $row["mpt_pao_income"];
                $mpt_driver_income = $row["mpt_driver_income"];

                echo'
                    <!-- Edit PUJ-->
                    <div class="salaryMpujComputeEdit dashboard-edit-update-container yot-bg-white">
                        <!-- Computation MPUJ -->
                        <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-see-goddess yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <h3>Salary Computation for MPUJ</h3> <br>
                                <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                            </div>
                            <hr>
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <div>
                                    <h3>Updating Salary</h3>
                                    <h5>'. $mpt_pao_fullname .'</h5>
                                    <h5>'. $mpt_driver_fullname .'</h5>
                                </div>
        
                                <div id="saveMpujSalary" class="yot-mt-8 saveEditMpuj" style="display:none">
                                    <button style="font-size: 16px;" class="yot-btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
        
                        <!-- Form -->
                        <form id="formMpujSalaryEdit" style=" overflow-x: auto; height: 550px; margin-top:24px;">
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Rounds 1</b></label>
                                    <input class="yot-form-input roundsMpujOneEdit" type="number" name="roundsMpujOneEdit" id="roundsMpujOneEdit" value="'.$mpt_rounds_one.'">
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Rounds 2</b></label>
                                    <input class="yot-form-input roundsMpujTwoEdit" type="number" name="roundsMpujTwoEdit" id="roundsMpujTwoEdit" value="'.$mpt_rounds_two.'">
                                </div>
        
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Rounds 3</b></label>
                                    <input class="yot-form-input roundsMpujThreeEdit" type="number" name="roundsMpujThreeEdit" id="roundsMpujThreeEdit" value="'.$mpt_rounds_three.'">
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Rounds 4</b></label>
                                    <input class="yot-form-input roundsMpujFourEdit" type="number" name="roundsMpujFourEdit" id="roundsMpujFourEdit" value="'.$mpt_rounds_four.'">
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Rounds 5</b></label>
                                    <input class="yot-form-input roundsMpujFiveEdit" type="number" name="roundsMpujFiveEdit" id="roundsMpujFiveEdit" value="'.$mpt_rounds_five.'">
                                </div>
        
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Rounds 6</b></label>
                                    <input class="yot-form-input roundsMpujSixEdit" type="number" name="roundsMpujSixEdit" id="roundsMpujSixEdit" value="'.$mpt_rounds_six.'">
                                </div>
                            </div>
        
                            <hr class="yot-mb-16">
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group ">
                                    <label for="" class="yot-text-fs-m"><b>Expenses </b></label>
                                    <input class="yot-form-input expensesMpujEdit" type="number" name="expensesMpujEdit" id="expensesMpujEdit"  value="'. $mpt_expenses .'">
                                    <span class="yot-tc-red errExpensesMpujEdit" style="display: none;"><b>The Expenses field is required.</b></span>
                                </div>
    
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Boundary </b></label>
                                    <input class="yot-form-input boundaryMpujEdit" type="number" name="boundaryMpujEdit" id="boundaryMpujEdit"  value="'. $mpt_boundery .'">
                                    <span class="yot-tc-red errBoundaryMpujEdit" style="display: none;"><b>The Boundary field is required.</b></span>
                                </div>

                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Diesel </b></label>
                                    <input class="yot-form-input dieselMpujEdit" type="number" name="dieselMpujEdit" id="dieselMpujEdit" value="'. $mpt_diesel .'">
                                    <span class="yot-tc-red errDieselMpujEdit" style="display: none;"><b>The Diesel field is required.</b></span>
                                </div>
                            </div>
        
                            <hr class="yot-mb-16">

                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Cash </b></label>
                                    <input value="'. $mpt_total_cash .'" class="cashMpujEdit yot-form-input" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="cashMpujEdit" id="cashMpujEdit" disabled>
                                </div>

                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Handheld </b></label>
                                    <input value="'. $mpt_handheld .'" class="handHeldMpujEdit yot-form-input" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="handHeldMpujEdit" id="handHeldMpujEdit" disabled>
                                </div>

                                <div class="yot-form-group" style="displaye:none">
                                    <input type="hidden" name="dataIdMpujEdit" id="dataIdMpujEdit" value="' . $mpt_id . '" disabled>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Total Amount</b></label>
                                    <input value="'. $mpt_amount .'" class="totalAmountMpujEdit yot-form-input" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="totalAmountMpujEdit" id="totalAmountMpujEdit" disabled>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Driver Income </b></label>
                                    <input value="'. $mpt_driver_income .'"  class="driverIncomeMpujEdit yot-form-input " style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="driverIncomeMpujEdit" id="driverIncomeMpujEdit" disabled>
                                </div>
        
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Pao Income </b></label>
                                    <input value="'. $mpt_pao_income .'" class="paoIncomeMpujEdit yot-form-input" style="background: #CCC; color: #333; font-weight:bolder; border: 1px solid #666 " type="text" name="paoIncomeMpujEdit" id="paoIncomeMpujEdit" disabled>
                                </div>
                            </div>
        
                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <!-- <button  id="compute">Compute</button> -->
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-five computSave" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                ';
            }
        }
    }
?>