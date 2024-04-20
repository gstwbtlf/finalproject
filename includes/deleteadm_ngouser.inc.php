<?php

echo 'NGO Admin Delete NGO User Page';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $ngo_id = $_POST["deletengoadm"];
    
    try {
        require_once 'config_session.inc.php';
        require_once 'dbh.inc.php';

        if($ngo_id != 1){
            $query = "DELETE FROM glngousers WHERE id=$ngo_id";
            $pdo->exec($query);
    
            header("Location: ../Private/p_adminpanel/adminngopanel.php");
    
            //close connections
            $pdo = null;
            $stmt = null;
            die();

        } else{
            header("Location: ../Private/p_adminpanel/adminngopanel.php");
        }

    } catch (PDOException $e) {
        die("Query failed (Delete user page): " . $e->getMessage());
    }

} else {
    header("Location: ../Private/p_forbidden/forbidden.php");
    die();
}