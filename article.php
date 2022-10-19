<?php include './reusable/header.php'; ?>
    <body>
        <?php 
            include './reusable/navbar.php';
            include './config/config.php';

            echo "<div class=\"row\">";
            include './reusable/shop_sidenav.php';
            
            $query="SELECT * FROM products WHERE ID=".$_GET['ID'].";";
            $result=mysqli_query($link, $query);
            if (mysqli_num_rows($result) === 1) {
                while ($row = mysqli_fetch_assoc($result)) {
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
            else if (mysqli_num_rows($result) > 1) {
                echo "<p>An error occured! Try again later!</p>";
            }
            else { // (mysqli_num_rows($result) < 1)
                echo "<p>An error occured! Try again later!</p>";
            }
            echo "</div>";
        ?>
        
        <?php include './reusable/footer.php'; ?>
    </body>
</html>