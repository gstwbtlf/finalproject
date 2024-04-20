<?php
    require_once '../../includes/config_session.inc.php';
    require_once '../../includes/fpswd_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="forgotpswd.css">
</head>

<body>
    <?php 
        echo "Forgot Password Page";
    ?>  
        
    <br>

    <a href="../.."> 
        <button>Home</button>
    </a>

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