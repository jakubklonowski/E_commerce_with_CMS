<?php include './reusable/header.php'; ?>
    <body>
        <?php 
            include './reusable/navbar.php';
            include './config/config.php';

            $query=$link->prepare("SELECT Name, Quantity 
                    FROM products 
                    INNER JOIN (orders_positions 
                                INNER JOIN orders ON orders.ID=orders_positions.ID_order 
                                AND orders.ID=?) 
                            ON orders_positions.ID_product=products.ID");
            $query->bind_param("i", $_GET['ID']);
            $query->execute();
            $result = $query->get_result();

            echo "<table class=\"wysrodkowanie\"><tr><th>No.</th><th>Product</th><th>Quantity</th></tr>";
            $i=1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$i."</td><td>".$row['Name']."</td><td>".$row['Quantity']."</td></tr>";
                $i++;
            }
            echo "</table>";
        ?>

        <?php include './reusable/footer.php'; ?>
    </body>
</html>