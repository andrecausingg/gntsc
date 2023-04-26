<?php
    $classDisplayTradInfo = new classDisplayTradInfo();
    $classDisplayTradInfo->displayTradInfo();

    class classDisplayTradInfo{
        function displayTradInfo(){
            // File Connection Database
            require_once("../helper/database-connection/connectionHF.php");
            // require_once("./asset/php/helper/database-connection/connectionHF.php");
            
            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM tradjeep_info_tbl ORDER BY tjt_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_tjt_id = $row["tjt_id"];
                $db_tjt_plate_num = $row["tjt_plate_num"];
                $db_tjt_time = $row["tjt_time"];
                $db_tjt_date = $row["tjt_date"];

                echo'
                    <tr>
                        <td>' . $db_tjt_plate_num .'</td>
                        <td>' . $db_tjt_time .'</td>
                        <td>' . $db_tjt_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_tjt_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_tjt_id .'></i>
                        </td>
                    </tr>
                ';
            }
        }
    }
?>