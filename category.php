<?php include './reusable/header.php'; ?>
    <body>
        <?php 
            include './reusable/navbar.php';    
            echo "<h1>".$_GET['cat']."</h1>";
            
            echo '<div class="row">';
                include './reusable/shop_sidenav.php';
                echo '<div class="col-md-10 col-sm-12">';
                    $query = "SELECT * FROM products WHERE Category=\"".$_GET['cat']."\"";
                    $result = mysqli_query($link, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<div class=\"row\">"; 
                        foreach ($result as $product) {
                            include './reusable/product_card.php';
                        }
                        echo "</div>";
                    } 
                    else {
                        // echo "0 results";
                    }
                echo '</div>';
            echo '</div>';
        ?>
        
        <?php include './reusable/footer.php'; ?>
    </body>
</html>