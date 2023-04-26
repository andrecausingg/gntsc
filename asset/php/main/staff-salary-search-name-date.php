<?php
    if(isset($_POST["searchName"]) || isset($_POST["startDate"]) || isset($_POST["endDate"])){
        $classSearch = new classSearch($_POST["searchName"], $_POST["startDate"], $_POST["endDate"]);
        $classSearch->getSearch();
    }

class classSearch{
    private $searchName;
    private $startDate;
    private $endDate;

    function __construct($searchName, $startDate, $endDate){
        $this->searchName = $searchName;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    function getSearch(){
        // File Connection Database
        require_once("../helper/database-connection/connectionHF.php");

        // CLASS Connection on Database 
        $classDataBaseConnection = new classDataBaseConnection();

        $search = mysqli_real_escape_string($classDataBaseConnection->connect(), $this->searchName);
        $searchStartDate = mysqli_real_escape_string($classDataBaseConnection->connect(), $this->startDate);
        $searchEndDate = mysqli_real_escape_string($classDataBaseConnection->connect(), $this->endDate);
        
        if($this->searchName != "" && $this->startDate !="" && $this->endDate){
            $query = " SELECT * FROM staff_payroll_tbl WHERE spt_datee BETWEEN '$searchStartDate' AND '$searchEndDate' AND (spt_fullname LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["spt_fullname"] .'</td>
                            <td>' . $row["spt_num_days"] .'</td>
                            <td>' . $row["spt_rate"] .'</td>
                            <td>' . $row["spt_amount"] .'</td>
                            <td>' . $row["spt_time"] .'</td>
                            <td>' . $row["spt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["spt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["spt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName != "" && $this->startDate !=""){
            $query = " SELECT * FROM staff_payroll_tbl WHERE spt_datee = '$searchStartDate' AND (spt_fullname LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["spt_fullname"] .'</td>
                            <td>' . $row["spt_num_days"] .'</td>
                            <td>' . $row["spt_rate"] .'</td>
                            <td>' . $row["spt_amount"] .'</td>
                            <td>' . $row["spt_time"] .'</td>
                            <td>' . $row["spt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["spt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["spt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName != "" && $this->endDate !=""){
            $query = " SELECT * FROM staff_payroll_tbl WHERE spt_datee = '$searchEndDate' AND (spt_fullname LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["spt_fullname"] .'</td>
                            <td>' . $row["spt_num_days"] .'</td>
                            <td>' . $row["spt_rate"] .'</td>
                            <td>' . $row["spt_amount"] .'</td>
                            <td>' . $row["spt_time"] .'</td>
                            <td>' . $row["spt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["spt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["spt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->startDate !="" && $this->endDate != ""){
            $query = " SELECT * FROM staff_payroll_tbl WHERE spt_datee BETWEEN '$searchStartDate' AND '$searchEndDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["spt_fullname"] .'</td>
                            <td>' . $row["spt_num_days"] .'</td>
                            <td>' . $row["spt_rate"] .'</td>
                            <td>' . $row["spt_amount"] .'</td>
                            <td>' . $row["spt_time"] .'</td>
                            <td>' . $row["spt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["spt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["spt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName != ""){
            $query = " SELECT * FROM staff_payroll_tbl WHERE (spt_fullname LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["spt_fullname"] .'</td>
                            <td>' . $row["spt_num_days"] .'</td>
                            <td>' . $row["spt_rate"] .'</td>
                            <td>' . $row["spt_amount"] .'</td>
                            <td>' . $row["spt_time"] .'</td>
                            <td>' . $row["spt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["spt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["spt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->startDate !=""){
            $query = " SELECT * FROM staff_payroll_tbl WHERE spt_datee = '$searchStartDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["spt_fullname"] .'</td>
                            <td>' . $row["spt_num_days"] .'</td>
                            <td>' . $row["spt_rate"] .'</td>
                            <td>' . $row["spt_amount"] .'</td>
                            <td>' . $row["spt_time"] .'</td>
                            <td>' . $row["spt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["spt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["spt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->endDate != ""){
            $query = " SELECT * FROM staff_payroll_tbl WHERE spt_datee '$searchEndDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["spt_fullname"] .'</td>
                            <td>' . $row["spt_num_days"] .'</td>
                            <td>' . $row["spt_rate"] .'</td>
                            <td>' . $row["spt_amount"] .'</td>
                            <td>' . $row["spt_time"] .'</td>
                            <td>' . $row["spt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["spt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["spt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName == "" || $this->startDate == "" || $this->endDate == ""){
            $query = " SELECT * FROM staff_payroll_tbl";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo'
                        <tr>
                            <td>' . $row["spt_fullname"] .'</td>
                            <td>' . $row["spt_num_days"] .'</td>
                            <td>' . $row["spt_rate"] .'</td>
                            <td>' . $row["spt_amount"] .'</td>
                            <td>' . $row["spt_time"] .'</td>
                            <td>' . $row["spt_date"] .'</td>
                            <td class="yot-flex">
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $row["spt_id"] .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $row["spt_id"] .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }
    }
}
?>