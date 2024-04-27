<?php
    require_once '../../includes/config_session.inc.php';
    require_once '../../includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardian Link Login</title>
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <?php 
        //echo "Login Page";
    ?>

    <header class="header-login">
        <div class="header-login-logo">
            <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
            <nav class="header-login-left-nav">
                <ul>
                    <li><a href="../..">HOME</a></li>
                    <li><a href="../p_about/about.php">ABOUT US</a></li>
                </ul>     
            </nav>
        </div>

        <nav class="header-login-right-nav">
            <ul>
                <li><a href="../p_register/register.php">REGISTER</a></li>
            </ul>     
        </nav>

    <!--
        <form action="../../includes/logout.inc.php" method="post"><button>Logout</button></form>
    -->  
    </header>

<!--
    <h3>     
    <?php
        //output_username();
    ?>
    </h3>
-->    
    <br>
    <br>
    <br>

    <?php
        if (!isset($_SESSION["user_id"])) { 
    ?>
            <div class="log-form">
                <div class="log-vol">
                    <h3>VOLUNTEER LOGIN</h3>
                    <form action="../../includes/loginvol.inc.php" method="post">
                        <table>
                            <tr>
                                <td align="right"><label for="username">Username:</label></td>
                                <td align="left"><input type="text" name="username" placeholder="Username"></td>
                            </tr>
                            <tr>
                                <td align="right"><label for="pswd">Password:</label></td>
                                <td align="left"><input type="text" name="pswd" placeholder="Password"></td>
                            </tr>
                    <!-- 
                            <input type ="password" id="pswdvol" placeholder="Password">
                            <br>
                            <input type="checkbox" onclick="showVolPswd()">Show Password
                    -->
                            <tr>
                                <td><br>
                                </td> 
                            </tr>
                        </table>   
                                <button>Volunteer Login</button>                       
                    </form>
                </div>

                <div class="log-line"> </div>

                <div class="log-ngo">
                    <h3>NGO LOGIN</h3>
                    <form action="../../includes/loginngo.inc.php" method="post">
                        <table>
                            <tr>
                                <td align="right"><label for="username">Username:</label></td>
                                <td align="left"><input type="text" name="username" placeholder="Username"></td>
                            </tr>
                            <tr>
                                <td align="right"><label for="pswd">Password:</label></td>
                                <td align="left"><input type="text" name="pswd" placeholder="Password"></td>
                            </tr>
                    <!--
                            <input type ="password" id="pswdngo" placeholder="Password">
                            <br>
                            <input type="checkbox" onclick="showNgoPswd()">Show Password
                    -->  
                            <tr>
                                <td><br>
                                </td> 
                            </tr>
                        </table>                                
                        <button>NGO Login</button>

                    </form>
                </div>
            </div> 
    <?php 
        } 
    ?>

        <br>

        <div class="log-endlinks">
            <a href="../../Private/p_forgotpswd/forgotpswd.php">Forgot password</a>
            
            <p>
                Don't have an account?
                <a href="../p_register/register.php">Register now.</a>
        </div>

        <h5>
    <?php
            check_login_errors();
    ?>
        </h5>

<!--
    //show/hide password field (causing NULL error - to fix later)
    <script>
        function showVolPswd() {
            var x = document.getElementById("pswdvol");

            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showNgoPswd() {
            var y = document.getElementById("pswdngo");

            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>
-->
</body>

</html>