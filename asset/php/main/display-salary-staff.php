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
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_payroll_tbl ORDER BY spt_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){

                echo'
                    <tr>
                        <td>' . $row["spt_fullname"] .'</td>
                        <td>' . $row["spt_num_days"] .'</td>
                        <td>' . $row["spt_rate"] .'</td>
                        <td>' . $row["spt_amount"] .'</td>
                        <td>' . $row["spt_time"] .'</td>
                        <td>' . $row["spt_date"] .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["spt_id"] .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["spt_id"] .'></i>
                        </td>
                    </tr>
                ';
            }
        }
    }
?>