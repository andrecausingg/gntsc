<?php
    class classCount{
        function displayStaffNum(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            $count_masters = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl");
            $rowcount = mysqli_num_rows($count_masters);
            printf("%d\n", $rowcount);
        }

        function displayPuj(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            $count_masters = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name='PUJ'");
            $rowcount = mysqli_num_rows($count_masters);
            printf("%d\n", $rowcount);
        }

        function displayPao(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            $count_masters = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name='PAO'");
            $rowcount = mysqli_num_rows($count_masters);
            printf("%d\n", $rowcount);
        }

        function displayIns(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            $count_masters = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name='STA'");
            $rowcount = mysqli_num_rows($count_masters);
            printf("%d\n", $rowcount);
        }

        function displayOpe(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            $count_masters = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name='OPE'");
            $rowcount = mysqli_num_rows($count_masters);
            printf("%d\n", $rowcount);
        }

        function displayAccountNum(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            $count_masters = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl");
            $rowcount = mysqli_num_rows($count_masters);
            printf("%d\n", $rowcount);
        }

        function displayMpujNum(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            $count_masters = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl");
            $rowcount = mysqli_num_rows($count_masters);
            printf("%d\n", $rowcount);
        }

        function displayTradNum(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            $count_masters = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM tradjeep_info_tbl");
            $rowcount = mysqli_num_rows($count_masters);
            printf("%d\n", $rowcount);
        }
    }
?>