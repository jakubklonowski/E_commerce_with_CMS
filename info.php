<?php include './reusable/header.php'; ?>
    <body>
        <?php include './reusable/navbar.php';
            include './config/config.php'; ?>

        <h1>Hello Admin - Info Panel</h1>

        <div class="row">
            <section class="col-md-3 col-sm-6">
                <h2>Most recent order</h2>
                <?php 
                    $query="SELECT ID, Date FROM orders ORDER BY Date DESC LIMIT 1";
                    $res = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $result = $row;
                    }
                    echo "<p>Most recent order - ID: ".$result['ID'].", date: ".$result['Date']."</p>";
                    echo "Content of that order:";
                    echo "<ul>";
                        $query="SELECT Name, Quantity
                                FROM products
                                INNER JOIN (orders_positions
                                            INNER JOIN orders ON orders.ID=orders_positions.ID_order
                                            AND orders.ID=".$result['ID'].")
                                        ON orders_positions.ID_product=products.ID";
                        $res = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<li>".$row['Quantity']." pcs of ".$row['Name']."</li>";
                        }
                    echo "</ul>";
                ?>
            </section>

            <section class="col-md-3 col-sm-6">
                <h2>Most popular products</h2>
                <?php 
                    $query="SELECT SUM(Quantity) AS 'howmany', ID_product, Name
                            FROM orders_positions
                            INNER JOIN products ON orders_positions.ID_product=products.ID
                            GROUP BY ID_product
                            ORDER BY howmany DESC
                            LIMIT 1";
                    $res = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $result = $row;
                    }
                    echo "Most popular product is ".$result['Name']." (ID: ".$result['ID_product'].") which was sold ".$result['howmany']." times.";
                ?>
            </section>

            <section class="col-md-3 col-sm-6">
                <h2>section 3</h2>
                <?php 
                    
                ?>
            </section>

            <section class="col-md-3 col-sm-6">
                <h2>section 4</h2>
                <?php 
                    
                ?>
            </section>
        </div>

        <?php include './reusable/footer.php'; ?>
    </body>
</html>