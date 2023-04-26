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
            $query = " SELECT * FROM staff_info_tbl WHERE sit_datee BETWEEN '$searchStartDate' AND '$searchEndDate' AND (sit_surname LIKE '%".$search."%' OR sit_middlename LIKE '%".$search."%' OR sit_firstname LIKE '%".$search."%') AND sit_role_name ='OPE'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $db_sit_id = $row["sit_id"];
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
                    $db_sit_license_expiredate = $row["sit_license_expiredate"];
                    $db_sit_time = $row["sit_time"];
                    $db_sit_date = $row["sit_date"];
    
                    echo'
                        <tr>
                            <td>' . $db_sit_role_name .'</td>
                            <td>' . $db_sit_surname . "," .$db_sit_middlename . " " . $db_sit_firstname.'</td>
                            <td>' . $db_sit_address .'</td>
                            <td>' . $db_sit_contact_num .'</td>
                            <td>' . $db_sit_birthdate .'</td>
                            <td>' . $db_sit_birthplace .'</td>
                            <td>' . $db_sit_gender .'</td>
                            <td>' . $db_sit_civil_status .'</td>
                            <td>' . $db_sit_license .'</td>
                            <td>' . $db_sit_license_expiredate .'</td>
                            <td>' . $db_sit_time . " " . $db_sit_date .'</td>
                            <td class="yot-flex yot-flex-ai-c-jc-sb">
                                <i class="fa-solid fa-eye  yot-text-fs-l yot-cursor-pointer yot-active" id="view" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-mlr-8" id="edit" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active" id="delete" data-id=' . $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName != "" && $this->startDate !=""){
            $query = " SELECT * FROM staff_info_tbl WHERE sit_datee = '$searchStartDate' AND (sit_surname LIKE '%".$search."%' OR sit_middlename LIKE '%".$search."%' OR sit_firstname LIKE '%".$search."%') AND sit_role_name ='OPE'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $db_sit_id = $row["sit_id"];
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
                    $db_sit_license_expiredate = $row["sit_license_expiredate"];
                    $db_sit_time = $row["sit_time"];
                    $db_sit_date = $row["sit_date"];
    
                    echo'
                        <tr>
                            <td>' . $db_sit_role_name .'</td>
                            <td>' . $db_sit_surname . "," .$db_sit_middlename . " " . $db_sit_firstname.'</td>
                            <td>' . $db_sit_address .'</td>
                            <td>' . $db_sit_contact_num .'</td>
                            <td>' . $db_sit_birthdate .'</td>
                            <td>' . $db_sit_birthplace .'</td>
                            <td>' . $db_sit_gender .'</td>
                            <td>' . $db_sit_civil_status .'</td>
                            <td>' . $db_sit_license .'</td>
                            <td>' . $db_sit_license_expiredate .'</td>
                            <td>' . $db_sit_time . " " . $db_sit_date .'</td>
                            <td class="yot-flex yot-flex-ai-c-jc-sb">
                                <i class="fa-solid fa-eye  yot-text-fs-l yot-cursor-pointer yot-active" id="view" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-mlr-8" id="edit" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active" id="delete" data-id=' . $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName != "" && $this->endDate !=""){
            $query = " SELECT * FROM staff_info_tbl WHERE sit_datee = '$searchEndDate' AND (sit_surname LIKE '%".$search."%' OR sit_middlename LIKE '%".$search."%' OR sit_firstname LIKE '%".$search."%') AND sit_role_name ='OPE'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $db_sit_id = $row["sit_id"];
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
                    $db_sit_license_expiredate = $row["sit_license_expiredate"];
                    $db_sit_time = $row["sit_time"];
                    $db_sit_date = $row["sit_date"];
    
                    echo'
                        <tr>
                            <td>' . $db_sit_role_name .'</td>
                            <td>' . $db_sit_surname . "," .$db_sit_middlename . " " . $db_sit_firstname.'</td>
                            <td>' . $db_sit_address .'</td>
                            <td>' . $db_sit_contact_num .'</td>
                            <td>' . $db_sit_birthdate .'</td>
                            <td>' . $db_sit_birthplace .'</td>
                            <td>' . $db_sit_gender .'</td>
                            <td>' . $db_sit_civil_status .'</td>
                            <td>' . $db_sit_license .'</td>
                            <td>' . $db_sit_license_expiredate .'</td>
                            <td>' . $db_sit_time . " " . $db_sit_date .'</td>
                            <td class="yot-flex yot-flex-ai-c-jc-sb">
                                <i class="fa-solid fa-eye  yot-text-fs-l yot-cursor-pointer yot-active" id="view" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-mlr-8" id="edit" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active" id="delete" data-id=' . $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->startDate !="" && $this->endDate != ""){
            $query = " SELECT * FROM staff_info_tbl WHERE sit_datee BETWEEN '$searchStartDate' AND '$searchEndDate' AND sit_role_name ='OPE'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $db_sit_id = $row["sit_id"];
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
                    $db_sit_license_expiredate = $row["sit_license_expiredate"];
                    $db_sit_time = $row["sit_time"];
                    $db_sit_date = $row["sit_date"];
    
                    echo'
                        <tr>
                            <td>' . $db_sit_role_name .'</td>
                            <td>' . $db_sit_surname . "," .$db_sit_middlename . " " . $db_sit_firstname.'</td>
                            <td>' . $db_sit_address .'</td>
                            <td>' . $db_sit_contact_num .'</td>
                            <td>' . $db_sit_birthdate .'</td>
                            <td>' . $db_sit_birthplace .'</td>
                            <td>' . $db_sit_gender .'</td>
                            <td>' . $db_sit_civil_status .'</td>
                            <td>' . $db_sit_license .'</td>
                            <td>' . $db_sit_license_expiredate .'</td>
                            <td>' . $db_sit_time . " " . $db_sit_date .'</td>
                            <td class="yot-flex yot-flex-ai-c-jc-sb">
                                <i class="fa-solid fa-eye  yot-text-fs-l yot-cursor-pointer yot-active" id="view" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-mlr-8" id="edit" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active" id="delete" data-id=' . $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName != ""){
            $query = " SELECT * FROM staff_info_tbl WHERE (sit_surname LIKE '%".$search."%' OR sit_middlename LIKE '%".$search."%' OR sit_firstname LIKE '%".$search."%') AND sit_role_name ='OPE'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $db_sit_id = $row["sit_id"];
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
                    $db_sit_license_expiredate = $row["sit_license_expiredate"];
                    $db_sit_time = $row["sit_time"];
                    $db_sit_date = $row["sit_date"];
    
                    echo'
                        <tr>
                            <td>' . $db_sit_role_name .'</td>
                            <td>' . $db_sit_surname . "," .$db_sit_middlename . " " . $db_sit_firstname.'</td>
                            <td>' . $db_sit_address .'</td>
                            <td>' . $db_sit_contact_num .'</td>
                            <td>' . $db_sit_birthdate .'</td>
                            <td>' . $db_sit_birthplace .'</td>
                            <td>' . $db_sit_gender .'</td>
                            <td>' . $db_sit_civil_status .'</td>
                            <td>' . $db_sit_license .'</td>
                            <td>' . $db_sit_license_expiredate .'</td>
                            <td>' . $db_sit_time . " " . $db_sit_date .'</td>
                            <td class="yot-flex yot-flex-ai-c-jc-sb">
                                <i class="fa-solid fa-eye  yot-text-fs-l yot-cursor-pointer yot-active" id="view" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-mlr-8" id="edit" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active" id="delete" data-id=' . $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->startDate !=""){
            $query = " SELECT * FROM staff_info_tbl WHERE sit_datee = '$searchStartDate' AND sit_role_name ='OPE'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $db_sit_id = $row["sit_id"];
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
                    $db_sit_license_expiredate = $row["sit_license_expiredate"];
                    $db_sit_time = $row["sit_time"];
                    $db_sit_date = $row["sit_date"];
    
                    echo'
                        <tr>
                            <td>' . $db_sit_role_name .'</td>
                            <td>' . $db_sit_surname . "," .$db_sit_middlename . " " . $db_sit_firstname.'</td>
                            <td>' . $db_sit_address .'</td>
                            <td>' . $db_sit_contact_num .'</td>
                            <td>' . $db_sit_birthdate .'</td>
                            <td>' . $db_sit_birthplace .'</td>
                            <td>' . $db_sit_gender .'</td>
                            <td>' . $db_sit_civil_status .'</td>
                            <td>' . $db_sit_license .'</td>
                            <td>' . $db_sit_license_expiredate .'</td>
                            <td>' . $db_sit_time . " " . $db_sit_date .'</td>
                            <td class="yot-flex yot-flex-ai-c-jc-sb">
                                <i class="fa-solid fa-eye  yot-text-fs-l yot-cursor-pointer yot-active" id="view" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-mlr-8" id="edit" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active" id="delete" data-id=' . $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->endDate != ""){
            $query = " SELECT * FROM staff_info_tbl WHERE sit_datee '$searchEndDate' AND sit_role_name ='OPE'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $db_sit_id = $row["sit_id"];
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
                    $db_sit_license_expiredate = $row["sit_license_expiredate"];
                    $db_sit_time = $row["sit_time"];
                    $db_sit_date = $row["sit_date"];
    
                    echo'
                        <tr>
                            <td>' . $db_sit_role_name .'</td>
                            <td>' . $db_sit_surname . "," .$db_sit_middlename . " " . $db_sit_firstname.'</td>
                            <td>' . $db_sit_address .'</td>
                            <td>' . $db_sit_contact_num .'</td>
                            <td>' . $db_sit_birthdate .'</td>
                            <td>' . $db_sit_birthplace .'</td>
                            <td>' . $db_sit_gender .'</td>
                            <td>' . $db_sit_civil_status .'</td>
                            <td>' . $db_sit_license .'</td>
                            <td>' . $db_sit_license_expiredate .'</td>
                            <td>' . $db_sit_time . " " . $db_sit_date .'</td>
                            <td class="yot-flex yot-flex-ai-c-jc-sb">
                                <i class="fa-solid fa-eye  yot-text-fs-l yot-cursor-pointer yot-active" id="view" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-mlr-8" id="edit" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active" id="delete" data-id=' . $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }else if($this->searchName == "" || $this->startDate == "" || $this->endDate == ""){
            $query = " SELECT * FROM staff_info_tbl WHERE sit_role_name ='OPE'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $db_sit_id = $row["sit_id"];
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
                    $db_sit_license_expiredate = $row["sit_license_expiredate"];
                    $db_sit_time = $row["sit_time"];
                    $db_sit_date = $row["sit_date"];
    
                    echo'
                        <tr>
                            <td>' . $db_sit_role_name .'</td>
                            <td>' . $db_sit_surname . "," .$db_sit_middlename . " " . $db_sit_firstname.'</td>
                            <td>' . $db_sit_address .'</td>
                            <td>' . $db_sit_contact_num .'</td>
                            <td>' . $db_sit_birthdate .'</td>
                            <td>' . $db_sit_birthplace .'</td>
                            <td>' . $db_sit_gender .'</td>
                            <td>' . $db_sit_civil_status .'</td>
                            <td>' . $db_sit_license .'</td>
                            <td>' . $db_sit_license_expiredate .'</td>
                            <td>' . $db_sit_time . " " . $db_sit_date .'</td>
                            <td class="yot-flex yot-flex-ai-c-jc-sb">
                                <i class="fa-solid fa-eye  yot-text-fs-l yot-cursor-pointer yot-active" id="view" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-mlr-8" id="edit" data-id='. $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                                <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active" id="delete" data-id=' . $db_sit_id .' data-role-name=' . $db_sit_role_name .'></i>
                            </td>
                        </tr>
                    ';
                }
            }
        }
    }
}
?>