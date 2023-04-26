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
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                $db_u_username = $row["u_username"];
                $db_u_password = $row["u_password"];

                echo'
                    <!-- Edit Account-->
                    <div class="createAccountContainerEdit dashboard-edit-update-container yot-bg-white">
                        <div class="yot-mb-16 yot-bg-white yot-pa-24 yot-bg-see-goddess yot-tc-white" style="margin-top: -30px; border-radius: 8px;">
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <h3>Updating Account</h3> <br>
                                <i class="fa-solid fa-circle-xmark closeBtn yot-cursor-pointer" style="font-size: 24px;"></i>
                            </div>
        
                            <div class="yot-flex yot-flex-ai-c-jc-sb">
                                <div>
                                    <h5>' .$db_u_last_name . "," .$db_u_middle_name . " " . $db_u_first_name.'</h5>
                                </div>
                            </div>
                        </div>
        
                        <!-- Form -->
                        <form id="formAccountEdit" style=" overflow-x: auto;margin-top:24px;">
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Last Name</b></label>
                                    <input class="yot-form-input lNameEdit" type="text" name="lastNameEdit" id="lastNameEdit" value="' . $db_u_last_name .'">
                                    <span class="yot-tc-red errLnameEdit" style="display: none;"><b>The Last Name field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Middle Name</b></label>
                                    <input class="yot-form-input" type="text" name="middleNameEdit" id="middleNameEdit" value="' . $db_u_middle_name .'">
                                </div>
        
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>First Name</b></label>
                                    <input class="yot-form-input fNameEdit" type="text" name="firstNameEdit" id="firstNameEdit" value="' . $db_u_first_name .'">
                                    <span class="yot-tc-red errFnameEdit" style="display: none;"><b>The First Name field is required.</b></span>
                                </div>
                            </div>
        
                            <div class="yot-flex-tab">
                                <div class="yot-form-group">
                                    <label for="" class="yot-text-fs-m"><b>Username</b></label>
                                    <input class="yot-form-input usernameEdit" type="text" name="usernameEdit" id="usernameEdit" value="' . $db_u_username .'">
                                    <span class="yot-tc-red errUsernameEdit" style="display: none;"><b>The Username field is required.</b></span>
                                </div>
        
                                <div class="yot-form-group yot-form-input-seperator">
                                    <label for="" class="yot-text-fs-m"><b>Password</b></label>
                                    <input class="yot-form-input passwordEdit" type="text" name="passwordEdit" id="passwordEdit" value="' . $db_u_password .'">
                                    <span class="yot-tc-red errPasswordEdit" style="display: none;"><b>The Password field is required.</b></span>
                                    <span class="yot-tc-red errPasswordlengthEdit" style="display: none;"><b>The Password must 8 characters or more!</b></span>
                                </div>

                                <div class="yot-form-group" style="displaye:none">
                                    <input type="hidden" name="dataIdAccountEdit" id="dataIdAccountEdit" value="' . $db_u_id . '" disabled>
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