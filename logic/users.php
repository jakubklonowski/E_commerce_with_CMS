<?php
    session_start();

    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $ID=$_POST['ID'];

    if (array_key_exists('admin', $_POST)) {
        giveAdminRights($ID);
        header("location:../users.php");
    }
    else if (array_key_exists('deadmin', $_POST)) {
        revokeAdminRights($ID);
        header("location:../users.php");
    }
    else if (array_key_exists('activate', $_POST)) {
        activateUser($ID);
        header("location:../users.php");
    }
    else if (array_key_exists('deactivate', $_POST)) {
        deactivateUser($ID);
        header("location:../users.php");
    }

    function giveAdminRights($id) {
        require "../config/config.php";

        $query=$link->prepare("UPDATE users SET Admin=1 WHERE ID=?");
        $query->bind_param("i", $id);
        $query->execute();
    }

    function revokeAdminRights($id) {
        require "../config/config.php";

        $query=$link->prepare("UPDATE users SET Admin=0 WHERE ID=?");
        $query->bind_param("i", $id);
        $query->execute();
    }

    function activateUser($id) {
        require "../config/config.php";

        $query=$link->prepare("UPDATE users SET Active=1 WHERE ID=?");
        $query->bind_param("i", $id);
        $query->execute();
    }

    function deactivateUser($id) {
        require "../config/config.php";

        $query=$link->prepare("UPDATE users SET Active=0 WHERE ID=?");
        $query->bind_param("i", $id);
        $query->execute();
    }
?>