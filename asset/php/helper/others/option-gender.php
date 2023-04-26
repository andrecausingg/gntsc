<?php
    class classGender{
        function __construct($gender){
            $this->gender = $gender;
        }

        function getGender(){
            if($this->gender == "MALE"){
                echo '<option value="MALE" selected>Male</option>';
                echo '<option value="FEMALE" >Female</option>';
            }else if($this->gender == "FEMALE"){
                echo '<option value="MALE">Male</option>';
                echo '<option value="FEMALE" selected>Female</option>';
            }
        }
    }
?>