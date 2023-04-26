<?php
    class classDateAndTime{
        // Date
        function dateNowF(){
            // Set the Date
            date_default_timezone_set("Asia/Manila");
            $dateNow = date('j/m/Y');
            return $dateNow;
        }

        // TIme
        function timeNowF(){
            // Set the Time
            date_default_timezone_set("Asia/Manila");
            $timeNow = date('g:i:s:a');
            return $timeNow;
        }
    }
?>