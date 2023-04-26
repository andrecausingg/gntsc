<?php

    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    require_once 'vendor/autoload.php';

    $html = '0
        <h2 style="text-align:center">GROTTO NOVALICHES TRANSPORT <br> SERVICE COOPERATIVE</h2>
    ';

    $html .= '
        <table style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Pao FullName</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Driver FullName</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Rounds</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Cash</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Expenses</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Handeld</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Boundary</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Diesel</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Total Amount</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Pao Income</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Driver Income</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Time / Date Created</th>
                </tr>
            </thead>
    ';

    require_once("../database-connection/connectionHF.php");
    // Class
    $classDataBaseConnection = new classDataBaseConnection();
    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl ORDER BY mpt_id DESC");
    while($row = mysqli_fetch_assoc($fetch_data)){

        $db_mpt_pao_fullname = $row["mpt_pao_fullname"];
        $db_mpt_driver_fullname = $row["mpt_driver_fullname"];
        $db_mpt_rounds = $row["mpt_rounds"];
        $db_mpt_total_cash = $row["mpt_total_cash"];
        $db_mpt_expenses = $row["mpt_expenses"];
        $db_mpt_handheld = $row["mpt_handheld"];
        $db_mpt_boundery = $row["mpt_boundery"];
        $db_mpt_diesel = $row["mpt_diesel"];
        $db_mpt_amount = $row["mpt_amount"];
        $db_mpt_pao_income = $row["mpt_pao_income"];
        $db_mpt_driver_income = $row["mpt_driver_income"];
        $db_mpt_time = $row["mpt_time"];
        $db_mpt_date = $row["mpt_date"];
    
        $html .= '
            <tbody>
                <tr>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_mpt_pao_fullname .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_mpt_driver_fullname .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mpt_rounds .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mpt_total_cash .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mpt_expenses .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mpt_handheld .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mpt_boundery .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mpt_diesel .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mpt_amount .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mpt_pao_income .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mpt_driver_income .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mpt_time ." " . $db_mpt_date .'</td>
                </tr>
            </tbody>
        ';
    }

    $html .= '
        </table>
    ';

    $exportName = "gntsc-staff.pdf";
    $currentDate = date('d-m-y h:m:s');

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('13', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($exportName, ["Attachment" => 0]);
?>

