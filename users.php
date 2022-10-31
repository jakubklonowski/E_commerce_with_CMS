<?php include './reusable/header.php'; ?>
    <body>
        <?php include './reusable/navbar.php';
            include './config/config.php'; ?>

            <h1>Hello Admin - Users Panel</h1>

            <div class="row wysrodkowanie">
                <div class="col-1"></div>
                <section class="col-5">
                <h2>List of admins</h2>
                    <?php
                        $query=$link->prepare("SELECT ID, Email, Name, Active FROM users WHERE Admin=1");
                        $query->execute();
                        $result=$query->get_result();
                        echo "<table><tr><th>ID</th><th>Email</th><th>Name</th><th>Active</th>";
                        foreach ($result as $user) {
                            echo "<tr><td>".$user['ID']."</td><td>".$user['Email']."</td><td>".$user['Name']."</td><td>".$user['Active']."</td></tr>";
                        }
                        echo "</table>";
                    ?>
                    <h2>List of users</h2>
                    <?php
                        $query=$link->prepare("SELECT ID, Email, Name, Active FROM users WHERE Admin=0");
                        $query->execute();
                        $result=$query->get_result();
                        echo "<table><tr><th>ID</th><th>Email</th><th>Name</th><th>Active</th>";
                        foreach ($result as $user) {
                            echo "<tr><td>".$user['ID']."</td><td>".$user['Email']."</td><td>".$user['Name']."</td><td>".$user['Active']."</td></tr>";
                        }
                        echo "</table>";
                    ?>
                </section>

                <section class="col-5">
                    <h2>User activation and admin rights</h2>
                    <form action="./logic/users.php" method="POST">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="floatingID" placeholder="ID" name="ID" required min=1><br>
                            <label for="floatingID">ID</label>
                        </div>
                        <button name="admin" class="btn btn-warning">Give admin rights</button>
                        <button name="deadmin" class="btn btn-danger">Revoke admin rights</button><br><br>
                        <button name="activate" class="btn btn-success">Activate</button>
                        <button name="deactivate" class="btn btn-danger">Deactivate</button>
                    </form>
                </section>
            </div>

        <?php include './reusable/footer.php'; ?>
    </body>
</html>