<?php
    class classDisplayMpujNumPlateNum{

        function displayMpujNum(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_mit_mpuj_num = $row["mit_mpuj_num"];

                echo'
                    <option value="'. $db_mit_mpuj_num .'">' . $db_mit_mpuj_num .'</option>
                ';
            }
        }

        function displayPlateNum(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_mit_plate_num = $row["mit_plate_num"];

                echo'
                    <option value="'. $db_mit_plate_num .'">' . $db_mit_plate_num .'</option>
                ';
            }
        }
    }
?>