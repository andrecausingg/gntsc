<?php

    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    require_once 'vendor/autoload.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
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

            // $dateNowStart = date_create($_POST["startDate"]);
            // $startDateResult = date_format($dateNowStart,"d/m/Y");

            // $dateNowEnd = date_create($_POST["endDate"]);
            // $endDateResult = date_format($dateNowEnd,"d/m/Y");
            // $pdfClass = new pdfClass($startDateResult, $endDateResult);
            // $pdfClass->displayPdf();

            $html = '
                <h2 style="text-align:center">GROTTO NOVALICHES TRANSPORT <br> SERVICE COOPERATIVE</h2>
                <h3 style="text-align:center">MPUJ SALARY</h3>
            ';
        
            $html .= '
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Pao FullName' ."<br>".'Driver FullName</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Round No.1</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Round No.2</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Round No.3</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Round No.4</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Round No.5</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Round No.6</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Cash</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Expenses</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Handeld</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Boundary</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Diesel</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Amount</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Pao Income</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Driver Income</th>
                            <th style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:14px;">Time / Date Created</th>
                        </tr>
                    </thead>
            ';
        
            require_once("../database-connection/connectionHF.php");
            // require_once("./asset/php/helper/database-connection/connectionHF.php");
        
            // Class
            $totalRoundOne = 0;
            $totalRoundTwo = 0;
            $totalRoundThree = 0;
            $totalRoundFour = 0;
            $totalRoundFive = 0;
            $totalRoundSix = 0;
            $totalCash = 0;
            $totalExpenses = 0;
            $totalHandHeld = 0;
            $totalBoundary = 0;
            $totalDiesel = 0;
            $totalAmount = 0;
            $totalPaoIncome = 0;
            $totalDriverIncome = 0;

            $classDataBaseConnection = new classDataBaseConnection();
            // $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE STR_TO_DATE('mpt_date','%d/%m/%Y') BETWEEN STR_TO_DATE('$startDateResult', '%d/%m/%Y') AND STR_TO_DATE('$endDateResult', '%d/%m/%Y') ORDER BY mpt_id DESC");
            // $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_date BETWEEN STR_TO_DATE('$startDateResult', '%d/%m/%Y') AND STR_TO_DATE('$endDateResult', '%d/%m/%Y') ORDER BY mpt_id DESC");
            // $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_date BETWEEN STR_TO_DATE('$startDateResult', '%d/%m/%Y') AND STR_TO_DATE('$endDateResult', '%d/%m/%Y') ORDER BY mpt_id DESC");
            // $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_date BETWEEN ($startDateResult, '%d/%m/%Y') AND last_day($endDateResult) ORDER BY mpt_id DESC");
            // $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE STR_TO_DATE(mpt_date,'%d/%m/%Y') >= STR_TO_DATE('$startDateResult','%d/%m/%Y') AND STR_TO_DATE(mpt_date,'%d/%m/%Y') <= STR_TO_DATE('$endDateResult','%d/%m/%Y')  ORDER BY mpt_id DESC");
            // $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_datee = '$startDateResult' ORDER BY mpt_id DESC");
            $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_datee >= '$startDateResult' AND mpt_datee <= '$endDateResult' ORDER BY mpt_id DESC");
            while($row = mysqli_fetch_assoc($fetch_data)){
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

                $totalRoundOne +=  $mpt_rounds_one;
                $totalRoundTwo += $mpt_rounds_two;
                $totalRoundThree += $mpt_rounds_three;
                $totalRoundFour += $mpt_rounds_four;
                $totalRoundFive += $mpt_rounds_five;
                $totalRoundSix += $mpt_rounds_six;
                $totalCash += $mpt_total_cash;
                $totalExpenses += $mpt_expenses;
                $totalHandHeld += $mpt_handheld;
                $totalBoundary += $mpt_boundery;
                $totalDiesel += $mpt_diesel;
                $totalAmount += $mpt_amount;
                $totalPaoIncome = $mpt_pao_income;
                $totalDriverIncome += $mpt_driver_income;

                $html .= '
                        <tr>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_pao_fullname"] ."|<br>". $row["mpt_driver_fullname"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">' .$row["mpt_rounds_one"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_rounds_two"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_rounds_three"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_rounds_four"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_rounds_five"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_rounds_six"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_total_cash"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_expenses"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_handheld"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_boundery"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_diesel"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_amount"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_pao_income"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_driver_income"] .'</td>
                            <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px;">'. $row["mpt_time"] . "<br>". $row["mpt_date"] .'</td>
                        </tr>
                ';
            }

            $html .= '
                    <tr>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">Total</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalRoundOne.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalRoundTwo.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalRoundThree.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalRoundFour.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalRoundFive.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalRoundSix.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalCash.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalExpenses.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalHandHeld.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalBoundary.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalDiesel.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalAmount.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalPaoIncome.'</td>
                        <td style="padding: 4px; text-align: center;border-bottom: 1px solid #ddd; font-size:12px; font-weight:bolder;">'. $totalDriverIncome.'</td>
                    </tr>
            ';
            
            $html .= '
                </table>
            ';
        
            $exportName = "gntsc-mpuj-salary.pdf";
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

