<?php
    if(isset($_POST["dataId"]) && isset($_POST["lastName"]) && isset($_POST["middleName"]) && isset($_POST["firstName"]) && isset($_POST["username"]) && isset($_POST["password"])){
        $classUpdateAccount = new classUpdateAccount($_POST["dataId"], $_POST["lastName"], $_POST["middleName"], $_POST["firstName"], $_POST["username"], $_POST["password"]);
        $classUpdateAccount->updateDate();

    }

    class classUpdateAccount{
        private $dataId;
        private $lastName;
        private $middleName;
        private $firstName;
        private $username;
        private $password;

        // Methods
        function __construct($dataId, $lastName, $middleName, $firstName, $username, $password){
            $this->dataId = $dataId;
            $this->lastName = $lastName;
            $this->middleName = $middleName;
            $this->firstName = $firstName;
            $this->username = $username;
            $this->password = $password;
        }

        function updateDate(){
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
                    $page = "MANAGE USER";

                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = $this->dataId");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        
                        if($this->lastName != $row["u_last_name"] && $this->middleName != $row["u_middle_name"] && $this->firstName != $row["u_first_name"] && $this->username != $row["u_username"] && $this->password != $row["u_password"]){
                            $description = $fullName . " change data of |Last Name = ". $row["u_last_name"] . " to " . $this->lastName . "| and Middle Name = " . $row["u_middle_name"] . " to " . $this->middleName . "| and First Name = " . $row["u_first_name"] . " to " . $this->firstName . "| and User Name = " . $row["u_username"] . " to " . $this->username . "| and Password = " . $row["u_password"] . " to " . $this->password ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["u_last_name"] && $this->middleName != $row["u_middle_name"] && $this->firstName != $row["u_first_name"] && $this->username != $row["u_username"]){
                            $description = $fullName . " change data of |Last Name = ". $row["u_last_name"] . " to " . $this->lastName . "| and Middle Name = " . $row["u_middle_name"] . " to " . $this->middleName . "| and First Name = " . $row["u_first_name"] . " to " . $this->firstName . "| and User Name = " . $row["u_username"] . " to " . $this->username ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["u_last_name"] && $this->middleName != $row["u_middle_name"] && $this->firstName != $row["u_first_name"]){
                            $description = $fullName . " change data of |Last Name = ". $row["u_last_name"] . " to " . $this->lastName . "| and Middle Name = " . $row["u_middle_name"] . " to " . $this->firstName . "| and First Name = " . $row["u_first_name"] . " to " . $this->firstName ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["u_last_name"] && $this->middleName != $row["u_middle_name"]){
                            $description = $fullName . " change data of |Last Name = ". $row["u_last_name"] . " to " . $this->lastName . "| and Middle Name = " . $row["u_middle_name"] . " to " . $this->middleName ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["u_last_name"] && $this->password != $row["u_password"]){
                            $description = $fullName . " change data of |Last Name = ". $row["u_last_name"] . " to " . $this->lastName . "| and Password = " . $row["u_password"] . " to " . $this->password ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["u_last_name"] && $this->username != $row["u_username"]){
                            $description = $fullName . " change data of |Last Name = ". $row["u_last_name"] . " to " . $this->lastName . "| and User Name = " . $row["u_username"] . " to " . $this->username ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["u_last_name"] && $this->firstName != $row["u_first_name"]){
                            $description = $fullName . " change data of |Last Name = ". $row["u_last_name"] . " to " . $this->lastName . "| and First Name = " . $row["u_first_name"] . " to " . $this->firstName ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["u_middle_name"] && $this->firstName != $row["u_first_name"] && $this->username != $row["u_username"] && $this->password != $row["u_password"]){
                            $description = $fullName . " change data of |Middle Name = " . $row["u_middle_name"] . " to " . $this->middleName . "| and First Name = " . $row["u_first_name"] . " to " . $this->firstName . "| and User Name = " . $row["u_username"] . " to " . $this->username . "| and Password = " . $row["u_password"] . " to " . $this->password ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["u_middle_name"] && $this->firstName != $row["u_first_name"] && $this->username != $row["u_username"]){
                            $description = $fullName . " change data of |Middle Name = " . $row["u_middle_name"] . " to " . $this->middleName . "| and First Name = " . $row["u_first_name"] . " to " . $this->firstName . "| and User Name = " . $row["u_username"] . " to " . $this->username ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["u_middle_name"] && $this->firstName != $row["u_first_name"]){
                            $description = $fullName . " change data of |Middle Name = " . $row["u_middle_name"] . " to " . $this->middleName . "| and First Name = " . $row["u_first_name"] . " to " . $this->firstName ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["u_first_name"] && $this->username != $row["u_username"] && $this->password != $row["u_password"]){
                            $description = $fullName . " change data of |First Name = " . $row["u_first_name"] . " to " . $this->firstName . "| and User Name = " . $row["u_username"] . " to " . $this->username . "| and Password = " . $row["u_password"] . " to " . $this->password ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["u_first_name"] && $this->username != $row["u_username"]){
                            $description = $fullName . " change data of |First Name = " . $row["u_first_name"] . " to " . $this->firstName . "| and User Name = " . $row["u_username"] . " to " . $this->username ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->username != $row["u_username"] && $this->password != $row["u_password"]){
                            $description = $fullName . " change data of |User Name = " . $row["u_username"] . " to " . $this->username . "| and Password = " . $row["u_password"] . " to " . $this->password ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["u_last_name"]){
                            $description = $fullName . " change data of |Last Name = ". $row["u_last_name"] . " to " . $this->lastName ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["u_middle_name"]){
                            $description = $fullName . " change data of |Middle Name = ". $row["u_middle_name"] . " to " . $this->middleName ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["u_first_name"]){
                            $description = $fullName . " change data of |First Name = ". $row["u_first_name"] . " to " . $this->firstName ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->username != $row["u_username"]){
                            $description = $fullName . " change data of |User Name = ". $row["u_username"] . " to " . $this->username ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->password != $row["u_password"]){
                            $description = $fullName . " change data of |Password = ". $row["u_password"] . " to " . $this->password ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE user_tbl SET u_last_name = '$this->lastName', u_middle_name = '$this->middleName', u_first_name = '$this->firstName', u_username = '$this->username', u_password = '$this->password' WHERE u_id ='$this->dataId'");
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