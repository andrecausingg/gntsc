<?php
    $classUserSession = new classUserSession();
    $classUserSession->userSession();

    class classUserSession{
        function userSession(){
            require_once('../../main/login.php');

            if(isset($_SESSION["u_id"])){
                echo $_SESSION["u_id"];
            }
        }
    }
?>