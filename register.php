<?php include './reusable/header.php'; ?>
    <body>
        <?php include './reusable/navbar.php'; ?>
        
        <section><form action="./logic/register.php" method="POST">
            <div id="img-avatar-container">
                <img src="/static/img_avatar2.png" alt="Avatar" id="img-avatar">
            </div><br>

            <div class="form-floating">
                <input type="text" name="name" class="form-control fc-reg" id="floatingName" placeholder="name">
                <label for="floatingName" class="label-reg">Name</label>
            </div><br>

            <div class="form-floating">
                <input type="email" name="email" class="form-control fc-reg" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="label-reg">E-mail address</label>
            </div><br>

            <div class="form-floating">
                <input type="password" name="password" class="form-control fc-reg" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword" class="label-reg">Password</label>
            </div><br>

            <div class="form-floating">
                <input type="password" name="password2" class="form-control fc-reg" id="floatingPassword" placeholder="Repeat password">
                <label for="floatingPassword" class="label-reg">Repeat password</label>
            </div><br>

            <button type="submit" class="btn btn-primary" id="btn-reg">Sign up!</button>
        </form></section>

        <?php 
            if ($_SESSION['wrong_reg']) {
                echo "<p class=\"wrong-log-reg\">A problem occured. Try again later.</p>";
            }
            else if ($_SESSION['pwd_diff']) {
                echo "<p class=\"wrong-log-reg\">Passwords are not the same!</p>";
            }
            include './reusable/footer.php'; ?>
    </body>
</html>