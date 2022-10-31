<h2>Step 1</h2>
<p>Create file <em>config.php</em> at this location.</p>
<hr>
<h2>Step 2</h2>
<p>Modify <em>config.php</em> file permissions to be executable and writable.</p>
<hr>
<h2>Step 3</h2>
<p>Database connection configuration.</p>
<form action="installer2.php" method="POST">

    <label for="host">Host</label><br>
    <input type="text" id="host" name="host_name" required><br>

    <label for="user">Username</label><br>
    <input type="text" id="user" name="user_name" required><br>

    <label for="password">Password</label><br>
    <input type="password" id="password" name="password" required><br>

    <label for="dbname">Database name</label><br>
    <input type="text" id="dbname" name="dbname" required><br><br>

    <button>Next</button>
</form>