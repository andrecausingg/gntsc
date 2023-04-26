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
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl ORDER BY mpt_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){
                $mpt_id = $row["mpt_id"];
                $mpt_pao_fullname = $row["mpt_pao_fullname"];
                $mpt_driver_fullname = $row["mpt_driver_fullname"];
                $mpt_rounds_one = $row["mpt_rounds_one"];
                $mpt_rounds_two = $row["mpt_rounds_two"];
                $mpt_rounds_three = $row["mpt_rounds_three"];
                $mpt_rounds_four = $row["mpt_rounds_four"];
                $mpt_rounds_five = $row["mpt_rounds_five"];
                $mpt_rounds_six = $row["mpt_rounds_six"];
                $mpt_total_cash = $row["mpt_total_cash"];
                $mpt_expenses = $row["mpt_expenses"];
                $mpt_handheld = $row["mpt_handheld"];
                $mpt_boundery = $row["mpt_boundery"];
                $mpt_diesel = $row["mpt_diesel"];
                $mpt_amount = $row["mpt_amount"];
                $mpt_pao_income = $row["mpt_pao_income"];
                $mpt_driver_income = $row["mpt_driver_income"];
                $mpt_time = $row["mpt_time"];
                $mpt_date = $row["mpt_date"];

                echo'
                    <tr>
                        <td>' . $mpt_pao_fullname .'</td>
                        <td>' . $mpt_driver_fullname .'</td>
                        <td>' . $mpt_rounds_one .'</td>
                        <td>' . $mpt_rounds_two .'</td>
                        <td>' . $mpt_rounds_three .'</td>
                        <td>' . $mpt_rounds_four .'</td>
                        <td>' . $mpt_rounds_five .'</td>
                        <td>' . $mpt_rounds_six .'</td>
                        <td>' . $mpt_total_cash .'</td>
                        <td>' . $mpt_expenses .'</td>
                        <td>' . $mpt_handheld .'</td>
                        <td>' . $mpt_boundery .'</td>
                        <td>' . $mpt_diesel .'</td>
                        <td>' . $mpt_amount .'</td>
                        <td>' . $mpt_pao_income .'</td>
                        <td>' . $mpt_driver_income .'</td>
                        <td>' . $mpt_time .'</td>
                        <td>' . $mpt_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $mpt_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $mpt_id .'></i>
                        </td>
                    </tr>
                ';
            }
        }
    }
?>