<?php

    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    require_once 'vendor/autoload.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["startDate"]) && isset($_POST["endDate"])){
            $startDateResult = $_POST["startDate"];
            $endDateResult = $_POST["endDate"];

            // Start Date
            // $startDate = explode('-', $_POST["startDate"]);
            // $startDateYear = $startDate[0];
            // $startDateMonth = $startDate[1];
            // $startDateDay = $startDate[2];
            // $startDateResult = $startDateDay . "/" . $startDateMonth . "/" . $startDateYear;
    
            // // End Date
            // $endDate = explode('-', $_POST["endDate"]);
            // $endDateYear = $endDate[0];
            // $endDateMonth = $endDate[1];
            // $endDateDay = $endDate[2];
            // $endDateResult = $endDateDay . "/" . $endDateMonth . "/" . $endDateYear;
            
            // $pdfClass = new pdfClass($startDateResult, $endDateResult);
            // $pdfClass->displayPdf();

            $html = '
                <h2 style="text-align:center">GROTTO NOVALICHES TRANSPORT <br> SERVICE COOPERATIVE</h2>
                <h3 style="text-align:center">BUTAW</h3>
            ';
        
            $html .= '
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Driver Name</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Plate No.</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Daily Butaw</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Savings</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Terminal Fee</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Monthly Butaw</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Membership</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Others</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Total Remarks</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">Time / Date</th>
                        </tr>
                    </thead>
            ';
        
            require_once("../database-connection/connectionHF.php");
            // require_once("./asset/php/helper/database-connection/connectionHF.php");

            $totalDailyButaw = 0;
            $totalSavings = 0;
            $totalTerminalFee = 0;
            $totalMonthlyFee = 0;
            $totalMemberShipFee = 0;
            $totalOthers = 0;
            $totalRemarks = 0; 
        
            // Class
            $classDataBaseConnection = new classDataBaseConnection();
            
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM tradjeep_payroll_tbl WHERE tpt_datee >= '$startDateResult' AND tpt_datee <= '$endDateResult' ORDER BY tpt_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){
        
                $db_tpt_drivers_name = $row["tpt_drivers_name"];
                $db_tpt_plate_num = $row["tpt_plate_num"];
                $db_tpt_daily_butaw = $row["tpt_daily_butaw"];
                $db_tpt_savings = $row["tpt_savings"];
                $db_tpt_terminal_fee = $row["tpt_terminal_fee"];
                $db_tpt_monthly_butaw = $row["tpt_monthly_butaw"];
                $db_tpt_membership = $row["tpt_membership"];
                $db_tpt_others = $row["tpt_others"];
                $db_tpt_remarks = $row["tpt_remarks"];
                $db_tpt_time = $row["tpt_time"];
                $db_tpt_date = $row["tpt_date"];

                $totalDailyButaw += $db_tpt_daily_butaw;
                $totalSavings += $db_tpt_savings;
                $totalTerminalFee += $db_tpt_terminal_fee;
                $totalMonthlyFee += $db_tpt_monthly_butaw;
                $totalMemberShipFee += $db_tpt_membership;
                $totalOthers += $db_tpt_others;
                $totalRemarks += $db_tpt_remarks;
        
                $html .= '
                    <tbody>
                        <tr>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $db_tpt_drivers_name .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $db_tpt_plate_num .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' . $db_tpt_daily_butaw .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' . $db_tpt_savings .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' . $db_tpt_terminal_fee .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' . $db_tpt_monthly_butaw .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' . $db_tpt_membership .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' . $db_tpt_others .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' . $db_tpt_remarks .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' . $db_tpt_time ." " . $db_tpt_date .'</td>
                        </tr>
                    </tbody>
                ';
            }

            $html .= '
                    <tr>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">Total</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;"> </td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalDailyButaw.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalSavings.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalTerminalFee.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalMonthlyFee.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalMemberShipFee.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalOthers.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalRemarks.'</td>
                    </tr>
            ';
        
            $html .= '
                </table>
            ';
        
            $exportName = "gntsc-butaw.pdf";
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
        
    //             $db_tpt_drivers_name = $row["tpt_drivers_name"];
    //             $db_tpt_plate_num = $row["tpt_plate_num"];
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
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_tpt_drivers_name .'</td>
    //                         <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd;">'. $db_tpt_plate_num .'</td>
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

