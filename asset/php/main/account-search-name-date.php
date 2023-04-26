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
            $query = " SELECT * FROM user_tbl WHERE u_datee BETWEEN '$searchStartDate' AND '$searchEndDate' AND (u_last_name LIKE '%".$search."%' OR u_middle_name LIKE '%".$search."%' OR u_first_name LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                $db_u_username = $row["u_username"];
                $db_u_password = $row["u_password"];
                $db_u_time = $row["u_time"];
                $db_u_date = $row["u_date"];

                $password = str_repeat("*", strlen($db_u_password)); 

                echo'
                    <tr>
                        <td>' . $db_u_last_name .", " . $db_u_middle_name . " " . $db_u_first_name .'</td>
                        <td>' . $db_u_username .'</td>
                        <td>' . $password .'</td>
                        <td>' . $db_u_time .'</td>
                        <td>' . $db_u_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_u_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_u_id .'></i>
                        </td>
                    </tr>
                ';
                }
            }
        }else if($this->searchName != "" && $this->startDate !=""){
            $query = " SELECT * FROM user_tbl WHERE u_datee = '$searchStartDate' AND (u_last_name LIKE '%".$search."%' OR u_middle_name LIKE '%".$search."%' OR u_first_name LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                $db_u_username = $row["u_username"];
                $db_u_password = $row["u_password"];
                $db_u_time = $row["u_time"];
                $db_u_date = $row["u_date"];

                $password = str_repeat("*", strlen($db_u_password)); 

                echo'
                    <tr>
                        <td>' . $db_u_last_name .", " . $db_u_middle_name . " " . $db_u_first_name .'</td>
                        <td>' . $db_u_username .'</td>
                        <td>' . $password .'</td>
                        <td>' . $db_u_time .'</td>
                        <td>' . $db_u_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_u_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_u_id .'></i>
                        </td>
                    </tr>
                ';
                }
            }
        }else if($this->searchName != "" && $this->endDate !=""){
            $query = " SELECT * FROM user_tbl WHERE u_datee = '$searchEndDate' AND (u_last_name LIKE '%".$search."%' OR u_middle_name LIKE '%".$search."%' OR u_first_name LIKE '%".$search."%')";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                $db_u_username = $row["u_username"];
                $db_u_password = $row["u_password"];
                $db_u_time = $row["u_time"];
                $db_u_date = $row["u_date"];

                $password = str_repeat("*", strlen($db_u_password)); 

                echo'
                    <tr>
                        <td>' . $db_u_last_name .", " . $db_u_middle_name . " " . $db_u_first_name .'</td>
                        <td>' . $db_u_username .'</td>
                        <td>' . $password .'</td>
                        <td>' . $db_u_time .'</td>
                        <td>' . $db_u_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_u_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_u_id .'></i>
                        </td>
                    </tr>
                ';
                }
            }
        }else if($this->startDate !="" && $this->endDate != ""){
            $query = " SELECT * FROM user_tbl WHERE u_datee BETWEEN '$searchStartDate' AND '$searchEndDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                $db_u_username = $row["u_username"];
                $db_u_password = $row["u_password"];
                $db_u_time = $row["u_time"];
                $db_u_date = $row["u_date"];

                $password = str_repeat("*", strlen($db_u_password)); 

                echo'
                    <tr>
                        <td>' . $db_u_last_name .", " . $db_u_middle_name . " " . $db_u_first_name .'</td>
                        <td>' . $db_u_username .'</td>
                        <td>' . $password .'</td>
                        <td>' . $db_u_time .'</td>
                        <td>' . $db_u_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_u_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_u_id .'></i>
                        </td>
                    </tr>
                ';
                }
            }
        }else if($this->searchName != ""){
            $query = " SELECT * FROM user_tbl WHERE u_last_name LIKE '%".$search."%' OR u_middle_name LIKE '%".$search."%' OR u_first_name LIKE '%".$search."%'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                $db_u_username = $row["u_username"];
                $db_u_password = $row["u_password"];
                $db_u_time = $row["u_time"];
                $db_u_date = $row["u_date"];

                $password = str_repeat("*", strlen($db_u_password)); 

                echo'
                    <tr>
                        <td>' . $db_u_last_name .", " . $db_u_middle_name . " " . $db_u_first_name .'</td>
                        <td>' . $db_u_username .'</td>
                        <td>' . $password .'</td>
                        <td>' . $db_u_time .'</td>
                        <td>' . $db_u_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_u_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_u_id .'></i>
                        </td>
                    </tr>
                ';
                }
            }
        }else if($this->startDate !=""){
            $query = " SELECT * FROM user_tbl WHERE u_datee = '$searchStartDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                $db_u_username = $row["u_username"];
                $db_u_password = $row["u_password"];
                $db_u_time = $row["u_time"];
                $db_u_date = $row["u_date"];

                $password = str_repeat("*", strlen($db_u_password)); 

                echo'
                    <tr>
                        <td>' . $db_u_last_name .", " . $db_u_middle_name . " " . $db_u_first_name .'</td>
                        <td>' . $db_u_username .'</td>
                        <td>' . $password .'</td>
                        <td>' . $db_u_time .'</td>
                        <td>' . $db_u_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_u_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_u_id .'></i>
                        </td>
                    </tr>
                ';
                }
            }
        }else if($this->endDate != ""){
            $query = " SELECT * FROM user_tbl WHERE u_datee '$searchEndDate'";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                $db_u_username = $row["u_username"];
                $db_u_password = $row["u_password"];
                $db_u_time = $row["u_time"];
                $db_u_date = $row["u_date"];

                $password = str_repeat("*", strlen($db_u_password)); 

                echo'
                    <tr>
                        <td>' . $db_u_last_name .", " . $db_u_middle_name . " " . $db_u_first_name .'</td>
                        <td>' . $db_u_username .'</td>
                        <td>' . $password .'</td>
                        <td>' . $db_u_time .'</td>
                        <td>' . $db_u_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_u_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_u_id .'></i>
                        </td>
                    </tr>
                ';
                }
            }
        }else if($this->searchName == "" || $this->startDate == "" || $this->endDate == ""){
            $query = " SELECT * FROM user_tbl";
            $result = mysqli_query($classDataBaseConnection->connect(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                $db_u_id = $row["u_id"];
                $db_u_last_name = $row["u_last_name"];
                $db_u_middle_name = $row["u_middle_name"];
                $db_u_first_name = $row["u_first_name"];
                $db_u_username = $row["u_username"];
                $db_u_password = $row["u_password"];
                $db_u_time = $row["u_time"];
                $db_u_date = $row["u_date"];

                $password = str_repeat("*", strlen($db_u_password)); 

                echo'
                    <tr>
                        <td>' . $db_u_last_name .", " . $db_u_middle_name . " " . $db_u_first_name .'</td>
                        <td>' . $db_u_username .'</td>
                        <td>' . $password .'</td>
                        <td>' . $db_u_time .'</td>
                        <td>' . $db_u_date .'</td>
                        <td class="yot-flex">
                            <i class="fa-solid fa-file-pen  yot-text-fs-l yot-cursor-pointer yot-active yot-pr-8" id="edit" data-id='. $db_u_id .'></i>
                            <i class="fa-solid fa-trash yot-text-fs-l yot-cursor-pointer yot-active yot-pl-8" id="delete" data-id=' . $db_u_id .'></i>
                        </td>
                    </tr>
                ';
                }
            }
        }
    }
}
?>