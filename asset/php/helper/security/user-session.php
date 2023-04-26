<?php
    class classSecurity{
        function sessionSecurity(){
            require_once("./asset/php/main/login.php");

            if(!isset($_SESSION["u_id"])){
                echo "<script>window.location.href='404';</script>";
            }
        }   
    }
?>