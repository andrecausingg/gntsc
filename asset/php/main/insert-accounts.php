<?php
    if(isset($_POST["lastName"]) && isset($_POST["middleName"]) && isset($_POST["firstName"]) && isset($_POST["username"]) && isset($_POST["password"])){
        $classInsertAcc = new classInsertAcc($_POST["lastName"], $_POST["middleName"], $_POST["firstName"], $_POST["username"], $_POST["password"]);
        $classInsertAcc->insertData();
    }

    class classInsertAcc{
        private $lastName;
        private $middleName;
        private $firstName;
        private $username;
        private $password;

        // Methods
        function __construct($lastName, $middleName, $firstName, $username, $password){
            $this->lastName = $lastName;
            $this->middleName = $middleName;
            $this->firstName = $firstName;
            $this->username = $username;
            $this->password = $password;
        }

        function insertData(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // File Date and Time
            require_once("../helper/others/date-and-timeHF.php");

            // require_once("login.php");

            // require_once("../helper/user-session/user-sessionHF.php");
            
            // Class
            $classDataBaseConnection = new classDataBaseConnection();
            $classDateAndTime = new classDateAndTime();
            // $classUserSession = new classUserSession();

            $timeNow = $classDateAndTime->timeNowF();
            $dateNow = $classDateAndTime->dateNowF();
            // $id = $classUserSession->$userSession();

            $dateNNOW = date("Y-m-d");
            $cookie_name = "user";

            if(isset($_COOKIE[$cookie_name])) {
                $id = $_COOKIE[$cookie_name];

                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl WHERE u_id = $id");
                while($row = mysqli_fetch_assoc($fetch_data)){

                    $fullName = $row["u_last_name"] ."," . $row["u_middle_name"] ." " . $row["u_first_name"];
                    $action = "create";
                    $description = $fullName . " add data of |Full Name = ". $this->lastName . "," . $this->middleName ." " . $this->firstName . "| |username = " .$this->username . "| |password = ". $this->password ."| on";
                    $page = "MANAGE USER";

                    $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO log_tbl (lt_user_full_name, lt_action, lt_description, lt_page, lt_time, lt_date) VALUES ('$fullName', '$action', '$description', '$page', '$timeNow', '$dateNNOW')");
                    if($query_insert){
                        $query_insert = mysqli_query($classDataBaseConnection->connect(),"INSERT INTO user_tbl (u_last_name, u_middle_name, u_first_name, u_username, u_password, u_time, u_date, u_datee) VALUES ('$this->lastName', '$this->middleName', '$this->firstName', '$this->username', '$this->password', '$timeNow', '$dateNow', '$dateNNOW')");
                    
                        if($query_insert){
                            echo "Success Insert";
                        }
                    }
                }
            }
        }
    }
?>