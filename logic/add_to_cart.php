<?php
    session_start();
    
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $ID = $_POST['ID'];
    $quantity = $_POST['quantity'];
    if (isset($_SESSION['cart_products']) && isset($_SESSION['cart_quantity'])) {
        if (is_array($_SESSION['cart_products']) && is_array($_SESSION['cart_quantity'])) {
            array_push($_SESSION['cart_products'], $ID);
            array_push($_SESSION['cart_quantity'], $quantity);
            header("location:../article.php?ID=".$ID);
        }
    }
    else {
        $_SESSION['cart_products']=array($ID);
        $_SESSION['cart_quantity']=array($quantity);
        header("location:../article.php?ID=".$ID);
    }
?>