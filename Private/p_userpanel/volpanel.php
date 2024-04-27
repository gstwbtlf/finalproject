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
    <title>User Portal</title>
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="userpanel.css">
</head>

<body>

    <header class="header-userpanel">
        <div class="header-userpanel-logo">
            <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
        </div>

        <nav class="header-userpanel-right-nav">
            <ul>
                <li><form action="../../includes/logout.inc.php" method="post"><button>LOGOUT</button></form></li>
            </ul>     
        </nav>
    </header>

    <h2>     
        <?php
            output_username();
        ?>
    </h2>
    
    <br>

    <?php 
        //echo "Volunteer Panel Page<br>";

        
        //volunteer id
        $voluser_id = $_SESSION["user_id"];
        
        //user details
        $queryvoluser = "SELECT username, firstname, lastname, phonenum, email FROM glvolusers WHERE id = :id;";
        $stmtvoluser = $pdo->prepare($queryvoluser);
        $stmtvoluser->bindParam(":id", $voluser_id);
        $stmtvoluser->execute();
        $resultvoluser = $stmtvoluser->fetch(PDO::FETCH_ASSOC);

    ?>

    <div class="user-profile-form">
        <div>
            <h3>
                Volunteer Account Information
            </h3>
    <?php
        echo "Username: " . $resultvoluser["username"] . "<br>";
        echo "Name: " . $resultvoluser["firstname"] . " " . $resultvoluser["lastname"] . "<br>";
        echo "Phone Number: " . $resultvoluser["phonenum"] . "<br>";
        echo "Email: " . $resultvoluser["email"] . "<br>";
    ?> 
    </div>

    <p></p>

    <div>
        <form action="../p_usertables/volunteer.php" method="post">
            <button>View NGO List</button>
        </form>
    </div>

<!--
    <h3>Logout</h3>
    <form action="../../includes/logout.inc.php" method="post">
        <button>Logout</button>
    </form>
-->

        <p></p>

        <div>
            <h3>Delete My Account</h3>
            WARNING! Account deletion is permanent and unrecoverable.
            <br>

        </div>

        <div>
            <form action="../../includes/deletevol_voluser.inc.php" method="post">
                <button>Delete My Account</button>
            </form>
        </div>
    </div>
    
</body>

</html>