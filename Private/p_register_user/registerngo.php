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
                            <li><form action="../p_adminpanel/adminvolpanel.php" method="post"><button>Admin Volunteer Panel</button></form></li>
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

    echo "NGO Register Page";

    echo "<br>";
    ?>   
 
    <br>  

    <main>
        <form action="../../includes/registerngo.inc.php" method="post">
            <label for="username">Username?</label>
            <input id="username" type="text" name="username" placeholder="Username">

            <br>

            <label for="firstname">Point of Contact First Name?</label>
            <input id="firstname" type="text" name="firstname" placeholder="Point of Contact First Name">

            <br>

            <label for="lastname">Point of Contact Last Name?</label>
            <input id="lastname" type="text" name="lastname" placeholder="Point of Contact Last Name">

            <br>

            <label for="orgname">Organization Name?</label>
            <input id="orgname" type="text" name="orgname" placeholder="Organization Name">

            <br>

            <label for="email">Point of Contact Email?</label>
            <input id="email" type="email" name="email" placeholder="Point of Contact Email">

            <br>

            <label for="phonenum">Point of Contact Phone Number?</label>
            <input id="phonenum" type="text" name="phonenum" placeholder="Point of Contact Phone Number">

            <br>
        
            <label for="pswd">Password?</label>
            <input id="pswd" type="text" name="pswd" placeholder="Password">

            <br>

            <label for="ngoneeds">Areas of Concern?</label>
            <select id="ngoneeds" name="ngoneeds">
                <option value="Concern 1">Concern 1</option>
                <option value="Concern 2">Concern 2</option>
                <option value="Concern 3">Concern 3</option>
                <option value="Concern 4">Concern 4</option>
            </select>

            <br>
        
            <label for="missionstmt">Company Mission Statement</label>
            <input id="missionstmt" type="text" name="missionstmt" placeholder="Company Mission Statement">

            <br>
        
            <label for="website">Company Website URL</label>
            <input id="website" type="text" name="website" placeholder="Company Website URL">

            <br>

            <button type="submit">Register</button>
        </form>

    <?php
            checkngo_register_errors();
    ?>
    </main>

</body>

</html>