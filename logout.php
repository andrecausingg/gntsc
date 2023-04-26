<?php
    session_start();
    unset($_SESSION['u_id']);
    session_unset();
    session_destroy();
    header('Refresh: 1;url=index');
    exit();
?>