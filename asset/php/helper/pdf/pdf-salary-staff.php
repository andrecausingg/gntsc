<?php

    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    require_once 'vendor/autoload.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["startDate"]) && isset($_POST["endDate"])){
            $startDateResult = $_POST["startDate"];
            $endDateResult = $_POST["endDate"];

            $html = '
                <h2 style="text-align:center">GROTTO NOVALICHES TRANSPORT <br> SERVICE COOPERATIVE</h2>
                <h3 style="text-align:center">STAFF</h3>
            ';
        
            $html .= '
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Staff Name</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">No. of Days</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Rate</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Amount</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Time / Date Created</th>
                        </tr>
                    </thead>
            ';
        
            require_once("../database-connection/connectionHF.php");
            // require_once("./asset/php/helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // Variable
            $totalAmount = 0; 

            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM staff_payroll_tbl WHERE spt_datee >= '$startDateResult' AND spt_datee <= '$endDateResult' ORDER BY spt_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){
        
                $db_spt_fullname = $row["spt_fullname"];
                $db_spt_num_days = $row["spt_num_days"];
                $db_spt_rate = $row["spt_rate"];
                $db_spt_amount = $row["spt_amount"];
                $db_spt_time = $row["spt_time"];
                $db_spt_date = $row["spt_date"];

                $totalAmount += $db_spt_amount;
        
                $html .= '
                    <tbody>
                        <tr>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $db_spt_fullname .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $db_spt_num_days .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' . $db_spt_rate .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' . $db_spt_amount .'</td>
                            <td style="padding: 4px; text-align: center; font-size:12px;">' . $db_spt_time ." " . $db_spt_date .'</td>
                        </tr>
                    </tbody>
                ';
            }

            $html .= '
                    <tr>
                        <td style="padding: 4px; text-align: center; font-size:12px; font-weight:bolder;">Total</td>
                        <td style="padding: 4px; text-align: center; font-size:12px; font-weight:bolder;"> </td>
                        <td style="padding: 4px; text-align: center; font-size:12px; font-weight:bolder;"> </td>
                        <td style="padding: 4px; text-align: center; font-size:12px; font-weight:bolder;">'. $totalAmount.'</td>
                    </tr>
            ';
        
            $html .= '
                </table>
            ';
        
            $exportName = "gntsc-staff-salary.pdf";
            $currentDate = date('d-m-y h:m:s');
        
            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
        
            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('13', 'landscape');
        
            // Render the HTML as PDF
            $dompdf->render();
        
            // Output the generated PDF to Browser
            $dompdf->stream($exportName);
            // $dompdf->stream($exportName, ["Attachment" => 0]);
        }
    }

    // class pdfClass{
    //     private $startDate;
    //     private $endDate;

    //     function __construct($startDate, $endDate){
    //         $this->startDate = $startDate;
    //         $this->endDate = $endDate;
    //     }

    //     function displayPdf(){
    //         $html = '
    //             <h2 style="text-align:center">GROTTO NOVALICHES TRANSPORT <br> SERVICE COOPERATIVE</h2>
    //         ';
    
    //         $html .= '
    //             <table style="border-collapse: collapse; width: 100%;">
    //                 <thead>
    //                     <tr>
    //                         <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Driver Name</th>
    //                         <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Plate No.</th>
    //                         <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Daily Butaw</th>
    //                         <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Savings</th>
    //                         <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Terminal Fee</th>
    //                         <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Monthly Butaw</th>
    //                         <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Membership</th>
    //                         <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Others</th>
    //                         <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Total Remarks</th>
    //                         <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Time / Date</th>
    //                     </tr>
    //                 </thead>
    //         ';
        
    //         // require_once("../database-connection/connectionHF.php");
    //         require_once("./asset/php/helper/database-connection/connectionHF.php");

    //         // Class
    //         $classDataBaseConnection = new classDataBaseConnection();
    //         $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM tradjeep_payroll_tbl WHERE tpt_date >= '$this->startDate' AND tpt_date <= '$this->endDate' ORDER BY tpt_id DESC");
    //         while($row = mysqli_fetch_assoc($fetch_data)){
        
    //             $db_spt_fullname = $row["spt_fullname"];
    //             $db_spt_num_days = $row["spt_num_days"];
    //             $db_tpt_daily_butaw = $row["tpt_daily_butaw"];
    //             $db_tpt_savings = $row["tpt_savings"];
    //             $db_tpt_terminal_fee = $row["tpt_terminal_fee"];
    //             $db_tpt_monthly_butaw = $row["tpt_monthly_butaw"];
    //             $db_tpt_membership = $row["tpt_membership"];
    //             $db_tpt_others = $row["tpt_others"];
    //             $db_tpt_remarks = $row["tpt_remarks"];
    //             $db_tpt_time = $row["tpt_time"];
    //             $db_tpt_date = $row["tpt_date"];
            
    //             $html .= '
    //                 <tbody>
    //                     <tr>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_spt_fullname .'</td>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_spt_num_days .'</td>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_tpt_daily_butaw .'</td>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_tpt_savings .'</td>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_tpt_terminal_fee .'</td>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_tpt_monthly_butaw .'</td>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_tpt_membership .'</td>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_tpt_others .'</td>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_tpt_remarks .'</td>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">' . $db_tpt_time ." " . $db_tpt_date .'</td>
    //                     </tr>
    //                 </tbody>
    //             ';
    //         }
        
    //         $html .= '
    //             </table>
    //         ';
        
    //         $exportName = "gntsc-staff.pdf";
    //         $currentDate = date('d-m-y h:m:s');
        
    //         // instantiate and use the dompdf class
    //         $dompdf = new Dompdf();
    //         $dompdf->loadHtml($html);
        
    //         // (Optional) Setup the paper size and orientation
    //         $dompdf->setPaper('13', 'landscape');
        
    //         // Render the HTML as PDF
    //         $dompdf->render();
            
    //         // Output the generated PDF to Browser
    //         $dompdf->stream($exportName, ["Attachment" => 0]);
    //         // $dompdf->stream($exportName, ["Attachment" => 0]);
    //     }
    // }


?>

