<?php
    session_start();
    $_SESSION['logged_in']=false;
    $_SESSION['wrong_log']=false;
    
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include '../config/config.php';

    $query="SELECT * FROM `clients` WHERE Email=\"".$_POST['email']."\" AND Active=\"1\"";
    $results=mysqli_query($link, $query);
    if (mysqli_num_rows($results) === 1) {
        while ($row = mysqli_fetch_assoc($results)) {
            $result = $row['Password'];
        }
        if (password_verify($_POST['password'], $result)) {
            $_SESSION['logged_in']=true;
            header("location:../x.php");
        }
        else {
            $_SESSION['wrong_log']=true;
            header("location:../login.php");
        }
    }
    else if (mysqli_num_rows($results) > 1) {
        $_SESSION['wrong_log']=true;
        header("location:../login.php");
    }
    else { // mysqli_num_rows($results) < 1
        $_SESSION['wrong_log']=true;
        header("location:../login.php");
    }
?>