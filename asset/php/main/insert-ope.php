<?php
    if(isset($_POST["roleName"]) && isset($_POST["lastName"]) && isset($_POST["middleName"]) && isset($_POST["firstName"]) && isset($_POST["birthMonth"]) && isset($_POST["birthDay"]) && isset($_POST["birthYear"]) && isset($_POST["birthPlace"]) && isset($_POST["gender"]) && isset($_POST["civilStatus"]) && isset($_POST["address"]) && isset($_POST["contactNumber"]) && isset($_POST["plateNum"])){
        $classInsertIns = new classInsertIns($_POST["roleName"], $_POST["lastName"], $_POST["middleName"], $_POST["firstName"], $_POST["birthMonth"], $_POST["birthDay"], $_POST["birthYear"], $_POST["birthPlace"], $_POST["gender"], $_POST["civilStatus"], $_POST["address"], $_POST["contactNumber"], $_POST["plateNum"]);
        $classInsertIns->insertData();

    }

    class classInsertIns{
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
        private $plateNum;

        // Methods
        function __construct($roleName, $lastName, $middleName, $firstName, $birthMonth, $birthDay, $birthYear, $birthPlace, $gender, $civilStatus, $address, $contactNumber, $plateNum){
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
            $this->plateNum = $plateNum;
        }

        function insertData(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // File Date and Time
            require_once("../helper/others/date-and-timeHF.php");
            
            // Class
            $classDataBaseConnection = new classDataBaseConnection();
            $classDateAndTime = new classDateAndTime();

            // Variables
            $birthdate = $this->birthMonth ."-" . $this->birthDay . "-" . $this->birthYear;
            $timeNow = $classDateAndTime->timeNowF();
            $dateNow = $classDateAndTime->dateNowF();

            $dateNNOW = date("Y-m-d");

            $cookie_name = "user";
            if(isset($_COOKIE[$cookie_name])) {
                $id = $_COOKIE[$cookie_name];

                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = $id");
                while($row = mysqli_fetch_assoc($fetch_data)){

                    $fullNameInsert = $this->lastName . "," . $this->middleName  ." ". $this->firstName;
                    $fullName = $row["u_last_name"] ."," . $row["u_middle_name"] ." " . $row["u_first_name"];
                    $action = "create";
                    $page = "MANAGE MPUJ OPERATORS";
                    $description = $fullName . " add data of |Role = ". $this->roleName . "| |Full Name = " .$fullNameInsert . "| |Plate No. = ". $this->plateNum . "| |Address = ". $this->address . "| |Contact No. = ". $this->contactNumber . "| |Birth Date (M/D/Y) = ". $birthdate . "| |Birth Place = ". $this->birthPlace . "| |Gender = ". $this->gender . "| |Civil Status = ". $this->civilStatus ."| on";
                    
                    $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                    if($query_insert){
                        // Insert Code
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO staff_info_tbl (sit_role_name, sit_plate_num, sit_surname, sit_middlename, sit_firstname, sit_birthdate, sit_birth_day, sit_birth_month, sit_birth_year, sit_birthplace, sit_gender, sit_civil_status, sit_address, sit_contact_num, sit_time, sit_date, sit_datee) VALUES ('$this->roleName', '$this->plateNum', '$this->lastName', '$this->middleName', '$this->firstName', '$birthdate', '$this->birthDay', '$this->birthMonth', '$this->birthYear', '$this->birthPlace', '$this->gender', '$this->civilStatus', '$this->address', '$this->contactNumber', '$timeNow', '$dateNow', '$dateNNOW')");
                    
                        if($query_insert){
                            echo "Success Insert";
                        }
                    }
                }
            }
        }
    }
?>