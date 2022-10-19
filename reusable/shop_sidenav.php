<aside class='col-md-2 col-sm-0'>
    <?php 
        include './config/config.php';

        $query = "SELECT DISTINCT Category FROM products";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {
            $flagnull=false;
            foreach ($result as $category) {
                if ($category['Category']===NULL) {
                    if ($flagnull) {
                        break;
                    }
                    else {
                        echo '<br> - <a href="/category.php?cat=BEZ%20KATEGORII">BEZ KATEGORII</a>';
                        $flagnull=true;
                    }
                }
                else {
                    echo "<br> - <a href=\"/category.php?cat=".$category['Category']."\">".$category['Category']."</a>";
                }
            }
        }
        else {
        
        }
    ?>
</aside>