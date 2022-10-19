<?php
    session_start();

    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if (array_key_exists('del', $_POST)) {
        $i = $_POST['ID'];
        delete_cart_item($i);
        header("location:../cart.php");
    }
    else if (array_key_exists('order', $_POST)) {
        place_order();
        header("location:../cart.php");
    }

    function place_order() {
        require '../config/config.php';
        
        if (isset($_SESSION['ID'])) {
            // orders table - order created
            $query="INSERT INTO orders (ID_client) VALUES (\"".$_SESSION['ID']."\")";
            mysqli_query($link, $query);
        }
        else {
            // orders table - order created for unregistered user
            $query="INSERT INTO orders (ID_client) VALUES (\"005\")";
            mysqli_query($link, $query);
        }

        // get last order (the one just made) number
        $query="SELECT ID FROM orders WHERE ID_client = 1 ORDER BY ID DESC LIMIT 1";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $ID_order = $row['ID'];
        }

        // orders_positions - what products are part of order
        $j = 0;
        $quantity = $_SESSION['cart_quantity'];
        foreach ($_SESSION['cart_products'] as $product) {
            $query="INSERT INTO orders_positions (ID_order, ID_product, Quantity) VALUES ($ID_order, ".$product.", ".$quantity[$j].")";
            mysqli_query($link, $query);
            $j++;
        }
        
        // unset ordered cart
        unset($_SESSION['cart_products']);
        unset($_SESSION['cart_quantity']);
    }

    function delete_cart_item($i) {
        $products = $_SESSION['cart_products'];
        $quantities = $_SESSION['cart_quantity'];
        unset($products[$i]);
        unset($quantities[$i]);
    }
?>