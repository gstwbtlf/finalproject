<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register with GuardianLink</title>
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="register.css">
</head>

<body>

    <?php 
        //echo "Register Page";
    ?>

    <header class="header-register">
        <div class="header-register-logo">
            <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
            <nav class="header-register-left-nav">
                <ul>
                    <li><a href="../..">Home</a></li>
                    <li><a href="../p_about/about.php">About</a></li>
                </ul>     
             </nav>
        </div>

        <nav class="header-register-right-nav">
            <ul>
                <li><a href="../p_login/login.php">Login</a></li>
            </ul>     
        </nav>
    </header>

    <br>

    <form action="../../Private/p_register_user/registervol.php" method="post">
        <button>Register Volunteer</button>
    </form>
    
    <br>

    <form action="../../Private/p_register_user/registerngo.php" method="post">
        <button>Register NGO</button>
    </form>

</body>

</html>