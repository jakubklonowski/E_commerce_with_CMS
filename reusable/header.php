<?php 
    session_start();
    $_SESSION['logged_in']=false;
    
    ini_set('display_errors', 1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="model kits, hobby">
    <meta name="description" content="E-commerce PHP project">
    <meta name="author" content="jakubpklonowski@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/static/style.css" rel="stylesheet">
    <title>Best shop | Model kits</title>
</head>
