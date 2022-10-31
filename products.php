<?php include './reusable/header.php'; ?>
    <body>
        <?php include './reusable/navbar.php';
            include './config/config.php'; ?>

        <h1>Hello Admin - Products Panel</h1>
        <div class="row wysrodkowanie">

            <section class="col-md-4 col-sm-12">
                <h2>List of products</h2>
                <?php
                    $query=$link->prepare("SELECT ID, Name, Recommended, Category FROM products");
                    $query->execute();
                    $result = $query->get_result();
                    echo "<table><tr><th>ID</th><th>Name</th><th>Recommended</th><th>Category</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row['ID']."</td><td>".$row['Name']."</td><td>".$row['Recommended']."</td><td>".$row['Category']."</td></tr>";
                    }
                    echo "</table>";
                ?>
            </section>

            <section class="col-md-4 col-sm-12">
                <h2>Manage products</h2><br>

                <form action="./logic/product.php" method="POST">

                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingID" placeholder="ID" name="ID" required min=1><br>
                        <label for="floatingID">ID</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Name" name="Name"><br>
                        <label for="floatingName">Name</label>
                    </div>

                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingPrice" placeholder="Price" name="Price"><br>
                        <label for="floatingPrice">Price</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingShort" placeholder="Short description" name="Short_desc"><br>
                        <label for="floatingShort">Short description</label>
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" id="floatingLong" placeholder="Long description" name="Long_desc"></textarea><br>
                        <label for="floatingLong">Long description</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingCover" placeholder="Cover link" name="Cover_link"><br>
                        <label for="floatingCover">Cover link</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingCategory" placeholder="Category" name="Category"><br>
                        <label for="floatingCategory">Category</label>
                    </div>

                    <button name="add" class="btn btn-success">Add</button>
                    <button name="mod" class="btn btn-warning">Modify</button>
                    <button name="del" class="btn btn-danger">Delete</button>
                </form>
            </section>

            <section class="col-md-4 col-sm-12">
                <h2>Recommended products</h2><br>
                <form action="./logic/recommend.php" method="POST" class="form-floating">
                    <input type="number" class="form-control" id="floatingID" placeholder="Product ID" name="ID" required min=1>
                    <label for="floatingID">Product ID</label><br>
                    <button name="rec" class="btn btn-success">Recommend</button>
                    <button name="der" class="btn btn-danger">Don't recommend</button>
                </form>
            </section>
        </div>
        <?php include './reusable/footer.php'; ?>
    </body>
</html>