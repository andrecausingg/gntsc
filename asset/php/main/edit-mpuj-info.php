<?php
    if(isset($_POST["dataId"]) && isset($_POST["chasisNum"]) && isset($_POST["plateNum"]) && isset($_POST["mpujNum"]) && isset($_POST["engineNum"]) && isset($_POST["status"])){
        $classEditMpujInfo = new classEditMpujInfo($_POST["dataId"], $_POST["chasisNum"], $_POST["plateNum"], $_POST["mpujNum"], $_POST["engineNum"] , $_POST["status"]);
        $classEditMpujInfo->EditData();
    }

    class classEditMpujInfo{
        private $dataId;
        private $chasisNum;
        private $plateNum;
        private $mpujNum;
        private $engineNum;
        private $status;


        // Methods
        function __construct($dataId, $chasisNum, $plateNum, $mpujNum, $engineNum, $status){
            $this->dataId = $dataId;
            $this->chasisNum = $chasisNum;
            $this->plateNum = $plateNum;
            $this->mpujNum = $mpujNum;
            $this->engineNum = $engineNum;
            $this->status = $status;
        }

        function EditData(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // File Date and Time
            require_once("../helper/others/date-and-timeHF.php");
            
            // Class
            $classDataBaseConnection = new classDataBaseConnection();
            $classDateAndTime = new classDateAndTime();

            $timeNow = $classDateAndTime->timeNowF();
            $dateNNOW = date("Y-m-d");

            $cookie_name = "user";
            if(isset($_COOKIE[$cookie_name])) {
                $id = $_COOKIE[$cookie_name];

                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = $id");
                while($row = mysqli_fetch_assoc($fetch_data)){

                    $fullName = $row["u_last_name"] ."," . $row["u_middle_name"] ." " . $row["u_first_name"];
                    $action = "edit";
                    $page = "MANAGE MPUJ";

                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl WHERE mit_id = $this->dataId");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        
                        if($this->chasisNum != $row["mit_chassis_num"] && $this->engineNum != $row["mit_engine"] && $this->plateNum != $row["mit_plate_num"] && $this->mpujNum != $row["mit_mpuj_num"] && $this->status != $row["mit_status"]){
                            $description = $fullName . " change data of |Chasis No. = ". $row["mit_chassis_num"] . " to " . $this->chasisNum . "| and Engine No. = " . $row["mit_engine"] . " to " . $this->engineNum . "| and Plate No. = " . $row["mit_plate_num"] . " to " . $this->plateNum . "| and Mpuj No. = " . $row["mit_mpuj_num"] . " to " . $this->mpujNum . "| and Status = " . $row["mit_status"] . " to " . $this->status ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->chasisNum != $row["mit_chassis_num"] && $this->engineNum != $row["mit_engine"] && $this->plateNum != $row["mit_plate_num"] && $this->mpujNum != $row["mit_mpuj_num"]){
                            $description = $fullName . " change data of |Chasis No. = ". $row["mit_chassis_num"] . " to " . $this->chasisNum . "| and Engine No. = " . $row["mit_engine"] . " to " . $this->engineNum . "| and Plate No. = " . $row["mit_plate_num"] . " to " . $this->plateNum . "| and Mpuj No. = " . $row["mit_mpuj_num"] . " to " . $this->mpujNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->chasisNum != $row["mit_chassis_num"] && $this->engineNum != $row["mit_engine"] && $this->plateNum != $row["mit_plate_num"]){
                            $description = $fullName . " change data of |Chasis No. = ". $row["mit_chassis_num"] . " to " . $this->chasisNum . "| and Engine No. = " . $row["mit_engine"] . " to " . $this->engineNum . "| and Plate No. = " . $row["mit_plate_num"] . " to " . $this->plateNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->chasisNum != $row["mit_chassis_num"] && $this->engineNum != $row["mit_engine"]){
                            $description = $fullName . " change data of |Chasis No. = ". $row["mit_chassis_num"] . " to " . $this->chasisNum . "| and Engine No. = " . $row["mit_engine"] . " to " . $this->engineNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->chasisNum != $row["mit_chassis_num"] && $this->status != $row["mit_status"]){
                            $description = $fullName . " change data of |Chasis No. = ". $row["mit_chassis_num"] . " to " . $this->chasisNum . "| and Status = " . $row["mit_status"] . " to " . $this->status ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->chasisNum != $row["mit_chassis_num"] && $this->mpujNum != $row["mit_mpuj_num"]){
                            $description = $fullName . " change data of |Chasis No. = ". $row["mit_chassis_num"] . " to " . $this->chasisNum . "| and Mpuj No. = " . $row["mit_mpuj_num"] . " to " . $this->mpujNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->chasisNum != $row["mit_chassis_num"] && $this->plateNum != $row["mit_plate_num"]){
                            $description = $fullName . " change data of |Chasis No. = ". $row["mit_chassis_num"] . " to " . $this->chasisNum . "| and Plate No. = " . $row["mit_plate_num"] . " to " . $this->plateNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->engineNum != $row["mit_engine"] && $this->plateNum != $row["mit_plate_num"] && $this->mpujNum != $row["mit_mpuj_num"] && $this->status != $row["mit_status"]){
                            $description = $fullName . " change data of |Engine No. = " . $row["mit_engine"] . " to " . $this->engineNum . "| and Plate No. = " . $row["mit_plate_num"] . " to " . $this->plateNum . "| and Mpuj No. = " . $row["mit_mpuj_num"] . " to " . $this->mpujNum . "| and Status = " . $row["mit_status"] . " to " . $this->status ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->engineNum != $row["mit_engine"] && $this->plateNum != $row["mit_plate_num"] && $this->mpujNum != $row["mit_mpuj_num"]){
                            $description = $fullName . " change data of |Engine No. = " . $row["mit_engine"] . " to " . $this->engineNum . "| and Plate No. = " . $row["mit_plate_num"] . " to " . $this->plateNum . "| and Mpuj No. = " . $row["mit_mpuj_num"] . " to " . $this->mpujNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->engineNum != $row["mit_engine"] && $this->plateNum != $row["mit_plate_num"]){
                            $description = $fullName . " change data of |Engine No. = " . $row["mit_engine"] . " to " . $this->engineNum . "| and Plate No. = " . $row["mit_plate_num"] . " to " . $this->plateNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->engineNum != $row["mit_engine"] && $this->status != $row["mit_status"]){
                            $description = $fullName . " change data of |Engine No. = " . $row["mit_engine"] . " to " . $this->engineNum . "| and Status = " . $row["mit_status"] . " to " . $this->status ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->engineNum != $row["mit_engine"] && $this->mpujNum != $row["mit_mpuj_num"]){
                            $description = $fullName . " change data of |Engine No. = " . $row["mit_engine"] . " to " . $this->engineNum . "| and Mpuj No. = " . $row["mit_mpuj_num"] . " to " . $this->mpujNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNum != $row["mit_plate_num"] && $this->mpujNum != $row["mit_mpuj_num"] && $this->status != $row["mit_status"]){
                            $description = $fullName . " change data of |Plate No. = " . $row["mit_plate_num"] . " to " . $this->plateNum . "| and Mpuj No. = " . $row["mit_mpuj_num"] . " to " . $this->mpujNum . "| and Status = " . $row["mit_status"] . " to " . $this->status ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNum != $row["mit_plate_num"] && $this->mpujNum != $row["mit_mpuj_num"]){
                            $description = $fullName . " change data of |Plate No. = " . $row["mit_plate_num"] . " to " . $this->plateNum . "| and Mpuj No. = " . $row["mit_mpuj_num"] . " to " . $this->mpujNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->mpujNum != $row["mit_mpuj_num"] && $this->status != $row["mit_status"]){
                            $description = $fullName . " change data of |Mpuj No. = " . $row["mit_mpuj_num"] . " to " . $this->mpujNum . "| and Status = " . $row["mit_status"] . " to " . $this->status ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->status != $row["mit_status"]){
                            $description = $fullName . " change data of |Status = " . $row["mit_status"] . " to " . $this->status ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->mpujNum != $row["mit_mpuj_num"]){
                            $description = $fullName . " change data of |Mpuj No. = " . $row["mit_mpuj_num"] . " to " . $this->mpujNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->plateNum != $row["mit_plate_num"]){
                            $description = $fullName . " change data of |Plate No. = " . $row["mit_plate_num"] . " to " . $this->plateNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->engineNum != $row["mit_engine"]){
                            $description = $fullName . " change data of |Engine No. = " . $row["mit_engine"] . " to " . $this->engineNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->chasisNum != $row["mit_chassis_num"]){
                            $description = $fullName . " change data of |Chasis No. = ". $row["mit_chassis_num"] . " to " . $this->chasisNum ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE mpuj_info_tbl SET mit_chassis_num = '$this->chasisNum', mit_engine='$this->engineNum', mit_plate_num = '$this->plateNum', mit_mpuj_num = '$this->mpujNum', mit_status='$this->status' WHERE mit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>