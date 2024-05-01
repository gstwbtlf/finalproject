<?php
    require_once '../../includes/config_session.inc.php';
    require_once '../../includes/registerngo_view.inc.php';
    require_once '../../includes/login_view.inc.php';
    require_once '../../includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO Registration</title>
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
        
            if ($usertype == "adm"){
                if($tbltype == "vol"){
?>
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
                    <header class="header-registeruser">
                        <div class="header-registeruser-logo">
                            <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
                            <nav class="header-registeruser-left-nav">
                                <ul>
                                    <li><form action="../p_adminpanel/adminngopanel.php" method="post"><button>ADMIN PANEL</button></form></li>
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
                }
?>

            <br>

<?php
            }

        } else {  
?>

            <header class="header-registeruser">
                <div class="header-registeruser-logo">
                    <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
                    <nav class="header-registeruser-left-nav">
                        <ul>
                            <li><a href="../..">HOME</a></li>
                            <li><a href="../../Public/p_about/about.php">ABOUT</a></li>
                        </ul>     
                    </nav>
                </div>

                <nav class="header-registeruser-right-nav">
                    <ul>
                        <li><a href="../../Public/p_login/login.php">LOGIN</a></li>
                    </ul>     
                </nav>
            </header>
<?php
        }
?>   
 
    <div class="main-doc">

        <br>

        <div class="registration-form">
            <h3>NGO REGISTRATION PAGE</h3>

            <br>

            <form action="../../includes/registerngo.inc.php" method="post"></td>
                <table>
                    <tr>
                        <td align="right"><label for="username">Username:</label></td>
                        <td align="left"><input id="username" type="text" name="username" placeholder="Username"></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="firstname">Point of Contact First Name:</label></td>
                        <td align="left"><input id="firstname" type="text" name="firstname" placeholder="First Name"></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="lastname">Point of Contact Last Name:</label></td>
                        <td align="left"><input id="lastname" type="text" name="lastname" placeholder="Last Name"></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="orgname">Organization Name:</label></td>
                        <td align="left"><input id="orgname" type="text" name="orgname" placeholder="Organization Name"></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="email">Point of Contact Email:</label></td>
                        <td align="left"><input id="email" type="email" name="email" placeholder="Email"></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="phonenum">Point of Contact Phone Number:</label></td>
                        <td align="left"><input id="phonenum" type="text" name="phonenum" placeholder="Phone Number"></td>
                    <tr>
                    </tr>
                        <td align="right"><label for="pswd">Password:</label></td>
                        <td align="left"><input id="pswd" type="text" name="pswd" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="ngoneeds">Areas of Concern:</label></td>
                        <td><select id="ngoneeds" name="ngoneeds">
                            <option value="Ransomware">Ransomware</option>
                            <option value="SQL Injection">SQL Injection</option>
                            <option value="Cross-site Scripting">Cross-site Scripting</option>
                            <option value="DDOS Attacks">DDOS Attacks</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="missionstmt">Company Mission Statement:</label></td>
                        <td align="left"><input id="missionstmt" type="text" name="missionstmt" placeholder="Company Mission Statement"></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="website">Company Website URL:</label></td>
                        <td align="left"><input id="website" type="text" name="website" placeholder="Company Website URL"></td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                        </td> 
                    </tr>
                    <tr>
                        <td align="right"><button type="submit">Register</button></td>
                    </tr>
                </table>
            </form>

            <div class ="notifications-popup">

                <h4>
<?php
                    checkngo_register_errors();
?>
                </h4>
            </div>
    </div>
        </div>
    </div>
</body>

</html>