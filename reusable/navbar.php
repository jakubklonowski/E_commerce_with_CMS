<div id="nav-container">
    <nav class="nav justify-content-end" id="navbar">
        <!-- <a class="nav-link align-self-start">Hobby shop</a> -->
        <a href="cart.php" class="nav-link"><img src="./static/cart.png" id="cart-img"></a>
        <a href="index.php" class="nav-link">Home</a>
        <a href="shop.php" class="nav-link">Model kits</a>
        <a href="gallery.php" class="nav-link">Gallery</a>
        <a href="blog.php" class="nav-link">Blog</a>
        <?php 
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']===true) {
                echo "<a href=\"account.php\" class=\"nav-link\">Account</a>";
                if (isset($_SESSION['admin']) && $_SESSION['admin']===true) {
                    echo "<a href=\"admin.php\" class=\"nav-link\">Admin</a>";
                }
                echo "<a href=\"./logic/logout.php\" class=\"nav-link btn btn-danger\" id=\"logout-btn\">Logout</a>&nbsp;";
            }
            else {
                echo "<a href=\"login.php\" class=\"nav-link\">Login</a>";
                echo "<a href=\"register.php\" class=\"nav-link\">Register</a>";
            }
        ?>
    </nav>
    <div id="under-nav"></div>
</div>