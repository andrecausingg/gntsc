<?php
    $classDisplayAccounts = new classDisplayAccounts();
    $classDisplayAccounts->displayAccounts();

    class classDisplayAccounts{
        function displayAccounts(){
            // File Connection Database
            // require_once("./asset/php/helper/database-connection/connectionHF.php");
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM user_tbl ORDER BY u_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){

                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                $db_u_username = $row["u_username"];
                $db_u_password = $row["u_password"];
                $db_u_time = $row["u_time"];
                $db_u_date = $row["u_date"];

                $password = str_repeat("*", strlen($db_u_password)); 

                echo'
                    <tr>
                        <td>' . $db_u_last_name .", " . $db_u_middle_name . " " . $db_u_first_name .'</td>
                        <td>' . $db_u_username .'</td>
                        <td>' . $password .'</td>
                        <td>' . $db_u_time .'</td>
                        <td>' . $db_u_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_u_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_u_id .'></i>
                        </td>
                    </tr>
                ';
            }
        }
    }
?>