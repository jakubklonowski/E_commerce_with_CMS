<?php
    session_start();
    $_SESSION['logged_in']=false;
    $_SESSION['admin']=false;
    $_SESSION['wrong_log']=false;
    
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include '../config/config.php';

    $query="SELECT * FROM `users` WHERE Email=\"".$_POST['email']."\" AND Active=\"1\"";
    $results=mysqli_query($link, $query);
    if (mysqli_num_rows($results) == 1) {
        while ($row = mysqli_fetch_assoc($results)) {
            $password = $row['Password'];
            $admin = $row['Admin'];
            $_SESSION['ID']=$row['ID'];
            $_SESSION['Name']=$row['Name'];
        }
        if (password_verify($_POST['password'], $password)) {
            if ($admin) { // admin
                $_SESSION['logged_in']=true;
                $_SESSION['admin']=true;
                $_SESSION['email']=$_POST['email'];
                header("location:../admin.php");
            }
            else { // user 
                $_SESSION['logged_in']=true;
                $_SESSION['admin']=false;
                $_SESSION['email']=$_POST['email'];
                header("location:../shop.php");
            }
        }
        else {
            $_SESSION['wrong_log']=true;
            header("location:../login.php");
        }
    }
    else {
        $_SESSION['wrong_log']=true;
        header("location:../login.php");
    }
?>