<?php

    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    require_once 'vendor/autoload.php';

    $html = '
        <h2 style="text-align:center">GROTTO NOVALICHES TRANSPORT <br> SERVICE COOPERATIVE</h2>
        <h3 style="text-align:center">MPUJ INFORMATION</h3>
    ';

    $html .= '
        <table style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Chasis No.</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Engine No.</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Plate No.</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">MPUJ No.</th>
                </tr>
            </thead>
    ';

    require_once("../database-connection/connectionHF.php");
    // Class
    $classDataBaseConnection = new classDataBaseConnection();
    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_info_tbl ORDER BY mit_id DESC");
    while($row = mysqli_fetch_assoc($fetch_data)){

        $db_mit_chassis_num = $row["mit_chassis_num"];
        $db_mit_engine = $row["mit_engine"];
        $db_mit_plate_num = $row["mit_plate_num"];
        $db_mit_mpuj_num = $row["mit_mpuj_num"];
    
        $html .= '
            <tbody>
                <tr>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_mit_chassis_num .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_mit_engine .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_mit_plate_num .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_mit_mpuj_num .'</td>
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

