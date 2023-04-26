<?php
    if(isset($_POST["dataId"]) && isset($_POST["dataRoleName"])){
        $classDisplayEditStaff = new classDisplayEditStaff();
        $classDisplayEditStaff->setDataId($_POST["dataId"]);

        if($_POST["dataRoleName"] == "PUJ"){
            $classDisplayEditStaff->displayStaffPujEdit();
        }else if($_POST["dataRoleName"] == "PAO"){
            $classDisplayEditStaff->displayStaffPaoEdit();
        }else if($_POST["dataRoleName"] == "STA"){
            $classDisplayEditStaff->displayStaffInsEdit();
        }else if($_POST["dataRoleName"] == "OPE"){
            $classDisplayEditStaff->displayStaffOpeEdit();
        }else if($_POST["dataRoleName"] == "TRA"){
            $classDisplayEditStaff->displayStaffTraEdit();
        }
    }

    class classDisplayEditStaff{
        private $dataId;

        function setDataId($dataId){
            $this->dataId = $dataId;
        }

        function displayStaffPujEdit(){
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
                $db_sit_birthdate = $row["sit_birthdate"];
                $db_sit_birthplace = $row["sit_birthplace"];
                $db_sit_gender = $row["sit_gender"];
                $db_sit_civil_status = $row["sit_civil_status"];
                $db_sit_address = $row["sit_address"];
                $db_sit_contact_num = $row["sit_contact_num"];
                $db_sit_license = $row["sit_license"];
                $db_sit_license_expiredate = $row["sit_license_expiredate"];

                // Explode Birth Date
                $birthDate = $db_sit_birthdate;
                $exp = explode('-', $birthDate);
                $birthMonthNum = $exp[0];
                $birthdayNum = $exp[1];
                $birthYearNum = $exp[2];

                // Explode License Date
                $licenseExp = $db_sit_license_expiredate;
                $exp = explode('-', $licenseExp);
                $expMontNum = $exp[0];
                $expDayNum = $exp[1];
                $expYearNum = $exp[2];

                $classBirthDate = new classBirthDate($birthMonthNum, $birthdayNum, $birthYearNum);
                $classLicenseDate = new classLicenseDate($expMontNum, $expDayNum, $expYearNum);
                $classGender = new classGender($db_sit_gender);
                $classCiviStatus = new classCiviStatus($db_sit_civil_status);
                
                echo'
                    <!-- Edit PUJ-->
                    <div class="editPujContainer dashboard-edit-update-container yot-bg-white" >
                        <div class="yot-bg-see-goddess yot-pa-24 yot-flex yot-flex-ai-c-jc-sb yot-tc-white" style=" border-radius: 8px; margin-top:-30px;">
                            <div>
                                <h4>Editing Mpuj Driver Information</h4>
                            </div>
        
                            <i class="fa-solid fa-x closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                        </div>
        
                        <!-- Form -->
                        <form id="formPujEdit" style=" overflow-x: auto; height: 600px; margin-top:24px;">
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Role</b></label>
                                    <input class="yot-form-input" type="text" value="Driver" disabled>
                                </div>
                                <div class="yot-form-group" style="display:none">
                                    <label for="" class="yot-text-fs-m"><b>Role</b></label>
                                    <input class="yot-form-input" type="text" name="roleNameEditPuj" id="roleNameEditPuj" value="' . $db_sit_role_name . '" disabled>
                                </div>
                                <div class="yot-form-group" style="displaye:none">
                                    <input type="hidden" name="dataIdEditPuj" id="dataIdEditPuj" value="' . $db_sit_id . '" disabled>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Last Name</b></label>
                                    <input class="yot-form-input lNameEditPuj" type="text" name="lastNameEditPuj" id="lastNameEditPuj" value="' . $db_sit_surname . '">
                                    <span class="yot-tc-red errLnameEditPuj" style="display: none;"><b>The Last Name field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Middle Name</b></label>
                                    <input class="yot-form-input" type="text" name="middleNameEditPuj" id="middleNameEditPuj" value="' . $db_sit_middlename . '">
                                </div>
        
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>First Name</b></label>
                                    <input class="yot-form-input fNameEditPuj" type="text" name="firstNameEditPuj" id="firstNameEditPuj" value="' . $db_sit_firstname . '">
                                    <span class="yot-tc-red errFnameEditPuj" style="display: none;"><b>The First Name field is required.</b></span>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Birth Date</b></label>
                                    <div class="yot-flex">
                                        <select class="yot-form-input" name="birthMonthEditPuj" id="birthMonthEditPuj" style="width: 150px;">
                                            '; $classBirthDate->getBirthMonth(); echo'
                                        </select>
        
                                        <select class="yot-form-input yot-form-select-seperator" name="birthDayEditPuj" id="birthDayEditPuj" style="width: 150px;">
                                            '; $classBirthDate->getBirthDay(); echo'
                                        </select>
        
                                        <select class="yot-form-input birthYear" name="birthYearEditPuj" id="birthYearEditPuj" style="width: 150px;">
                                            '; $classBirthDate->getBirthYear(); echo'
                                        </select>
                                    </div>
                                    <span class="yot-tc-red errAgeEditPuj" style="display: none;"><b>The Age Must 18 Above.</b></span>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Birth Place</b></label>
                                    <input class="yot-form-input birthPlaceEditPuj" type="text" name="birthPlaceEditPuj" id="birthPlaceEditPuj" value="' . $db_sit_birthplace . '">
                                    <span class="yot-tc-red errBirthPlaceEditPuj" style="display: none;"><b>The Birth Place field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Gender</b></label>
                                    <select class="yot-form-input" name="genderEditPuj" id="genderEditPuj" style="width: 150px;">
                                        '; $classGender->getGender(); echo'
                                    </select>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Civil Status</b></label>
                                    <select class="yot-form-input" name="civilStatusEditPuj" id="civilStatusEditPuj" style="width: 150px;">
                                        '; $classCiviStatus->getciviStatus(); echo'
                                    </select>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Address</b></label>
                                    <input class="yot-form-input addressEditPuj" type="text" name="addressEditPuj" id="addressEditPuj" value="' . $db_sit_address . '">
                                    <span class="yot-tc-red errAddressEditPuj" style="display: none;"><b>The Address field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group ">
                                    <label for="" class="yot-text-fs-m"><b>Contact Number</b></label>
                                    <input class="yot-form-input contactNumberEditPuj" type="text" name="contactNumberEditPuj" id="contactNumberEditPuj"  value="' . $db_sit_contact_num . '">
                                    <span class="yot-tc-red errContactNumberEditPuj" style="display: none;"><b>The Contact Number field is required.</b></span>
                                    <span class="yot-tc-red errContactNumberLessMorethanEditPuj" style="display: none;"><b>The Contact Number must 11 Digit.</b></span>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>License Number</b></label>
                                    <input class="yot-form-input licenseNumberEditPuj" type="text" name="licenseNumberEditPuj" id="licenseNumberEditPuj" value="' . $db_sit_license . '">
                                    <span class="yot-tc-red errLicenseNumberEditPuj" style="display: none;"><b>The License Number field is required.</b></span>
                                </div>
                                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>License Expired Date</b></label>
                                    <div class="yot-flex">
                                        <select class="yot-form-input" name="licenseExpMonEditPuj" id="licenseExpMonEditPuj" style="width: 100px;">
                                            '; $classLicenseDate->getExpMonth(); echo'
                                        </select>
        
                                        <select class="yot-form-input yot-form-select-seperator" name="licenseExpdayEditPuj" id="licenseExpdayEditPuj" style="width: 100px;">
                                            '; $classLicenseDate->getExpDay(); echo'
                                        </select>
        
                                        <select class="yot-form-input" name="licenseExpYear" id="licenseExpYearEditPuj" style="width: 100px;">
                                            '; $classLicenseDate->getExpYear(); echo'
                                        </select>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-five" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                ';
            }
        }

        function displayStaffPaoEdit(){
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
                $db_sit_birthdate = $row["sit_birthdate"];
                $db_sit_birthplace = $row["sit_birthplace"];
                $db_sit_gender = $row["sit_gender"];
                $db_sit_civil_status = $row["sit_civil_status"];
                $db_sit_address = $row["sit_address"];
                $db_sit_contact_num = $row["sit_contact_num"];

                // Explode Birth Date
                $birthDate = $db_sit_birthdate;
                $exp = explode('-', $birthDate);
                $birthMonthNum = $exp[0];
                $birthdayNum = $exp[1];
                $birthYearNum = $exp[2];

                $classBirthDate = new classBirthDate($birthMonthNum, $birthdayNum, $birthYearNum);
                $classGender = new classGender($db_sit_gender);
                $classCiviStatus = new classCiviStatus($db_sit_civil_status);
                
                echo'
                    <!-- Edit Pao-->
                    <div class="editPaoContainer dashboard-edit-update-container yot-bg-white" >
                        <div class="yot-bg-see-goddess yot-pa-24 yot-flex yot-flex-ai-c-jc-sb yot-tc-white" style=" border-radius: 8px; margin-top:-30px;">
                            <div>
                                <h4>Editing PAO Information</h4>
                            </div>
                
                            <i class="fa-solid fa-x closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                        </div>
                
                        <!-- Form -->
                        <form id="formPaoEdit" style=" overflow-x: auto; height: 600px; margin-top:24px;">
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Role</b></label>
                                    <input class="yot-form-input" type="text" name="roleNameEditPao" id="roleNameEditPao" value="' . $db_sit_role_name . '" disabled>
                                </div>
                                <div class="yot-form-group" style="display:none">
                                    <input type="hidden" name="dataIdEditPao" id="dataIdEditPao" value="' . $db_sit_id . '" disabled>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Last Name</b></label>
                                    <input class="yot-form-input lNameEditPao" type="text" name="lastNameEditPao" id="lastNameEditPao" value="' . $db_sit_surname . '">
                                    <span class="yot-tc-red errLnameEditPao" style="display: none;"><b>The Last Name field is required.</b></span>
                                </div>
                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Middle Name</b></label>
                                    <input class="yot-form-input" type="text" name="middleNameEditPao" id="middleNameEditPao" value="' . $db_sit_middlename . '">
                                </div>
                
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>First Name</b></label>
                                    <input class="yot-form-input fNameEditPao" type="text" name="firstNameEditPao" id="firstNameEditPao" value="' . $db_sit_firstname . '">
                                    <span class="yot-tc-red errFnameEditPao" style="display: none;"><b>The First Name field is required.</b></span>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Birth Date</b></label>
                                    <div class="yot-flex">
                                        <select class="yot-form-input" name="birthMonthEditPao" id="birthMonthEditPao" style="width: 150px;">
                                            '; $classBirthDate->getBirthMonth(); echo'
                                        </select>
                
                                        <select class="yot-form-input yot-form-select-seperator" name="birthDayEditPao" id="birthDayEditPao" style="width: 150px;">
                                            '; $classBirthDate->getBirthDay(); echo'
                                        </select>
                
                                        <select class="yot-form-input birthYear" name="birthYearEditPao" id="birthYearEditPao" style="width: 150px;">
                                            '; $classBirthDate->getBirthYear(); echo'
                                        </select>
                                    </div>
                                    <span class="yot-tc-red errAgeEditPao" style="display: none;"><b>The Age Must 18 Above.</b></span>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Birth Place</b></label>
                                    <input class="yot-form-input birthPlaceEditPao" type="text" name="birthPlaceEditPao" id="birthPlaceEditPao" value="' . $db_sit_birthplace . '">
                                    <span class="yot-tc-red errBirthPlaceEditPao" style="display: none;"><b>The Birth Place field is required.</b></span>
                                </div>
                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Gender</b></label>
                                    <select class="yot-form-input" name="genderEditPao" id="genderEditPao" style="width: 150px;">
                                        '; $classGender->getGender(); echo'
                                    </select>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Civil Status</b></label>
                                    <select class="yot-form-input" name="civilStatusEditPao" id="civilStatusEditPao" style="width: 150px;">
                                        '; $classCiviStatus->getciviStatus(); echo'
                                    </select>
                                </div>
                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Address</b></label>
                                    <input class="yot-form-input addressEditPao" type="text" name="addressEditPao" id="addressEditPao" value="' . $db_sit_address . '">
                                    <span class="yot-tc-red errAddressEditPao" style="display: none;"><b>The Address field is required.</b></span>
                                </div>
                
                                <div class="yot-form-group ">
                                    <label for="" class="yot-text-fs-m"><b>Contact Number</b></label>
                                    <input class="yot-form-input contactNumberEditPao" type="text" name="contactNumberEditPao" id="contactNumberEditPao"  value="' . $db_sit_contact_num . '">
                                    <span class="yot-tc-red errContactNumberEditPao" style="display: none;"><b>The Contact Number field is required.</b></span>
                                    <span class="yot-tc-red errContactNumberLessMorethanEditPao" style="display: none;"><b>The Contact Number must 11 Digit.</b></span>
                                </div>
                            </div>
                
                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-five" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                ';
            }
        }

        function displayStaffInsEdit(){
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
                $db_sit_position = $row["sit_position"];
                $db_sit_surname = $row["sit_surname"];
                $db_sit_middlename = $row["sit_middlename"];
                $db_sit_firstname = $row["sit_firstname"];
                $db_sit_birthdate = $row["sit_birthdate"];
                $db_sit_birthplace = $row["sit_birthplace"];
                $db_sit_gender = $row["sit_gender"];
                $db_sit_civil_status = $row["sit_civil_status"];
                $db_sit_address = $row["sit_address"];
                $db_sit_contact_num = $row["sit_contact_num"];

                // Explode Birth Date
                $birthDate = $db_sit_birthdate;
                $exp = explode('-', $birthDate);
                $birthMonthNum = $exp[0];
                $birthdayNum = $exp[1];
                $birthYearNum = $exp[2];

                $classBirthDate = new classBirthDate($birthMonthNum, $birthdayNum, $birthYearNum);
                $classGender = new classGender($db_sit_gender);
                $classCiviStatus = new classCiviStatus($db_sit_civil_status);
                
                echo'
                    <!-- Edit Ins-->
                    <div class="editInsContainer dashboard-edit-update-container yot-bg-white" >
                        <div class="yot-bg-see-goddess yot-pa-24 yot-flex yot-flex-ai-c-jc-sb yot-tc-white" style=" border-radius: 8px; margin-top:-30px;">
                            <div>
                                <h4>Editing Staff Information</h4>
                            </div>
                
                            <i class="fa-solid fa-x closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                        </div>
                
                        <!-- Form -->
                        <form id="formInsEdit" style=" overflow-x: auto; height: 600px; margin-top:24px;">
                            <div class="yot-flex-tab">
                                <div class="yot-form-group" style="display:none;">
                                    <label for="" class="yot-text-fs-m"><b>Role</b></label>
                                    <input class="yot-form-input" type="text" name="roleNameEditIns" id="roleNameEditIns" value="' . $db_sit_role_name . '" disabled>
                                </div>
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Position</b></label>
                                    <input class="yot-form-input positionInsEdit" type="text" name="positionInsEdit" id="positionInsEdit" value="' . $db_sit_position . '">
                                    <span class="yot-tc-red errPositionInsEdit" style="display: none;"><b>The Position field is required.</b></span>
                                </div>
                                <div class="yot-form-group" style="display:none">
                                    <input type="hidden" name="dataIdEditIns" id="dataIdEditIns" value="' . $db_sit_id . '" disabled>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Last Name</b></label>
                                    <input class="yot-form-input lNameEditIns" type="text" name="lastNameEditIns" id="lastNameEditIns" value="' . $db_sit_surname . '">
                                    <span class="yot-tc-red errLnameEditIns" style="display: none;"><b>The Last Name field is required.</b></span>
                                </div>
                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Middle Name</b></label>
                                    <input class="yot-form-input" type="text" name="middleNameEditIns" id="middleNameEditIns" value="' . $db_sit_middlename . '">
                                </div>
                
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>First Name</b></label>
                                    <input class="yot-form-input fNameEditIns" type="text" name="firstNameEditIns" id="firstNameEditIns" value="' . $db_sit_firstname . '">
                                    <span class="yot-tc-red errFnameEditIns" style="display: none;"><b>The First Name field is required.</b></span>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Birth Date</b></label>
                                    <div class="yot-flex">
                                        <select class="yot-form-input" name="birthMonthEditIns" id="birthMonthEditIns" style="width: 150px;">
                                            '; $classBirthDate->getBirthMonth(); echo'
                                        </select>
                
                                        <select class="yot-form-input yot-form-select-seperator" name="birthDayEditIns" id="birthDayEditIns" style="width: 150px;">
                                            '; $classBirthDate->getBirthDay(); echo'
                                        </select>
                
                                        <select class="yot-form-input birthYear" name="birthYearEditIns" id="birthYearEditIns" style="width: 150px;">
                                            '; $classBirthDate->getBirthYear(); echo'
                                        </select>
                                    </div>
                                    <span class="yot-tc-red errAgeEditIns" style="display: none;"><b>The Age Must 18 Above.</b></span>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Birth Place</b></label>
                                    <input class="yot-form-input birthPlaceEditIns" type="text" name="birthPlaceEditIns" id="birthPlaceEditIns" value="' . $db_sit_birthplace . '">
                                    <span class="yot-tc-red errBirthPlaceEditIns" style="display: none;"><b>The Birth Place field is required.</b></span>
                                </div>
                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Gender</b></label>
                                    <select class="yot-form-input" name="genderEditIns" id="genderEditIns" style="width: 150px;">
                                        '; $classGender->getGender(); echo'
                                    </select>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Civil Status</b></label>
                                    <select class="yot-form-input" name="civilStatusEditIns" id="civilStatusEditIns" style="width: 150px;">
                                        '; $classCiviStatus->getciviStatus(); echo'
                                    </select>
                                </div>
                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Address</b></label>
                                    <input class="yot-form-input addressEditIns" type="text" name="addressEditIns" id="addressEditIns" value="' . $db_sit_address . '">
                                    <span class="yot-tc-red errAddressEditIns" style="display: none;"><b>The Address field is required.</b></span>
                                </div>
                
                                <div class="yot-form-group ">
                                    <label for="" class="yot-text-fs-m"><b>Contact Number</b></label>
                                    <input class="yot-form-input contactNumberEditIns" type="text" name="contactNumberEditIns" id="contactNumberEditIns"  value="' . $db_sit_contact_num . '">
                                    <span class="yot-tc-red errContactNumberEditIns" style="display: none;"><b>The Contact Number field is required.</b></span>
                                    <span class="yot-tc-red errContactNumberLessMorethanEditIns" style="display: none;"><b>The Contact Number must 11 Digit.</b></span>
                                </div>
                            </div>
                
                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-five" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                ';
            }
        }

        function displayStaffOpeEdit(){
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
                $db_sit_plate_num = $row["sit_plate_num"];
                $db_sit_surname = $row["sit_surname"];
                $db_sit_middlename = $row["sit_middlename"];
                $db_sit_firstname = $row["sit_firstname"];
                $db_sit_birthdate = $row["sit_birthdate"];
                $db_sit_birthplace = $row["sit_birthplace"];
                $db_sit_gender = $row["sit_gender"];
                $db_sit_civil_status = $row["sit_civil_status"];
                $db_sit_address = $row["sit_address"];
                $db_sit_contact_num = $row["sit_contact_num"];

                // Explode Birth Date
                $birthDate = $db_sit_birthdate;
                $exp = explode('-', $birthDate);
                $birthMonthNum = $exp[0];
                $birthdayNum = $exp[1];
                $birthYearNum = $exp[2];

                $classBirthDate = new classBirthDate($birthMonthNum, $birthdayNum, $birthYearNum);
                $classGender = new classGender($db_sit_gender);
                $classCiviStatus = new classCiviStatus($db_sit_civil_status);
                
                echo'
                    <!-- Edit Ope-->
                    <div class="editOpeContainer dashboard-edit-update-container yot-bg-white" >
                        <div class="yot-bg-see-goddess yot-pa-24 yot-flex yot-flex-ai-c-jc-sb yot-tc-white" style=" border-radius: 8px; margin-top:-30px;">
                            <div>
                                <h4>Editing Ope Information</h4>
                            </div>
                
                            <i class="fa-solid fa-x closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                        </div>
                
                        <!-- Form -->
                        <form id="formOpeEdit" style=" overflow-x: auto; height: 600px; margin-top:24px;">
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Role</b></label>
                                    <input class="yot-form-input" type="text" name="roleNameEditOpe" id="roleNameEditOpe" value="' . $db_sit_role_name . '" disabled>
                                </div>
                                <div class="yot-form-group" style="display:none">
                                    <input type="hidden" name="dataIdEditOpe" id="dataIdEditOpe" value="' . $db_sit_id . '" disabled>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Last Name</b></label>
                                    <input class="yot-form-input lNameEditOpe" type="text" name="lastNameEditOpe" id="lastNameEditOpe" value="' . $db_sit_surname . '">
                                    <span class="yot-tc-red errLnameEditOpe" style="display: none;"><b>The Last Name field is required.</b></span>
                                </div>
                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Middle Name</b></label>
                                    <input class="yot-form-input" type="text" name="middleNameEditOpe" id="middleNameEditOpe" value="' . $db_sit_middlename . '">
                                </div>
                
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>First Name</b></label>
                                    <input class="yot-form-input fNameEditOpe" type="text" name="firstNameEditOpe" id="firstNameEditOpe" value="' . $db_sit_firstname . '">
                                    <span class="yot-tc-red errFnameEditOpe" style="display: none;"><b>The First Name field is required.</b></span>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Birth Date</b></label>
                                    <div class="yot-flex">
                                        <select class="yot-form-input" name="birthMonthEditOpe" id="birthMonthEditOpe" style="width: 150px;">
                                            '; $classBirthDate->getBirthMonth(); echo'
                                        </select>
                
                                        <select class="yot-form-input yot-form-select-seperator" name="birthDayEditOpe" id="birthDayEditOpe" style="width: 150px;">
                                            '; $classBirthDate->getBirthDay(); echo'
                                        </select>
                
                                        <select class="yot-form-input birthYear" name="birthYearEditOpe" id="birthYearEditOpe" style="width: 150px;">
                                            '; $classBirthDate->getBirthYear(); echo'
                                        </select>
                                    </div>
                                    <span class="yot-tc-red errAgeEditOpe" style="display: none;"><b>The Age Must 18 Above.</b></span>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Birth Place</b></label>
                                    <input class="yot-form-input birthPlaceEditOpe" type="text" name="birthPlaceEditOpe" id="birthPlaceEditOpe" value="' . $db_sit_birthplace . '">
                                    <span class="yot-tc-red errBirthPlaceEditOpe" style="display: none;"><b>The Birth Place field is required.</b></span>
                                </div>
                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Gender</b></label>
                                    <select class="yot-form-input" name="genderEditOpe" id="genderEditOpe" style="width: 150px;">
                                        '; $classGender->getGender(); echo'
                                    </select>
                                </div>
                            </div>
                
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Civil Status</b></label>
                                    <select class="yot-form-input" name="civilStatusEditOpe" id="civilStatusEditOpe" style="width: 150px;">
                                        '; $classCiviStatus->getciviStatus(); echo'
                                    </select>
                                </div>
                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Address</b></label>
                                    <input class="yot-form-input addressEditOpe" type="text" name="addressEditOpe" id="addressEditOpe" value="' . $db_sit_address . '">
                                    <span class="yot-tc-red errAddressEditOpe" style="display: none;"><b>The Address field is required.</b></span>
                                </div>
                
                                <div class="yot-form-group ">
                                    <label for="" class="yot-text-fs-m"><b>Contact Number</b></label>
                                    <input class="yot-form-input contactNumberEditOpe" type="text" name="contactNumberEditOpe" id="contactNumberEditOpe"  value="' . $db_sit_contact_num . '">
                                    <span class="yot-tc-red errContactNumberEditOpe" style="display: none;"><b>The Contact Number field is required.</b></span>
                                    <span class="yot-tc-red errContactNumberLessMorethanEditOpe" style="display: none;"><b>The Contact Number must 11 Digit.</b></span>
                                </div>
                            </div>

                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Plate No.</b></label>
                                    <input class="yot-form-input plateNumOpeEdit" type="text" name="plateNumOpeEdit" id="plateNumOpeEdit" value="'. $db_sit_plate_num .'">
                                    <span class="yot-tc-red errPlateNumOpeEdit" style="display: none;"><b>The Plate No. field is required.</b></span>
                                </div>
                            </div>
                    
                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-five" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                ';
            }
        }

        function displayStaffTraEdit(){
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
                $db_sit_birthdate = $row["sit_birthdate"];
                $db_sit_birthplace = $row["sit_birthplace"];
                $db_sit_gender = $row["sit_gender"];
                $db_sit_civil_status = $row["sit_civil_status"];
                $db_sit_address = $row["sit_address"];
                $db_sit_contact_num = $row["sit_contact_num"];
                $db_sit_license = $row["sit_license"];
                $db_sit_license_expiredate = $row["sit_license_expiredate"];

                // Explode Birth Date
                $birthDate = $db_sit_birthdate;
                $exp = explode('-', $birthDate);
                $birthMonthNum = $exp[0];
                $birthdayNum = $exp[1];
                $birthYearNum = $exp[2];

                // Explode License Date
                $licenseExp = $db_sit_license_expiredate;
                $exp = explode('-', $licenseExp);
                $expMontNum = $exp[0];
                $expDayNum = $exp[1];
                $expYearNum = $exp[2];

                $classBirthDate = new classBirthDate($birthMonthNum, $birthdayNum, $birthYearNum);
                $classLicenseDate = new classLicenseDate($expMontNum, $expDayNum, $expYearNum);
                $classGender = new classGender($db_sit_gender);
                $classCiviStatus = new classCiviStatus($db_sit_civil_status);
                
                echo'
                    <!-- Edit Tra-->
                    <div class="editTraContainer dashboard-edit-update-container yot-bg-white" >
                        <div class="yot-bg-see-goddess yot-pa-24 yot-flex yot-flex-ai-c-jc-sb yot-tc-white" style=" border-radius: 8px; margin-top:-30px;">
                            <div>
                                <h4>Editing Trad Driver Information</h4>
                            </div>
        
                            <i class="fa-solid fa-x closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                        </div>
        
                        <!-- Form -->
                        <form id="formTraEdit" style=" overflow-x: auto; height: 600px; margin-top:24px;">
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Role</b></label>
                                    <input class="yot-form-input" type="text" value="Driver" disabled>
                                </div>
                                <div class="yot-form-group" style="display:none">
                                    <label for="" class="yot-text-fs-m"><b>Role</b></label>
                                    <input class="yot-form-input" type="text" name="roleNameEditTra" id="roleNameEditTra" value="' . $db_sit_role_name . '" disabled>
                                </div>
                                <div class="yot-form-group" style="display:none">
                                    <input type="hidden" name="dataIdEditTra" id="dataIdEditTra" value="' . $db_sit_id . '" disabled>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Last Name</b></label>
                                    <input class="yot-form-input lNameEditTra" type="text" name="lastNameEditTra" id="lastNameEditTra" value="' . $db_sit_surname . '">
                                    <span class="yot-tc-red errLnameEditTra" style="display: none;"><b>The Last Name field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Middle Name</b></label>
                                    <input class="yot-form-input" type="text" name="middleNameEditTra" id="middleNameEditTra" value="' . $db_sit_middlename . '">
                                </div>
        
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>First Name</b></label>
                                    <input class="yot-form-input fNameEditTra" type="text" name="firstNameEditTra" id="firstNameEditTra" value="' . $db_sit_firstname . '">
                                    <span class="yot-tc-red errFnameEditTra" style="display: none;"><b>The First Name field is required.</b></span>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Birth Date</b></label>
                                    <div class="yot-flex">
                                        <select class="yot-form-input" name="birthMonthEditTra" id="birthMonthEditTra" style="width: 150px;">
                                            '; $classBirthDate->getBirthMonth(); echo'
                                        </select>
        
                                        <select class="yot-form-input yot-form-select-seperator" name="birthDayEditTra" id="birthDayEditTra" style="width: 150px;">
                                            '; $classBirthDate->getBirthDay(); echo'
                                        </select>
        
                                        <select class="yot-form-input birthYear" name="birthYearEditTra" id="birthYearEditTra" style="width: 150px;">
                                            '; $classBirthDate->getBirthYear(); echo'
                                        </select>
                                    </div>
                                    <span class="yot-tc-red errAgeEditTra" style="display: none;"><b>The Age Must 18 Above.</b></span>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Birth Place</b></label>
                                    <input class="yot-form-input birthPlaceEditTra" type="text" name="birthPlaceEditTra" id="birthPlaceEditTra" value="' . $db_sit_birthplace . '">
                                    <span class="yot-tc-red errBirthPlaceEditTra" style="display: none;"><b>The Birth Place field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Gender</b></label>
                                    <select class="yot-form-input" name="genderEditTra" id="genderEditTra" style="width: 150px;">
                                        '; $classGender->getGender(); echo'
                                    </select>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Civil Status</b></label>
                                    <select class="yot-form-input" name="civilStatusEditTra" id="civilStatusEditTra" style="width: 150px;">
                                        '; $classCiviStatus->getciviStatus(); echo'
                                    </select>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Address</b></label>
                                    <input class="yot-form-input addressEditTra" type="text" name="addressEditTra" id="addressEditTra" value="' . $db_sit_address . '">
                                    <span class="yot-tc-red errAddressEditTra" style="display: none;"><b>The Address field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group ">
                                    <label for="" class="yot-text-fs-m"><b>Contact Number</b></label>
                                    <input class="yot-form-input contactNumberEditTra" type="text" name="contactNumberEditTra" id="contactNumberEditTra"  value="' . $db_sit_contact_num . '">
                                    <span class="yot-tc-red errContactNumberEditTra" style="display: none;"><b>The Contact Number field is required.</b></span>
                                    <span class="yot-tc-red errContactNumberLessMorethanEditTra" style="display: none;"><b>The Contact Number must 11 Digit.</b></span>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>License Number</b></label>
                                    <input class="yot-form-input licenseNumberEditTra" type="text" name="licenseNumberEditTra" id="licenseNumberEditTra" value="' . $db_sit_license . '">
                                    <span class="yot-tc-red errLicenseNumberEditTra" style="display: none;"><b>The License Number field is required.</b></span>
                                </div>
                                
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>License Expired Date</b></label>
                                    <div class="yot-flex">
                                        <select class="yot-form-input" name="licenseExpMonEditTra" id="licenseExpMonEditTra" style="width: 100px;">
                                            '; $classLicenseDate->getExpMonth(); echo'
                                        </select>
        
                                        <select class="yot-form-input yot-form-select-seperator" name="licenseExpdayEditTra" id="licenseExpdayEditTra" style="width: 100px;">
                                            '; $classLicenseDate->getExpDay(); echo'
                                        </select>
        
                                        <select class="yot-form-input" name="licenseExpYear" id="licenseExpYearEditTra" style="width: 100px;">
                                            '; $classLicenseDate->getExpYear(); echo'
                                        </select>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Submit btn -->
                            <div class="yot-text-center">
                                <input style="font-size: 20px; width: 50%;" class="yot-btn-five" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                ';
            }
        }
    }
?>