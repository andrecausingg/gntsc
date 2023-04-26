<?php
    class classDisplayAttendance{
        function displayAttendance(){
            // File Connection Database
            require_once("./asset/php/helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM attendance_tbl ORDER BY at_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_at_id = $row["at_id"];
                $db_at_drivers_fullname = $row["at_drivers_fullname"];
                $db_at_pao_fullname = $row["at_pao_fullname"];
                $db_at_time_in = $row["at_time_in"];
                $db_at_time_out = $row["at_time_out"];

                echo'
                    <tbody>
                        <tr>
                            <td>' . $db_at_id .'</td>
                            <td>' . $db_at_drivers_fullname .'</td>
                            <td>' . $db_at_pao_fullname .'</td>
                            <td>' . $db_at_time_in .'</td>
                            <td>' . $db_at_time_out .'</td>
                        </tr>
                    </tbody>
                ';
            }
        }
    }
?>