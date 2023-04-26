<?php
    class classDisplayPujPao{

        function displayPuj(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            echo'
                <option value="">- Select Driver -</option>
            ';

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name = 'PUJ' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_sit_surname = $row["sit_surname"];
                $db_sit_middlename = $row["sit_middlename"];
                $db_sit_firstname = $row["sit_firstname"];

                echo'
                    <option value="'. $db_sit_surname . ", " . $db_sit_middlename . " " . $db_sit_firstname .'">' . $db_sit_surname . ", " . $db_sit_middlename  . " ". $db_sit_firstname .'</option>
                ';
            }
        }

        function displayPao(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            
            echo'
                <option value="">- Select Pao -</option>
            ';

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name = 'PAO' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_sit_surname = $row["sit_surname"];
                $db_sit_middlename = $row["sit_middlename"];
                $db_sit_firstname = $row["sit_firstname"];

                echo'
                    <option value="'. $db_sit_surname . ", " . $db_sit_middlename . " " . $db_sit_firstname .'">' . $db_sit_surname . ", " . $db_sit_middlename  . " ". $db_sit_firstname .'</option>
                ';
            }
        }

        function displayTra(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            echo'
                <option value="">- Select Driver -</option>
            ';

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name = 'TRA' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_sit_surname = $row["sit_surname"];
                $db_sit_middlename = $row["sit_middlename"];
                $db_sit_firstname = $row["sit_firstname"];

                echo'
                    <option value="'. $db_sit_surname . ", " . $db_sit_middlename . " " . $db_sit_firstname .'">' . $db_sit_surname . ", " . $db_sit_middlename  . " ". $db_sit_firstname .'</option>
                ';
            }
        }

        function displaySta(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            echo'
                <option value="">- Select Driver -</option>
            ';

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name = 'STA' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_sit_surname = $row["sit_surname"];
                $db_sit_middlename = $row["sit_middlename"];
                $db_sit_firstname = $row["sit_firstname"];

                echo'
                    <option value="'. $db_sit_surname . ", " . $db_sit_middlename . " " . $db_sit_firstname .'">' . $db_sit_surname . ", " . $db_sit_middlename  . " ". $db_sit_firstname .'</option>
                ';
            }
        }

        function displayPujNameOnly(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name = 'PUJ' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_sit_firstname = $row["sit_firstname"];
                $db_sit_license_expiredate = $row["sit_license_expiredate"];

                // Date
                $dayNow = date('j');
                $yearNow = date('Y');
                $monthNow = date('m');

                // Explode License Date
                $licenseExp = $db_sit_license_expiredate;
                $exp = explode('-', $licenseExp);
                $expMonthNum = $exp[0];
                $expDayNum = $exp[1];
                $expYearNum = $exp[2];

                // Creates DateTime objects
                $datetime1 = date_create($yearNow .'-' . $monthNow . '-' . $dayNow);
                $datetime2 = date_create($expYearNum .'-' . $expMonthNum . '-' . $expDayNum);
                // Calculates the difference between DateTime objects
                $interval = date_diff($datetime1, $datetime2);
                
                if($datetime2 > $datetime1){
                    echo'
                        <option value="'. $db_sit_firstname .'">' . $db_sit_firstname .'</option>
                    ';
                }
            }
        }

        function displayPaoNameOnly(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name = 'PAO' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_sit_firstname = $row["sit_firstname"];

                echo'
                    <option value="'. $db_sit_firstname .'">' . $db_sit_firstname .'</option>
                ';
            }
        }
    }
?>