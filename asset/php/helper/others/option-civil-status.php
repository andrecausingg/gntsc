<?php
    class classCiviStatus{
        function __construct($civiStatus){
            $this->civiStatus = $civiStatus;
        }

        function getciviStatus(){
            if($this->civiStatus == "SINGLE"){
                echo '<option value="SINGLE" selected>Single</option>';
                echo '<option value="MARRIED">Married</option>';
                echo '<option value="WIDOW">Widow</option>';
                echo '<option value="SEPERATED">Seperated</option>';
            }else if($this->civiStatus == "MARRIED"){
                echo '<option value="SINGLE">Single</option>';
                echo '<option value="MARRIED" selected>Married</option>';
                echo '<option value="WIDOW">Widow</option>';
                echo '<option value="SEPERATED">Seperated</option>';
            }else if($this->civiStatus == "WIDOW"){
                echo '<option value="SINGLE">Single</option>';
                echo '<option value="MARRIED">Married</option>';
                echo '<option value="WIDOW" selected>Widow</option>';
                echo '<option value="SEPERATED">Seperated</option>';
            }else if($this->civiStatus == "SEPERATED"){
                echo '<option value="SINGLE">Single</option>';
                echo '<option value="MARRIED">Married</option>';
                echo '<option value="WIDOW">Widow</option>';
                echo '<option value="SEPERATED" selected>Seperated</option>';
            }
        }
    }
?>