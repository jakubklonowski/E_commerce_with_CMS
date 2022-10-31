<?php include './reusable/header.php'; ?>
    <body>
        <?php include './reusable/navbar.php';
            $products = $_SESSION['cart_products'];
            $quantities = $_SESSION['cart_quantity'];

            echo "<br><form class=\"row wysrodkowanie\" action=\"./logic/cart.php\" method=\"POST\">";
            for ($i=0; $i < count($products); $i++) {
                echo "<div class=\"cart-product-form\"><button name=\"del\"><img class=\"btn-del-cart-item\" src=\"./static/delete.png\"></button>";
                    // echo "<img class=\"btn-del-cart-item\" src=\"".$."\">";
                    echo "&nbsp;<a href=\"#\">Product ID: ".$products[$i]."</a>&nbsp;";
                    echo "<input type=\"number\" class=\"form-control cart-item-quan\" value=\"".$quantities[$i]."\" name=\"quantity\">";
                    echo "<input type=\"number\" value=\"".$products[$i]."\" name=\"ID\" hidden>";
                echo "</div><br>";
            }
                echo "<button class=\"btn btn-success col-sm-4 col-md-1\" name=\"order\">Order</button>";
            echo "</form>";
        ?>

        <?php include './reusable/footer.php'; ?>
    </body>
</html>