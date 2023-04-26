<?php
    if(isset($_POST["dataId"])){
        $classDisplayDelete = new classDisplayDelete();
        $classDisplayDelete->setDataId($_POST["dataId"]);
        $classDisplayDelete->displayStaffDelete();
    }

    class classDisplayDelete{
        private $dataId;

        function setDataId($dataId){
            $this->dataId = $dataId;
        }

        function displayStaffDelete(){
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
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_sit_id = $row["sit_id"];
                $db_sit_role_name = $row["sit_role_name"];
                $db_sit_surname = $row["sit_surname"];
                $db_sit_middlename = $row["sit_middlename"];
                $db_sit_firstname = $row["sit_firstname"];
                
                echo'
                    <!-- Delete Data-->
                    <div class="deleteContainer dashboard-edit-update-container yot-bg-rapsody-blue yot-tc-white yot-text-center"  style="border-radius:8px">
                        <h3 class="yot-mb-16">ARE YOU SURE YOU WANT TO DELETE?</h3>
                        <h4>'. $db_sit_role_name  .'</h4>
                        <h4 class="yot-mb-16">' .$db_sit_surname . ", " . $db_sit_middlename . " ". $db_sit_firstname . '</h4>
        
                        <div class="yot-flex yot-flex-ai-c-jc-c">
                            <div class="yot-text-center yot-mr-8">
                                <form id="formDelete">
                                    <input style="font-size: 20px;" class="yot-btn-primary" id="dataIdDelete" type="hidden" value="'. $db_sit_id .'">
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