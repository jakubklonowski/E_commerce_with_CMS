<?php
    session_start();

    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $ID=$_POST['ID'];

    if (array_key_exists('rec', $_POST)) {
        recommendProduct($ID);
        header("location:../products.php");
    }
    else if (array_key_exists('der', $_POST)) {
        derecommendProduct($ID);
        header("location:../products.php");
    }

    function recommendProduct($i) {
        require '../config/config.php';

        $query=$link->prepare("UPDATE products SET Recommended=1 WHERE ID=?");
        $query->bind_param("i", $i);
        $query->execute();
    }

    function derecommendProduct($i) {
        require '../config/config.php';
        
        $query=$link->prepare("UPDATE products SET Recommended=0 WHERE ID=?");
        $query->bind_param("i", $i);
        $query->execute();
    }
?>