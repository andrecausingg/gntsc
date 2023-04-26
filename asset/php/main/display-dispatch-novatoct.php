<?php
    $classDisplayDispatch = new classDisplayDispatch();
    $classDisplayDispatch->displayDispatchNovatoCt();

    class classDisplayDispatch{
        function displayDispatchNovatoCt(){
            // File Connection Database
            // require_once("./asset/php/helper/database-connection/connectionHF.php");
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM dispatch_tbl WHERE dt_route = 2 ORDER BY dt_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_dt_id = $row["dt_id"];
                $db_dt_driver_full_name = $row["dt_driver_full_name"];
                $db_dt_pao_full_name = $row["dt_pao_full_name"];
                $db_dt_mpuj_num = $row["dt_mpuj_num"];
                $db_dt_plate_num = $row["dt_plate_num"];
                // $db_dt_destination = $row["dt_destination"];
                $db_dt_time_of_departure = $row["dt_time_of_departure"];
                $db_dt_expected_arrival = $row["dt_expected_arrival"];

                echo'
                    <tr>
                        <td>' . $db_dt_driver_full_name .'</td>
                        <td>' . $db_dt_pao_full_name .'</td>
                        <td>' . $db_dt_mpuj_num .'</td>
                        <td>' . $db_dt_plate_num .'</td>
                        <td>' . $db_dt_time_of_departure .'</td>
                        <td>' . $db_dt_expected_arrival .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_dt_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_dt_id .'></i>
                        </td>
                    </tr>
                ';
            }
        }
    }
?>