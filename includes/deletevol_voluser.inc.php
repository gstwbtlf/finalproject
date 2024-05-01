<?php

//Volunteer Delete User Page

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    try {
        require_once 'config_session.inc.php';
        require_once 'dbh.inc.php';

        $user_id = $_SESSION["user_id"];

        $query = "DELETE FROM glvolusers WHERE id=$user_id";
        $pdo->exec($query);

        header("Location: logout.inc.php");

        //close connections
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query failed (Delete user page): " . $e->getMessage());
    }

} else {
    header("Location: ../Private/p_forbidden/forbidden.php");
    die();
}