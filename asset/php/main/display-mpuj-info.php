<?php
    $classDisplayMpujInfo = new classDisplayMpujInfo();
    $classDisplayMpujInfo->displayMpujInfo();

    class classDisplayMpujInfo{
        function displayMpujInfo(){
            // File Connection Database
            // require_once("./asset/php/helper/database-connection/connectionHF.php");
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl ORDER BY mit_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){
                $db_mit_id = $row["mit_id"];
                $db_mit_engine = $row["mit_engine"];
                $db_mit_chassis_num = $row["mit_chassis_num"];
                $db_mit_plate_num = $row["mit_plate_num"];
                $db_mit_mpuj_num = $row["mit_mpuj_num"];
                $db_mit_status = $row["mit_status"];
                $db_mit_time = $row["mit_time"];
                $db_mit_date = $row["mit_date"];

                echo'
                    <tr>
                        <td>' . $db_mit_chassis_num .'</td>
                        <td>' . $db_mit_engine .'</td>
                        <td>' . $db_mit_plate_num .'</td>
                        <td>' . $db_mit_mpuj_num .'</td>
                        <td>' . $db_mit_status .'</td>
                        <td>' . $db_mit_time .'</td>
                        <td>' . $db_mit_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_mit_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_mit_id .'></i>
                        </td>
                    </tr>
                ';
            }
        }
    }
?>