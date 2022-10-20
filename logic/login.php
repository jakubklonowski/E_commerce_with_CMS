<?php
    session_start();
    $_SESSION['logged_in']=false;
    $_SESSION['admin']=false;
    $_SESSION['wrong_log']=false;
    
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include '../config/config.php';

    $query=$link->prepare("SELECT * FROM `users` WHERE Email= ? AND Active=\"1\"");
    $query->bind_param("s", $_POST['email']);
    $query->execute();
    $result = $query->get_result();

    $query2=$link->prepare("SELECT COUNT(ID) FROM `users` WHERE Email= ? AND Active=\"1\"");
    $query2->bind_param("s", $_POST['email']);
    $query2->execute();
    $results2 = $query2->get_result();

    if ($results2 == 1) {
        while ($row = $result->fetch_assoc()) {
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