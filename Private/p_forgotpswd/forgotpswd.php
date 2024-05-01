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
                        <li><a href="../..">HOME</a></li>
                    </ul>     
                </nav>
            </div>

            <nav class="header-forgot-right-nav">
                <ul>
                    <li><a href="../../Public/p_register/register.php">REGISTER</a></li>
                    <li><a href="../../Public/p_login/login.php">LOGIN</a></li>
                </ul>     
            </nav>
        </header>

        <br>
        <br>

    <div class="forgot-pswd-form">
        <h3>FORGOT MY PASSWORD</h3>
        
        <div class="fpswdwarning">
            Please fill out the following form.
            <br>
        </div>
            .
        <div class="fpswdwarning">
            Hit the Submit button to send an internal system email
            <br>
            to the administrator requesting a password reset.
        </div>
            .
            <br>
            .
        <form action="../../includes/fpswd_inc.php" method="post">
            <table>
                <tr>
                    <td align="right"><label for="username">Username</label></td>
                    <td align="left"><input type="text" name="username" placeholder="Username"></td>
                </tr>
                <tr>
                    <td align="right"><label for="email">Email</label></td>
                    <td align="left"><input type="text" name="email" placeholder="Email">   </td> 
                </tr>
                <tr>
                    <td><br>
                    </td> 
                </tr> 
            </table>
            <button>Submit</button>
        </form>
    </div>

    <h4>
    <?php
        check_fpswd_errors();
    ?>
    </h4>

</body>

</html>