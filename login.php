<?php include './reusable/header.php'; ?>
    <body>
        <?php include './reusable/navbar.php'; ?>
        
        <form action="./logic/login.php" method="POST">
            <div id="img-avatar-container">
                <img src="/static/img_avatar2.png" alt="Avatar" id="img-avatar">
            </div><br>

            <div class="form-floating">
                <input type="email" name="email" class="form-control fc-reg" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="label-reg">E-mail address</label>
            </div><br>

            <div class="form-floating">
                <input type="password" name="password" class="form-control fc-reg" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword" class="label-reg">Password</label>
            </div><br>

            <button type="submit" class="btn btn-primary" id="btn-reg">Sign in</button>
        </form>

        <?php 
            if ($_SESSION['wrong_log']) {
                echo "<br><p class=\"wrong-log-reg\">A problem occured. Try again later.</p>";
            }
            include './reusable/footer.php'; ?>
    </body>
</html>