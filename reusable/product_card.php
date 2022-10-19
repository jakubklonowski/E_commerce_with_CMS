<?php 
    echo "<a href=\"./article.php?ID=".$product['ID']."\" class=\"card col-xl-2 col-md-5 col-sm-6\">";
        echo "<img src=".$product['Cover']." alt=\"".$product['Name']."\" class=\"card-img-top card-image\">";
        echo "<div class=\"card-body wyjustowanie\">";
            echo "<h5 class=\"card-title\">".$product['Name']."</h5>";
            echo "<p class=\"card-subtitle\">ID:&nbsp;".$product['ID']."</p>";
            echo "<p class=\"card-text\">".$product['DescriptionShort']."</p>";
        echo "</div>";
    echo "</a>";
?>