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

            // Class
            $classDataBaseConnection = new classDataBaseConnection();
        
            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = '$this->dataId' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                
                echo'
                    <!-- Delete Data-->
                    <div class="deleteContainer dashboard-edit-update-container yot-bg-rapsody-blue yot-tc-white yot-text-center"  style="border-radius:8px">
                        <h3 class="yot-mb-16">ARE YOU SURE YOU WANT TO DELETE?</h3>
                        <h4 class="yot-mb-8">' . $db_u_last_name .", " . $db_u_middle_name . " " . $db_u_first_name .'</h4>

                        <div class="yot-flex yot-flex-ai-c-jc-c">
                            <div class="yot-text-center yot-mr-8">
                                <form id="formDelete">
                                    <input style="font-size: 20px;" class="yot-btn-primary" id="dataIdDelete" type="hidden" value="'. $db_u_id .'">
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