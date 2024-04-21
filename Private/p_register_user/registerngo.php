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
    <title>Document</title>
    <link rel="stylesheet" href="registeruser.css">
</head>

<body>
    <?php 
        echo "NGO Register Page";

        echo "<br>";

        if (isset($_SESSION["user_id"])) {
        //usertype
        $usertype = $_SESSION["user_type"];
        //table type
        $tbltype = $_SESSION["tbl_type"];
        
        if ($usertype == "adm"){

            if($tbltype == "vol"){
    ?>
                <form action="../p_adminpanel/adminvolpanel.php" method="post">
                    <label for="adminvolpanel">Admin Panel</label>
                    <button>Admin Volunteer Panel</button>
                </form>
    <?php
                } elseif ($tbltype == "ngo"){
    ?>
                    <form action="../p_adminpanel/adminngopanel.php" method="post">
                        <label for="adminngopanel">Admin NGO Panel</label>
                    <button>Admin Panel</button>
                    </form>
    <?php
                }
    ?>

            <br>

            <form action="../../includes/logout.inc.php" method="post">
                <label for="logoutadmpanel">Logout Admin Panel</label>
                <button>Logout</button>
            </form>

            <br>
    <?php
        }
    } else {
        echo "Nothing to see here :P";
    ?>

        <br>

        <a href="../.."> 
            <button>Home</button>
        </a>

    <?php
    }
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
            <input id="email" type="text" name="email" placeholder="Point of Contact Email">

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