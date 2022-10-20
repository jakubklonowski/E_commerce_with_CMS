<?php include './reusable/header.php'; ?>
    <body>
        <?php 
            include './reusable/navbar.php';
            include './config/config.php';

            echo "<div class=\"row\">";
            include './reusable/shop_sidenav.php';
            
            $query=$link->prepare("SELECT * FROM products WHERE ID=?;");
            $query->bind_param("i", $_GET['ID']);
            $query->execute();
            $result = $query->get_result();

            $query2=$link->prepare("SELECT COUNT(ID) FROM products WHERE ID=?;");
            $query2->bind_param("i", $_GET['ID']);
            $query2->execute();
            $result2 = $query2->get_result();

            if ($result2 == 1) {
                while ($row = $result->fetch_assoc()) {
                    $res = $row;
                }
                echo "<form action=\"./logic/add_to_cart.php\" method=\"POST\" class=\"col-md-10 col-sm-12 wysrodkowanie\">";
                    echo "<h1>".$res['Name']."</h1><br>";
                    echo "<img src=\"".$res['Cover']."\"><br>";
                    echo "<p>ID:&nbsp;".$res['ID']."</p><br>";
                    echo "<input class=\"display-none\" type=\"number\" name=\"ID\" value=\"".$res['ID']."\">";
                    echo "<input type=\"number\" name=\"quantity\" min=\"1\" value=\"1\">&nbsp;<button type=\"submit\" class=\"btn btn-primary\">Add to cart</button><br>";
                    echo "<p>".$res['DescriptionLong']."</p>";
                echo "</form>";
            }
            else {
                echo "<p>An error occured! Try again later!</p>";
            }
            echo "</div>";
        ?>
        
        <?php include './reusable/footer.php'; ?>
    </body>
</html>