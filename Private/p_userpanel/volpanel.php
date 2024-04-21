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
        echo "Volunteer Panel Page<br>";

        
        //volunteer id
        $voluser_id = $_SESSION["user_id"];
        
        //user details
        $queryvoluser = "SELECT username, firstname, lastname, phonenum, email FROM glvolusers WHERE id = :id;";
        $stmtvoluser = $pdo->prepare($queryvoluser);
        $stmtvoluser->bindParam(":id", $voluser_id);
        $stmtvoluser->execute();
        $resultvoluser = $stmtvoluser->fetch(PDO::FETCH_ASSOC);

        echo "Username: " . $resultvoluser["username"] . "<br>";
        echo "First Name: " . $resultvoluser["firstname"] . "<br>";
        echo "Last Name: " . $resultvoluser["lastname"] . "<br>";
        echo "Phone Number: " . $resultvoluser["phonenum"] . "<br>";
        echo "Email: " . $resultvoluser["email"] . "<br>";
    ?>    
    
    <br>

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