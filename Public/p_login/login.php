<?php
require_once '../../includes/config_session.inc.php';
require_once '../../includes/login_view.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Public/p_login/login.css">
</head>
<body>

    <?php 
        echo "Login Page";
    ?>

    <br>

     <a href="../.."> 
        <button>Home</button>
    </a>

    <br>

    <h3>     
        <?php
        output_username();
        ?>
    </h3>
    
    <br>

    <?php
        if (!isset($_SESSION["user_id"])) { ?>
            <h3> Volunteer Login</h3>
            <form action="../../includes/loginvol.inc.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username">
                <br>
                <label for="pswd">Password</label>
                <input type="text" name="pswd" placeholder="Password">
                <br>
                <button>Login Volunteer</button>
            </form>


            <h3> NGO Login</h3>
            <form action="../../includes/loginngo.inc.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username">
                <br>
                <label for="pswd">Password</label>
                <input type="text" name="pswd" placeholder="Password">
                <br>
                <button>Login NGO</button>
            </form>





        <?php } 
    ?>



    <?php
    check_login_errors();
    ?>

    <br>

    Don't have an account? 
    <a href="../p_register/register.php"> Register now.</a>

</body>
</html>