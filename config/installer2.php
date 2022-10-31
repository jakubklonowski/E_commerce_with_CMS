<?php
    session_start();

    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $host=$_POST['host_name'];
    $user=$_POST['user_name'];
    $password=$_POST['password'];
    $dbname=$_POST['dbname'];
    $link=$_SESSION['link']=mysqli_connect($host, $user, $password, $dbname);

    $file=fopen("config.php","w");
    $config = "<?php
        \$host=\"".$host."\";
        \$user=\"".$user."\";
        \$password=\"".$password."\";
        \$dbname=\"".$dbname."\";
        \$link = mysqli_connect(\$host, \$user, \$password, \$dbname);
        ?>";

    if (!fwrite($file, $config)) { 
        print "Nie mogę zapisać do pliku ($file), wykonaj poprzedni krok ponownie!"; 
        exit; 
    }
    echo "<p>Krok 3 zakończony:</p>";
    echo "<p>Plik konfiguracyjny utworzony</p><hr>";    
    fclose($file);

    if (file_exists("schema.php")) {
        require("schema.php");
        echo "Tworzę tabele bazy: ".$dbname.".<br>\n";
        mysqli_select_db($link, $dbname) or die(mysqli_error($link));
        for($i=0;$i<count($create);$i++) {
                echo "<p>".$i.". <code>".$create[$i]."</code></p>\n";
                mysqli_query($link, $create[$i]);
                // exit;
        }
    }
?>
<hr>
<form action="installer3.php" method="POST">
    <label>Admin e-mail</label><br>
    <input type="text" id="admin-email" name="admin-email" required><br>

    <label>Admin name</label><br>
    <input type="text" id="admin-name" name="admin-name" required><br>

    <label>Admin password</label><br>
    <input type="password" id="admin-pwd" name="admin-pwd" required><br><br>

    <button>Next</button>
</form>