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
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM salary_mpuj_report ORDER BY smr_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){

                echo'
                    <tr>
                        <td>' . $row['smr_pao_fullname'] .'</td>
                        <td>' . $row['smr_driver_fullname'] .'</td>
                        <td>' . $row['smr_rounds_one'] .'</td>
                        <td>' . $row['smr_rounds_two'] .'</td>
                        <td>' . $row['smr_rounds_three'] .'</td>
                        <td>' . $row['smr_rounds_four'] .'</td>
                        <td>' . $row['smr_rounds_five'] .'</td>
                        <td>' . $row['smr_rounds_six'] .'</td>
                        <td>' . $row['smr_total_cash'] .'</td>
                        <td>' . $row['smr_expenses'] .'</td>
                        <td>' . $row['smr_handheld'] .'</td>
                        <td>' . $row['smr_boundery'] .'</td>
                        <td>' . $row['smr_diesel'] .'</td>
                        <td>' . $row['smr_amount'] .'</td>
                        <td>' . $row['smr_pao_income'] .'</td>
                        <td>' . $row['smr_driver_income'] .'</td>
                        <td>' . $row['smr_time'] .'</td>
                        <td>' . $row['smr_date'] .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' .  $row['smr_id'] .'></i>
                        </td>
                    </tr>
                ';
            }
        }
    }
?>