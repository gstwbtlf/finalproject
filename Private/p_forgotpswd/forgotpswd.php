<?php
    require_once '../../includes/config_session.inc.php';
    require_once '../../includes/fpswd_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="forgotpswd.css">
</head>

<body>
    <?php 
        //echo "Forgot Password Page";
    ?>  
        
        <header class="header-forgot">
            <div class="header-forgot-logo">
                <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
                <nav class="header-forgot-left-nav">
                    <ul>
                        <li><a href="../..">Home</a></li>
                    </ul>     
                </nav>
            </div>

            <nav class="header-forgot-right-nav">
                <ul>
                    <li><a href="../../Public/p_register/register.php">Register</a></li>
                    <li><a href="../../Public/p_login/login.php">Login</a></li>
                </ul>     
            </nav>
        </header>

    <form action="../../includes/fpswd_inc.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username">
        
        <br>
        
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email"> 
        
        <br>
        
        <button>Submit</button>
    </form>

    <?php
        check_fpswd_errors();
    ?>

</body>

</html>