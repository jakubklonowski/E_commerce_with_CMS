<?php include './reusable/header.php'; ?>
    <body>
        <?php include './reusable/navbar.php';
            $products = $_SESSION['cart_products'];
            $quantities = $_SESSION['cart_quantity'];

            echo "<br><form class=\"container text-center\" action=\"./logic/cart.php\" method=\"POST\">";
            for ($i=0; $i < count($products); $i++) {
                echo "<div class=\"row\">";
                    echo "<div class=\"col-sm-10 col-md-8 col-lg-6 cart-product-form\"><button type=\"submit\" name=\"del\"><img class=\"btn-del-cart-item\" src=\"./static/delete.png\"></button>";
                    echo "&nbsp;<a href=\"#\">Product ID: ".$products[$i]."</a>&nbsp;";
                    echo "<input type=\"number\" value=\"".$products[$i]."\" name=\"ID\" hidden>";
                    echo "<input type=\"number\" class=\"form-control cart-item-quan\" value=\"".$quantities[$i]."\" name=\"quantity\"></div>";
                echo "</div><br>";
            }
                echo "<button class=\"btn btn-primary\" type=\"submit\" name=\"order\">Order</button>";
            echo "</form>";
        ?>

        <?php include './reusable/footer.php'; ?>
    </body>
</html>