<?php
    session_start();
    
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    session_destroy();
    header("location:../index.php");
    exit;
?>