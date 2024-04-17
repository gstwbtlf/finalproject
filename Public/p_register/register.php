<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

<?php 
        echo "Register Page";

    ?>

    <br>

     <a href="../.."> 
        <button>Home</button>
    </a>
   

    <br>
    <form action="../../Private/p_register_user/registervol.php" method="post">
    <!-- <a href="../../Private/p_register_user/registervol.php">  -->
        <button>Register Volunteer</button>
    <!-- </a> -->
</form>
    
    <br>
    <form action="../../Private/p_register_user/registerngo.php" method="post">
    <!-- <a href="../../Private/p_register_user/registerngo.php"> -->
        <button>Register NGO</button>
    <!-- </a>-->
</form>
</body>
</html>