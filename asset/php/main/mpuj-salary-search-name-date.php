<?php
    if(isset($_POST["mpuj"]) || isset($_POST["pao"]) || isset($_POST["startDate"]) || isset($_POST["endDate"])){
        $classSearch = new classSearch($_POST["mpuj"], $_POST["pao"], $_POST["startDate"], $_POST["endDate"]);
        $classSearch->getSearch();
    }

class classSearch{
    private $mpuj;
    private $pao;
    private $startDate;
    private $endDate;

    function __construct($mpuj, $pao, $startDate, $endDate){
        $this->mpuj = $mpuj;
        $this->pao = $pao;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    function getSearch(){
        // File Connection Database
        require_once("../helper/database-connection/connectionHF.php");

        // CLASS Connection on Database 
        $classDataBaseConnection = new classDataBaseConnection();

        $searchMpuj = mysqli_real_escape_string($classDataBaseConnection->connect(), $this->mpuj);
        $searchPao = mysqli_real_escape_string($classDataBaseConnection->connect(), $this->pao);
        $searchStartDate = mysqli_real_escape_string($classDataBaseConnection->connect(), $this->startDate);
        $searchEndDate = mysqli_real_escape_string($classDataBaseConnection->connect(), $this->endDate);
        
        if($this->mpuj != "" && $this->pao != "" && $this->startDate !="" && $this->endDate){
            $query = " SELECT * FROM mpuj_payroll_tbl WHERE mpt_datee BETWEEN '$searchStartDate' AND '$searchEndDate' AND (mpt_driver_fullname LIKE '%".$searchMpuj."%' AND mpt_pao_fullname LIKE '%".$searchPao."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
        }else if($this->mpuj != "" && $this->pao != "" && $this->startDate !=""){
            $query = " SELECT * FROM mpuj_payroll_tbl WHERE mpt_datee = '$searchStartDate' AND (mpt_driver_fullname LIKE '%".$searchMpuj."%' AND mpt_pao_fullname LIKE '%".$searchPao."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
        }else if($this->mpuj != "" && $this->pao != "" && $this->endDate !=""){
            $query = " SELECT * FROM mpuj_payroll_tbl WHERE mpt_datee = '$searchEndDate' AND (mpt_driver_fullname LIKE '%".$searchMpuj."%' AND mpt_pao_fullname LIKE '%".$searchPao."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
        }else if($this->startDate !="" && $this->endDate != ""){
            $query = " SELECT * FROM mpuj_payroll_tbl WHERE mpt_datee BETWEEN '$searchStartDate' AND '$searchEndDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
        }else if($this->mpuj != "" && $this->pao != ""){
            $query = " SELECT * FROM mpuj_payroll_tbl WHERE mpt_driver_fullname LIKE '%".$searchMpuj."%' AND mpt_pao_fullname LIKE '%".$searchPao."%'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
        }else if($this->mpuj != ""){
            $query = " SELECT * FROM mpuj_payroll_tbl WHERE mpt_driver_fullname LIKE '%".$searchMpuj."%'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
        }else if($this->pao != ""){
            $query = " SELECT * FROM mpuj_payroll_tbl WHERE (mpt_pao_fullname LIKE '%".$searchPao."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
        }else if($this->startDate !=""){
            $query = " SELECT * FROM mpuj_payroll_tbl WHERE mpt_datee = '$searchStartDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
        }else if($this->endDate != ""){
            $query = " SELECT * FROM mpuj_payroll_tbl WHERE mpt_datee '$searchEndDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
        }else if($this->mpuj == "" && $this->pao == "" || $this->startDate == "" || $this->endDate == ""){
            $query = " SELECT * FROM mpuj_payroll_tbl";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
    }
}
?>