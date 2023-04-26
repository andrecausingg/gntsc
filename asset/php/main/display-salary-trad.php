<?php
    $classDisplaySalary = new classDisplaySalary();
    $classDisplaySalary->displaySalary();

    class classDisplaySalary{
        function displaySalary(){
            // File Connection Database
            // require_once("./asset/php/helper/database-connection/connectionHF.php");
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM tradjeep_payroll_tbl ORDER BY tpt_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){

                echo'
                    <tr>
                        <td>' . $row["tpt_drivers_name"] .'</td>
                        <td>' . $row["tpt_plate_num"] .'</td>
                        <td>' . $row["tpt_daily_butaw"] .'</td>
                        <td>' . $row["tpt_savings"] .'</td>
                        <td>' . $row["tpt_terminal_fee"] .'</td>
                        <td>' . $row["tpt_monthly_butaw"] .'</td>
                        <td>' . $row["tpt_membership"] .'</td>
                        <td>' . $row["tpt_others"] .'</td>
                        <td>' . $row["tpt_remarks"] .'</td>
                        <td>' . $row["tpt_time"] .'</td>
                        <td>' . $row["tpt_date"] .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["tpt_id"] .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["tpt_id"] .'></i>
                        </td>
                    </tr>
                ';
            }
        }
    }
?>