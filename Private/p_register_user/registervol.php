<?php
    require_once '../../includes/config_session.inc.php';
    require_once '../../includes/registervol_view.inc.php';
    require_once '../../includes/login_view.inc.php';
    require_once '../../includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Registration</title>
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="registeruser.css">
</head>

<body>
    <?php 
        if (isset($_SESSION["user_id"])) {
            //usertype
            $usertype = $_SESSION["user_type"];
            //table type
            $tbltype = $_SESSION["tbl_type"];

            if ($usertype == "adm") {
                if($tbltype == "vol"){
    ?>
            <!--
                <form action="../p_adminpanel/adminvolpanel.php" method="post">
                    <label for="adminvolpanel">Admin Panel</label>
                    <button>Admin Volunteer Panel</button>
                </form>
            -->

                <header class="header-registeruser">
                    <div class="header-registeruser-logo">
                        <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
                        <nav class="header-registeruser-left-nav">
                            <ul>
                            <li><form action="../p_adminpanel/adminvolpanel.php" method="post"><button>ADMIN PANEL</button></form></li>
                            </ul>     
                        </nav>
                    </div>

                    <nav class="header-registeruser-right-nav">
                        <ul>
                            <li><form action="../../includes/logout.inc.php" method="post"><button>LOGOUT</button></form></li>
                        </ul>     
                    </nav>
                </header>


    <?php
                } elseif ($tbltype == "ngo"){
    ?>
            <!--
                <form action="../p_adminpanel/adminngopanel.php" method="post">
                    <label for="adminngopanel">Admin NGO Panel</label>
                    <button>Admin Panel</button>
                </form>
            -->
                    <header class="header-registeruser">
                        <div class="header-registeruser-logo">
                            <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
                            <nav class="header-registeruser-left-nav">
                                <ul>
                                <li><form action="../p_adminpanel/adminngopanel.php" method="post"><button>Admin Panel</button></form></li>
                                </ul>     
                            </nav>
                        </div>

                        <nav class="header-registeruser-right-nav">
                            <ul>
                                <li><form action="../../includes/logout.inc.php" method="post"><button>Logout</button></form></li>
                            </ul>     
                        </nav>
                    </header>

    <?php
                }
    ?>
            <br>

        <!--
            <form action="../../includes/logout.inc.php" method="post">
                <label for="logoutadmpanel">Logout Admin Panel</label>
                <button>Logout</button>
            </form>
        -->

            <br>

    <?php
            }


        } else {
            //echo "Nothing to see here :P";
    ?>   
        <!--
           <br>

            <a href="../.."> 
                <button>Home</button>
            </a>
        -->

            <header class="header-registeruser">
                <div class="header-registeruser-logo">
                    <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
                    <nav class="header-registeruser-left-nav">
                        <ul>
                            <li><a href="../..">Home</a></li>
                            <li><a href="../../Public/p_about/about.php">About</a></li>
                        </ul>     
                    </nav>
                </div>

                <nav class="header-registeruser-right-nav">
                    <ul>
                        <li><a href="../../Public/p_login/login.php">Login</a></li>
                    </ul>     
                </nav>
            </header>

    <?php
        }
    
        //echo "Volunteer Register Page";

        //echo "<br>";

    ?> 

    <br>

    <div class="registration-form">
        <h3>VOLUNTEER REGISTRATION PAGE</h3>
        <br>
        <form action="../../includes/registervol.inc.php" method="post">
            <table>
                <tr>
                    <td align="right"><label for="username">Username:</label></td>
                    <td align="left"><input id="username" type="text" name="username" placeholder="Username"></td>
                </tr>
                <tr>
                    <td align="right"><label for="firstname">First Name:</label></td>
                    <td align="left"><input id="firstname" type="text" name="firstname" placeholder="First Name"></td>
                </tr>
                <tr>
                    <td align="right"><label for="lastname">Last Name:</label></td>
                    <td align="left"><input id="lastname" type="text" name="lastname" placeholder="Last Name"></td>
                </tr>
                <tr>
                    <td align="right"><label for="email">Email:</label></td>
                    <td align="left"><input id="email" type="email" name="email" placeholder="Email"></td>
                </tr>
                <tr>
                    <td align="right"><label for="phonenum">Phone Number:</label></td>
                    <td align="left"><input id="phonenum" type="text" name="phonenum" placeholder="Phone Number"></td>
                </tr>
                <tr>
                    <td align="right"><label for="pswd">Password:</label></td>
                    <td align="left"><input id="pswd" type="text" name="pswd" placeholder="Password"></td>
                </tr>
                <tr>
                    <td align="right"><label for="availnow">When are you available?</label></td>
                    <td><select id="availnow" name="availnow">
                        <option value="Now">Now</option>
                        <option value="In 1 Month">In 1 Month</option>
                        <option value="In 6 Months">In 6 Months</option>
                        <option value="In 12 Months">In 12 Months</option>                        
                        <option value="After 12 Months">After 12 Months</option>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="volhours">Available Hours Per Week:</label>
                    <td><select id="volhours" name="volhours">
                        <option value="0-1">0-1</option>
                        <option value="2-4">2-4</option>
                        <option value="4-8">4-8</option>
                        <option value="9+">9+</option>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="backcheck">Have you done a Criminal Background Check?</label>
                    <td><select id="backcheck" name="backcheck">
                        <option value="Pending">Pending</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="education">Highest Level of Education:</label>
                    <td><select id="education" name="education">
                        <option value="None">None</option>
                        <option value="High School">High School</option>
                        <option value="College">College</option>
                        <option value="University">University</option>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="areainterest">Area of Interest:</label>
                    <td><select id="areainterest" name="areainterest">
                        <option value="Ransomware">Ransomware</option>
                        <option value="SQL Injection">SQL Injection</option>
                        <option value="Cross-site Scripting">Cross-site Scripting</option>
                        <option value="DDOS Attacks">DDOS Attacks</option>
                    </select></td>
                </tr>
                <tr>
                    <td align="right"><label for="website">LinkedIn Page:</label></td>
                    <td align="left"><input id="website" type="text" name="website" placeholder="LinkedIn URL"></td>
                </tr>
                <tr>
                    <td><br>
                    </td> 
                </tr>
                <tr>
                    <td align="right"><button type="submit">Register</button></td>
                </tr>
            </table>
        </form>

        <h4>
        <?php
            checkvol_register_errors();
        ?>
        </h4>

    </div>

</body>

</html>