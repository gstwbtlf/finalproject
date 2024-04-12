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

    <form action="../../includes/login.inc.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username">
        <br>
        <label for="pswd">Password</label>
        <input type="text" name="pswd" placeholder="Password">
        <br>
        <button>Login</button>
    </form>

    <br>

    <a href="../../Private/p_volunteer/volunteer.php"> 
        <button method="post">Volunteer List</button>
    </a>

    <br>

    <a href="../../Private/p_ngo/ngo.php"> 
        <button method="post">NGO List</button>
    </a>

    <br>

    Don't have an account? 
    <a href="../p_register/register.php"> Register now.</a>

</body>
</html>