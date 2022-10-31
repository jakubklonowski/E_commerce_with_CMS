<?php include './reusable/header.php'; ?>
    <body>
        <?php include './reusable/navbar.php';
            include './config/config.php';
        ?>

        <br><div class="row">
        <div class="col-1"></div>
        <div class="col-10"><img id="index-banner" src="./static/index.jpg"></div>
        <div class="col-1"></div>
        </div><br><br>

        <div class="row">
            <div class="col-1"></div>
            <section class="col-5">
                <h2>Recommended</h2><br>
                <?php 
                    $query=$link->prepare("SELECT ID, Name, Price, Cover FROM products WHERE Recommended=1");
                    $query->execute();
                    $result = $query->get_result();
                    foreach ($result as $item) {
                        echo "<p><a href=\"\\article.php?ID=".$item['ID']."\"><img class=\"recommend-img\" src=\"".$item['Cover']."\">&nbsp;".$item['Name']."&nbsp;".$item['Price']."$</a></p>";
                    }
                ?>
            </section>

            <section class="col-5">
                <h2>Last shipment</h2>
            </section>
            <div class="col-1"></div>
        </div>

        <?php include './reusable/footer.php'; ?>
    </body>
</html>