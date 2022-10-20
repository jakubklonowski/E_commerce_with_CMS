<?php include './reusable/header.php'; ?>
    <body>
        <?php 
            include './reusable/navbar.php';    
            echo "<h1>".$_GET['cat']."</h1>";
            
            echo '<div class="row">';
                include './reusable/shop_sidenav.php';
                echo '<div class="col-md-10 col-sm-12">';
                    $query = $link->prepare("SELECT * FROM products WHERE Category=?");
                    $query->bind_param("s", $_GET['cat']);
                    $query->execute();
                    $result = $query->get_result();

                    $query2 = $link->prepare("SELECT COUNT(ID) FROM products WHERE Category=?");
                    $query2->bind_param("s", $_GET['cat']);
                    $query2->execute();
                    $result2 = $query2->get_result();

                    if ($result2 > 0) {
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