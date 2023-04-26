<?php

    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    require_once 'vendor/autoload.php';

    $html = '
        <h2 style="text-align:center">GROTTO NOVALICHES TRANSPORT <br> SERVICE COOPERATIVE</h2>
        <h3 style="text-align:center">PUBLIC ASSISTANCE OFFICER</h3>
    ';

    $html .= '
        <table style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Full Name</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Address</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Contact No.</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Birth Date</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Birth Place</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Gender</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Civil Status</th>
                    <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Time / Date Created</th>
                </tr>
            </thead>
    ';

    require_once("../database-connection/connectionHF.php");
    // Class
    $classDataBaseConnection = new classDataBaseConnection();
    $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_info_tbl WHERE sit_role_name ='PAO' ORDER BY sit_id DESC");
    while($row = mysqli_fetch_assoc($fetch_data)){

        $db_sit_role_name = $row["sit_role_name"];
        $db_sit_surname = $row["sit_surname"];
        $db_sit_middlename = $row["sit_middlename"];
        $db_sit_firstname = $row["sit_firstname"];
        $db_sit_birthdate = $row["sit_birthdate"];
        $db_sit_birthplace = $row["sit_birthplace"];
        $db_sit_gender = $row["sit_gender"];
        $db_sit_civil_status = $row["sit_civil_status"];
        $db_sit_address = $row["sit_address"];
        $db_sit_contact_num = $row["sit_contact_num"];
        $db_sit_license = $row["sit_license"];
        $db_sit_time = $row["sit_time"];
        $db_sit_date = $row["sit_date"];
    
        $html .= '
            <tbody>
                <tr>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_sit_surname . " " . $db_sit_middlename  ." " . $db_sit_firstname  .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_sit_address .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_sit_contact_num .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_sit_birthdate .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_sit_birthplace .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_sit_gender .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_sit_civil_status .'</td>
                    <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_sit_time . " " .$db_sit_date .'</td>
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

