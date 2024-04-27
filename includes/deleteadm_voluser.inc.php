<?php

echo 'NGO Admin Delete Volunteer User Page';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $vol_id = $_POST["deletevoladm"];
    
    try {
        require_once 'config_session.inc.php';
        require_once 'dbh.inc.php';

        if($vol_id != 1 && !empty($vol_id)){
            $query = "DELETE FROM glvolusers WHERE id=$vol_id";
            $pdo->exec($query);

            header("Location: ../Private/p_adminpanel/adminvolpanel.php");

            //close connections
            $pdo = null;
            $stmt = null;
            die();

        } else{
            header("Location: ../Private/p_adminpanel/adminvolpanel.php");
        }

    } catch (PDOException $e) {
        die("Query failed (Delete user page): " . $e->getMessage());
    }

} else {
    header("Location: ../Private/p_forbidden/forbidden.php");
    die();
}