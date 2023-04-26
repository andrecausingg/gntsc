<?php
    if(isset($_POST["dataId"]) && isset($_POST["roleName"]) && isset($_POST["lastName"]) && isset($_POST["middleName"]) && isset($_POST["firstName"]) && isset($_POST["birthMonth"]) && isset($_POST["birthDay"]) && isset($_POST["birthYear"]) && isset($_POST["birthPlace"]) && isset($_POST["gender"]) && isset($_POST["civilStatus"]) && isset($_POST["address"]) && isset($_POST["contactNumber"]) && isset($_POST["licenseNumber"]) && isset($_POST["licenseExpMon"]) && isset($_POST["licenseExpday"]) && isset($_POST["licenseExpYear"])){
        $classUpdatePuj = new classUpdatePuj($_POST["dataId"], $_POST["roleName"], $_POST["lastName"], $_POST["middleName"], $_POST["firstName"], $_POST["birthMonth"], $_POST["birthDay"], $_POST["birthYear"], $_POST["birthPlace"], $_POST["gender"], $_POST["civilStatus"], $_POST["address"], $_POST["contactNumber"], $_POST["licenseNumber"], $_POST["licenseExpMon"], $_POST["licenseExpday"], $_POST["licenseExpYear"]);
        $classUpdatePuj->updateDate();
        // echo $_POST["roleName"];
        // echo $_POST["lastName"];
        // echo $_POST["middleName"];
        // echo $_POST["firstName"];
        // echo $_POST["birthMonth"];
        // echo $_POST["birthDay"];
        // echo $_POST["birthYear"];
        // echo $_POST["birthPlace"];
        // echo $_POST["gender"];
        // echo $_POST["civilStatus"];
        // echo $_POST["address"];
        // echo $_POST["contactNumber"];
        // echo $_POST["licenseNumber"];
        // echo $_POST["licenseExpMon"];
        // echo $_POST["licenseExpday"];
        // echo $_POST["licenseExpYear"];
    }

    class classUpdatePuj{
        private $dataId;
        private $roleName;
        private $lastName;
        private $middleName;
        private $firstName;
        private $birthMonth;
        private $birthDay;
        private $birthYear;
        private $birthPlace;
        private $gender;
        private $civilStatus;
        private $address;
        private $contactNumber;
        private $licenseNumber;
        private $licenseExpMon;
        private $licenseExpday;
        private $licenseExpYear;

        // Methods
        function __construct($dataId, $roleName, $lastName, $middleName, $firstName, $birthMonth, $birthDay, $birthYear, $birthPlace, $gender, $civilStatus, $address, $contactNumber, $licenseNumber, $licenseExpMon, $licenseExpday, $licenseExpYear){
            $this->dataId = $dataId;
            $this->roleName = $roleName;
            $this->lastName = $lastName;
            $this->middleName = $middleName;
            $this->firstName = $firstName;
            $this->birthMonth = $birthMonth;
            $this->birthDay = $birthDay;
            $this->birthYear = $birthYear;
            $this->birthPlace = $birthPlace;
            $this->gender = $gender;
            $this->civilStatus = $civilStatus;
            $this->address = $address;
            $this->contactNumber = $contactNumber;
            $this->licenseNumber = $licenseNumber;
            $this->licenseExpMon = $licenseExpMon;
            $this->licenseExpday = $licenseExpday;
            $this->licenseExpYear = $licenseExpYear;
        }

        function updateDate(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // File Date and Time
            require_once("../helper/others/date-and-timeHF.php");
            
            // Class
            $classDataBaseConnection = new classDataBaseConnection();
            $classDateAndTime = new classDateAndTime();

            // Variables
            $birthdate = $this->birthMonth ."-" . $this->birthDay . "-" . $this->birthYear;
            $licenseExp =  $this->licenseExpMon ."-" . $this->licenseExpday ."-" . $this->licenseExpYear;
            $timeNow = $classDateAndTime->timeNowF();

            // Update Code
            // $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_month = '$this->birthMonth', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
            // if($query_update){
            //     echo "Success Update";
            // }

            $dateNNOW = date("Y-m-d");
            
            $cookie_name = "user";
            if(isset($_COOKIE[$cookie_name])) {
                $id = $_COOKIE[$cookie_name];

                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = $id");
                while($row = mysqli_fetch_assoc($fetch_data)){

                    $fullName = $row["u_last_name"] ."," . $row["u_middle_name"] ." " . $row["u_first_name"];
                    $action = "edit";
                    $page = "MANAGE MPUJ DRIVER";

                    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_id = $this->dataId");
                    while($row = mysqli_fetch_assoc($fetch_data)){
                        
                        if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"]){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->licenseNumber != $row["sit_license"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->address != $row["sit_address"]){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->civilStatus != $row["sit_civil_status"] ){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->birthYear != $row["sit_birth_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->birthDay != $row["sit_birth_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->birthMonth != $row["sit_birth_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->firstName != $row["sit_firstname"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"] && $this->middleName != $row["sit_middlename"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            . "| and |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }
                        
                        else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->firstName != $row["sit_firstname"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->birthYear != $row["sit_birth_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->birthDay != $row["sit_birth_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"] && $this->birthMonth != $row["sit_birth_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }
                        
                        else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] 
                            && $this->birthMonth != $row["sit_birth_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->licenseNumber != $row["sit_license"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->civilStatus != $row["sit_civil_status"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->gender != $row["sit_gender"]){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->birthYear != $row["sit_birth_year"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->birthDay != $row["sit_birth_day"]){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"] && $this->birthMonth != $row["sit_birth_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName 
                            . "| and |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }
                        
                        else if($this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]  && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]  && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]  && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthDay != $row["sit_birth_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"] && $this->birthYear != $row["sit_birth_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }
                        
                        else if($this->birthDay != $row["sit_birth_day"] && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"]  && $this->birthYear != $row["sit_birth_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"]){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"] && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }

                        else if($this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] 
                            && $this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            . "| and |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }

                        else if($this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear  
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear  
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }

                        else if($this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear  
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                            }else if($this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"] && $this->civilStatus != $row["sit_civil_status"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear  
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }

                        else if($this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] 
                            && $this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Address = " . $row["sit_address"] . " to " . $this->address 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";

                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }

                        else if($this->address != $row["sit_address"] 
                            && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->address != $row["sit_address"] 
                            && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->address != $row["sit_address"] 
                            && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->address != $row["sit_address"] 
                            && $this->contactNumber != $row["sit_contact_num"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->address != $row["sit_address"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->address != $row["sit_address"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->address != $row["sit_address"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->address != $row["sit_address"] && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->address != $row["sit_address"] && $this->contactNumber != $row["sit_contact_num"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Address = " . $row["sit_address"] . " to " . $this->address 
                            . "| and |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }
                        
                        else if($this->contactNumber != $row["sit_contact_num"] 
                            && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->contactNumber != $row["sit_contact_num"] 
                            && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->contactNumber != $row["sit_contact_num"] 
                            && $this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->contactNumber != $row["sit_contact_num"] 
                            && $this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->contactNumber != $row["sit_contact_num"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->contactNumber != $row["sit_contact_num"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->contactNumber != $row["sit_contact_num"] && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }

                        else if($this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->licenseNumber != $row["sit_license"] 
                            && $this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->licenseNumber != $row["sit_license"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->licenseNumber != $row["sit_license"] && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }

                        else if($this->licenseExpMon != $row["sit_exp_license_month"] 
                            && $this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->licenseExpMon != $row["sit_exp_license_month"] 
                            && $this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->licenseExpMon != $row["sit_exp_license_month"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }

                        else if($this->licenseExpday != $row["sit_exp_license_day"] && $this->licenseExpYear != $row["sit_exp_license_year"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday 
                            . "| and |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }

                        else if($this->licenseExpYear != $row["sit_exp_license_year"]){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Expire License Year = " . $row["sit_exp_license_year"] . " to " . $this->licenseExpYear ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->licenseExpday != $row["sit_exp_license_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Expire License Day = " . $row["sit_exp_license_day"] . " to " . $this->licenseExpday ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->licenseExpMon != $row["sit_exp_license_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Expire License Month = " . $row["sit_exp_license_month"] . " to " . $this->licenseExpMon ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->licenseNumber != $row["sit_license"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |License Number = " . $row["sit_license"] . " to " . $this->licenseNumber ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->contactNumber != $row["sit_contact_num"]){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Contact Number = " . $row["sit_contact_num"] . " to " . $this->contactNumber."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->address != $row["sit_address"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Address = " . $row["sit_address"] . " to " . $this->address ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->civilStatus != $row["sit_civil_status"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Civil Status = " . $row["sit_civil_status"] . " to " . $this->civilStatus ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->gender != $row["sit_gender"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Gender = " . $row["sit_gender"] . " to " . $this->gender ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthPlace != $row["sit_birthplace"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Place = " . $row["sit_birthplace"] . " to " . $this->birthPlace ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthYear != $row["sit_birth_year"] ){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Year = " . $row["sit_birth_year"] . " to " . $this->birthYear 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthDay != $row["sit_birth_day"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Day = " . $row["sit_birth_day"] . " to " . $this->birthDay ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->birthMonth != $row["sit_birth_month"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Birth Month. = " . $row["sit_birth_month"] . " to " . $this->birthMonth 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->firstName != $row["sit_firstname"]){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |First Name = " . $row["sit_firstname"] . " to " . $this->firstName ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){  
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"]){

                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->middleName != $row["sit_middlename"]){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Middle Name = " . $row["sit_middlename"] . " to " . $this->middleName ."| on";
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }else if($this->lastName != $row["sit_surname"]){
                            $description = "|ROLE = $this->roleName |" . $fullName . " change data of |Last Name = ". $row["sit_surname"] . " to " . $this->lastName 
                            ."| on";
                            
                            $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                            if($query_insert){
                                // Update Code
                                $query_update = mysqli_query($classDataBaseConnection->connect(),"UPDATE staff_info_tbl SET sit_role_name = '$this->roleName', sit_surname = '$this->lastName', sit_middlename =  '$this->middleName', sit_firstname = '$this->firstName', sit_birthdate = '$birthdate', sit_birth_day='$this->birthDay', sit_birth_month = '$this->birthMonth', sit_birth_year = '$this->birthYear', sit_birthplace = '$this->birthPlace', sit_gender = '$this->gender', sit_civil_status = '$this->civilStatus', sit_address = '$this->address', sit_contact_num = '$this->contactNumber', sit_license = '$this->licenseNumber', sit_license_expiredate = '$licenseExp', sit_exp_license_month = '$this->licenseExpMon', sit_exp_license_day = '$this->licenseExpday', sit_exp_license_year = '$this->licenseExpYear' WHERE sit_id ='$this->dataId'");
                                if($query_update){
                                    echo "Success Update";
                                }
                            }
                        }

                    } // End of while ope
                } // end of while user account
            } // end of cookies
        }
    }
?>