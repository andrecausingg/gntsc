<?php
    if(isset($_POST["driverNameMpuj"]) || isset($_POST["paoNameMpuj"]) || isset($_POST["finalDateNow"])){
        $classDisplaySalaryMpujCheckBox = new classDisplaySalaryMpujCheckBox($_POST["driverNameMpuj"],$_POST["paoNameMpuj"],$_POST["finalDateNow"]);
        $classDisplaySalaryMpujCheckBox->displaySalaryMpujCheckBox();
    }

    class classDisplaySalaryMpujCheckBox{
        private $driverNameMpuj;
        private $paoNameMpuj;
        private $finalDateNow;

        function __construct($driverNameMpuj, $paoNameMpuj, $finalDateNow){
            $this->driverNameMpuj = $driverNameMpuj;
            $this->paoNameMpuj = $paoNameMpuj;
            $this->finalDateNow = $finalDateNow;
        }

        function displaySalaryMpujCheckBox(){
            // File Connection Database
            // require_once("./asset/php/helper/database-connection/connectionHF.php");
            require_once("../helper/database-connection/connectionHF.php");

            // Class
            $classDataBaseConnection = new classDataBaseConnection();

            // DISPLAY
            if($this->driverNameMpuj != "" || $this->paoNameMpuj != "" || $this->finalDateNow != ""){
                $fetch_data = mysqli_query($classDataBaseConnection->connect(), "SELECT * FROM mpuj_payroll_tbl WHERE mpt_pao_fullname Like '$this->paoNameMpuj' OR mpt_driver_fullname Like '$this->driverNameMpuj' OR mpt_date LIKE '$this->finalDateNow' ORDER BY mpt_id DESC");
                while($row = mysqli_fetch_assoc($fetch_data)){
    
                    $mpt_id = $row["mpt_id"];
                    $mpt_pao_fullname = $row["mpt_pao_fullname"];
                    $mpt_driver_fullname = $row["mpt_driver_fullname"];
                    $mpt_rounds = $row["mpt_rounds"];
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
                            <td><input type="checkbox" class="selectSalaryReport" id="selectSalaryReport" name="selectSalaryReport" value="' .$mpt_id .'"></td>
                            <td>' . $mpt_time . "<br>" . $mpt_date .'</td>
                            <td>' . $mpt_pao_fullname .'</td>
                            <td>' . $mpt_driver_fullname .'</td>
                            <td>' . $mpt_rounds .'</td>
                            <td>' . $mpt_total_cash .'</td>
                            <td>' . $mpt_expenses .'</td>
                            <td>' . $mpt_handheld .'</td>
                            <td>' . $mpt_boundery .'</td>
                            <td>' . $mpt_diesel .'</td>
                            <td>' . $mpt_amount .'</td>
                            <td>' . $mpt_pao_income .'</td>
                            <td>' . $mpt_driver_income .'</td>
                        </tr>
                    ';
                }
            }
        }
    }
?>