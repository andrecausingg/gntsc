<?php 
    class classDataBaseConnection{
        // Properties
        private $serverName = "localhost";
        private $dbName = "gntsc_db";
        private $userName = "root";
        private $password = "";
        
        // Methods
        public function connect(){
            $connection = mysqli_connect($this->serverName,$this->userName,$this->password,$this->dbName);
            if(mysqli_connect_errno()){
                echo "FAILED TO CONNECT TO MYSQL: " . mysqli_connect_error();
            }
            return $connection;
        }
    }
?>
