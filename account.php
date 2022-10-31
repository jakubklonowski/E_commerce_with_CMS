<?php include './reusable/header.php'; ?>
    <body>
        <?php include './reusable/navbar.php';
            include './config/config.php';

            echo "<h1>Hello&nbsp;".$_SESSION['Name']."</h1>";
            
            // history of orders table
            echo "<h2>Orders history</h2>";
            echo "<table class=\"wysrodkowanie\"><tr><th>No.</th><th>Order ID</th><th>Date</th></tr>";
            $query=$link->prepare("SELECT ID, Date FROM orders WHERE ID_client=?");
            $query->bind_param("i", $_SESSION['ID']);
            $query->execute();
            $result = $query->get_result();
            $i=1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$i."</td><td><a href=\"order.php?ID=".$row['ID']."\">".$row['ID']."</a></td><td>".$row['Date']."</td></tr>";
                $i++;
            }
            echo "</table>";
        ?>
        
        <?php include './reusable/footer.php'; ?>
    </body>
</html>