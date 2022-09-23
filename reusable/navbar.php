<br>
<nav class="nav justify-content-end">
    <a href="./cms/shop.php" class="nav-link">Model kits</a>
    <a href="gallery.php" class="nav-link">Gallery</a>
    <a href="blog.php" class="nav-link">Blog</a>
    <a href="author.php" class="nav-link">Author</a>
    <?php 
        if ($_SESSION['logged_in']===false) {
            echo "<a href=\"login.php\" class=\"nav-link\">Login/Register</a>";
        }
        else if ($_SESSION['logged_in']===true) {
            echo "<a href=\"logout.php\" class=\"nav-link\">Logout</a>";
        }
        else {
            echo "<a href=\"login.php\" class=\"nav-link\">Login/Register</a>";
        }
    ?>
</nav>
<hr>