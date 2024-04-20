<?php
    require_once '../../includes/config_session.inc.php';
    require_once '../../includes/login_view.inc.php';
    require_once '../../includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userpanel.css">
</head>

<body>
    <h3>     
        <?php
            output_username();
        ?>
    </h3>

    <?php 
        echo "Volunteer Panel Page";
    ?>    


    <form action="../p_usertables/volunteer.php" method="post">
        <button>NGO List</button>
    </form>

    <h3>Logout</h3>
    <form action="../../includes/logout.inc.php" method="post">
        <button>Logout</button>
    </form>

    <br>
    
    <h3> Delete Account</h3>
        <?php
            echo "WARNING! Deleting your account is permanent and all your user information will be deleted.";
            echo "<br>";
            echo "Upon sucessful deletion of your account, you will be logged out and sent back to the Login page.";
        ?>
    
    <form action="../../includes/deletevol_voluser.inc.php" method="post">
        <button>Delete</button>
    </form>
   
</body>

</html>