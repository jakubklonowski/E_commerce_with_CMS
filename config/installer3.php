<?php
    session_start();

    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $email=$_POST['admin-email'];
    $name=$_POST['admin-name'];
    $pwd=$_POST['admin-pwd'];
    $link=$_SESSION['link'];

    $password=password_hash($pwd, DEFAULT_PASSWORD);
    
    $query=$link->prepare("INSERT INTO users (Email, Password, Name, Admin, Active) VALUES (?, ?, ?, 1, 1)");
    $query->bind_param("sss", $email, $password, $name);
    $query->execute();
    echo "Admin account created successfully!";
?>