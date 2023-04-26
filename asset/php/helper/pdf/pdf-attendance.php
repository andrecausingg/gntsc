<?php

    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    require_once 'vendor/autoload.php';

    $html = '
        <h2 style="text-align:center">GROTTO NOVALICHES TRANSPORT <br> SERVICE COOPERATIVE</h2>
    ';

    $html .= '
        <table style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Driver Full Name</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Pao Full Name</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Time In</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Time Out</th>
                </tr>
            </thead>
    ';

    require_once("../database-connection/connectionHF.php");
    // Class
    $classDataBaseConnection = new classDataBaseConnection();
    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM attendance_tbl ORDER BY at_id DESC");
    while($row = mysqli_fetch_assoc($fetch_data)){

        $db_at_drivers_fullname = $row["at_drivers_fullname"];
        $db_at_pao_fullname = $row["at_pao_fullname"];
        $db_at_time_in = $row["at_time_in"];
        $db_at_time_out = $row["at_time_out"];
    
        $html .= '
            <tbody>
                <tr>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_at_drivers_fullname .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_at_pao_fullname .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_at_time_in .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_at_time_out .'</td>
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

