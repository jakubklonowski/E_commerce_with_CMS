<a href="index.php" id="logo-container"><img src="./static/logo.png" id="logo" alt="logo"></a>
<nav class="nav justify-content-end" id="navbar">
    <a href="index.php" class="nav-link">Home</a>
    <a href="shop.php" class="nav-link">Model kits</a>
    <a href="gallery.php" class="nav-link">Gallery</a>
    <a href="blog.php" class="nav-link">Blog</a>
    <a href="author.php" class="nav-link">Author</a>
    <?php 
        if ($_SESSION['logged_in']===true) {
            echo "<a href=\"logout.php\" class=\"nav-link\">Logout</a>";
        }
        else {
            echo "<a href=\"login_or_register.php\" class=\"nav-link\">Login/Register</a>";
        }
    ?>
</nav>
<div id="under-nav"></div>