<?php
    class classDisplayBirthDayToday{
        function displayBirthDayToday(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            $dayNow = date('j');
            $yearNow = date('Y');
            $monthNow = date('m');

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_birth_month ='$monthNow' ");
            while($row = mysqli_fetch_assoc($fetch_data)){

                // $remainDays =  $expDayNum - $dayNow;

                $db_sit_surname = $row["sit_surname"];
                $db_sit_middlename = $row["sit_middlename"];
                $db_sit_firstname = $row["sit_firstname"];
                $sit_birthdate = $row["sit_birthdate"];

                // Explode Birth Date
                $licenseExp = $sit_birthdate;
                $exp = explode('-', $licenseExp);
                $expMonthNum = $exp[0];
                $expDayNum = $exp[1];
                $expYearNum = $exp[2];

                // Creates DateTime objects
                $datetime1 = date_create($yearNow .'-' . $monthNow . '-' . $dayNow);
                $datetime2 = date_create($expYearNum .'-' . $expMonthNum . '-' . $expDayNum);
                // Calculates the difference between DateTime objects
                $interval = date_diff($datetime1, $datetime2);
                // Printing result in years & months format
                $dayResutl = $interval->format('%a');
                
                echo'
                    <div class="yot-bg-sea-of-tears yot-tc-white yot-pa-16 yot-mb-8" style="border-radius: 8px;">
                        <div class="yot-text-center">
                            <span class="yot-text-fs-xl">' . $db_sit_surname . " " .$db_sit_middlename . " " . $db_sit_firstname.'</span> <br>
                        </div>
                    </div>
                ';
            }
        }
    }
?>