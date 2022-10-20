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
            $query=$link->prepare("INSERT INTO orders (ID_client) VALUES (?)");
            $query->bind_param("i", $_SESSION['ID']);
            $query->execute();
        }
        else {
            // orders table - order created for unregistered user
            $query=$link->prepare("INSERT INTO orders (ID_client) VALUES (?)");
            $query->bind_param("i", $x);
            $x=005;
            $query->execute();
        }

        // get last order (the one just made) number
        $query=$link->prepare("SELECT ID FROM orders WHERE ID_client = ? ORDER BY ID DESC LIMIT 1");
        $query->bind_param("i", $_SESSION['ID']);
        $query->execute();
        $result = $query->get_result();
        while ($row = $result->fetch_assoc()) {
            $ID_order = $row['ID'];
            echo "->".$ID_order;
        }

        // orders_positions - what products are part of order
        $j = 0;
        $quantity = $_SESSION['cart_quantity'];
        foreach ($_SESSION['cart_products'] as $product) {
            $query=$link->prepare("INSERT INTO orders_positions (ID_order, ID_product, Quantity) VALUES (?, ?, ?)");
            $query->bind_param("iii", $ID_order, $product, $quantity[$j]);
            $query->execute();
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