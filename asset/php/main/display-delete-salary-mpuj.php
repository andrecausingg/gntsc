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
            // File Option Birth Date
            require_once("../helper/others/option-birthdateHF.php");
            // File Option Expiration License Date
            require_once("../helper/others/option-licenseHF.php");
            // File Option Gender
            require_once("../helper/others/option-gender.php");
            // File Option Gender
            require_once("../helper/others/option-civil-status.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
        
            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_mpt_id = $row["mpt_id"];
                $db_mpt_pao_fullname = $row["mpt_pao_fullname"];
                $db_mpt_driver_fullname = $row["mpt_driver_fullname"];
                
                echo'
                    <!-- Delete Data-->
                    <div class="deleteContainer dashboard-edit-update-container yot-bg-rapsody-blue yot-tc-white yot-text-center"  style="border-radius:8px">
                        <h3 class="yot-mb-16">ARE YOU SURE YOU WANT TO DELETE?</h3>
                        <h4 class="yot-mb-8">'. "PAO: " .$db_mpt_pao_fullname .'</h4>
                        <h4 class="yot-mb-16">'. "PUJ: "  .$db_mpt_driver_fullname .'</h4>

                        <div class="yot-flex yot-flex-ai-c-jc-c">
                            <div class="yot-text-center yot-mr-8">
                                <form id="formDelete">
                                    <input style="font-size: 20px;" class="yot-btn-primary" id="dataIdDelete" type="hidden" value="'. $db_mpt_id .'">
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