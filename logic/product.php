<?php
    session_start();

    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if (array_key_exists('add', $_POST)) {
        addProduct();
        header("location:../products.php");
    }
    else if (array_key_exists('mod', $_POST)) {
        modifyProduct();
        header("location:../products.php");
    }
    else if (array_key_exists('del', $_POST)) {
        deleteProduct();
        header("location:../products.php");
    }

    function addProduct() {
        include '../config/config.php';

        $Name = $_POST['Name'];
        $Price = $_POST['Price'];
        $Short_desc = $_POST['Short_desc'];
        $Long_desc = $_POST['Long_desc'];
        $Cover_link = $_POST['Cover_link'];
        $Category = $_POST['Category'];

        $query=$link->prepare("INSERT INTO products (Price, Name, DescriptionShort, DescriptionLong, Cover, Category) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param("isssss", $Price, $Name, $Short_desc, $Long_desc, $Cover_link, $Category);
        $query->execute();
    }

    function modifyProduct() {
        include '../config/config.php';

        $ID = $_POST['ID'];
        $Name = $_POST['Name'];
        $Price = $_POST['Price'];
        $Short_desc = $_POST['Short_desc'];
        $Long_desc = $_POST['Long_desc'];
        $Cover_link = $_POST['Cover_link'];
        $Category = $_POST['Category'];

        $query=$link->prepare("UPDATE products SET Price=?, Name=?, DescriptionShort=?, DescriptionLong=?, Cover=?, Category=? WHERE ID=?");
        $query->bind_param("isssssi", $Price, $Name, $Short_desc, $Long_desc, $Cover_link, $Category, $ID);
        $query->execute();
    }

    function deleteProduct() {
        include '../config/config.php';

        $ID = $_POST['ID'];
        
        $query=$link->prepare("DELETE FROM products WHERE ID=?");
        $query->bind_param("i", $ID);
        $query->execute();
    }
?>