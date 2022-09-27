<?php
    session_start();
    $_SESSION['wrong_reg']=false;
    $_SESSION['pwd_diff']=false;

    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include '../config/config.php';

    if ($_POST['password'] === $_POST['password2']) {
        $password=password_hash($_POST['password']);
        $query="INSERT INTO clients (Login, Password, Name, Active) VALUES (".$_POST['email'].", ".$password.", ".$_POST['name'].", 0)";
        $result=mysqli_query($link, $query);
        if ($result) {
            header("location:../login.php");
        }
        else {
            $_SESSION['wrong_reg']=true;
            header("location:../register.php");
        }
    }
    else {
        $_SESSION['pwd_diff']=true;
        header("location:../register.php");
    }
   

?>