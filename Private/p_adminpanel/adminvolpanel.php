<?php

//if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once '../../includes/config_session.inc.php';
    require_once '../../includes/login_view.inc.php';
    require_once '../../includes/dbh.inc.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="adminpanel.css">
</head>

<body>

    <header class="header-adminpanel">
        <div class="header-adminpanel-logo">
            <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
        </div>

        <nav class="header-adminpanel-right-nav">
            <ul>
                <li><form action="../../includes/logout.inc.php" method="post"><button>Logout</button></form></li>
            </ul>     
        </nav>
    </header>

    <h3>     
        <?php
            output_username();
        ?>
    </h3>

    <?php 
        echo "Admin Volunteer Panel Page";
    ?>    

    <br>
    <!--
        <h3> Logout</h3>
        <form action="../../includes/logout.inc.php" method="post">
            <button>Logout</button>
        </form>
    -->
    <?php

        //NGO Table listing
        echo "NGO Users";
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID #</th><th>Username</th><th>Firstname</th><th>Lastname</th><th>Organization Name</th><th>Phone Number</th><th>Email</th><th>Mission Statement</th><th>Org Needs</th><th>Website</th></tr>";

        class TableRowsNGO extends RecursiveIteratorIterator {
            function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
            }

            function current() {
                return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
            }

            function beginChildren() {
                echo "<tr>";
            }

            function endChildren() {
                echo "</tr>" . "\n";
            }
        } 

        $stmtNGO = $pdo->prepare("SELECT id, username, firstname, lastname, orgname, phonenum, email, missionstmt, ngoneeds, website FROM glngousers");
        $stmtNGO->execute();
        $resultNGO = $stmtNGO->setFetchMode(PDO::FETCH_ASSOC);

        foreach(new TableRowsNGO(new RecursiveArrayIterator($stmtNGO->fetchAll())) as $k=>$v) {
            echo $v;
        }

        echo "</table>";
        $stmtNGO = null;
        
        echo "<br>";
    ?>

        <form action="../../includes/deleteadm_ngouser.inc.php" method="post">
            <label for="deletengoadm">NGO ID to Delete</label>
            <input id="deletengoadm" type="text" name="deletengoadm" placeholder="NGO ID to Delete">
            <button>Delete NGO User</button>
        </form>

        <br>

        <form action="../p_register_user/registerngo.php" method="post">
            <label for="registerngoadm">Create New NGO User</label>
            <button>Create New NGO User</button>
        </form>
    
        <br>

        <form action="" method="post">
        <label for="editngoadm">Edit NGO User</label>
            <button>Edit NGO User</button>
        </form>

        <br>

    <?php

        //Volunteer Table listing
        echo "Volunteer Users";
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID #</th><th>Username</th><th>Firstname</th><th>Lastname</th><th>Phone Number</th><th>Email</th><th>Education</th><th>Area of Interest</th><th>Volunteer Hours</th><th>Background Check</th><th>Availability</th><th>Website</th></tr>";

        class TableRowsVOL extends RecursiveIteratorIterator {
            function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
            }

            function current() {
                return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
            }

            function beginChildren() {
                echo "<tr>";
            }

            function endChildren() {
                echo "</tr>" . "\n";
            }
        } 

        $stmtVOL = $pdo->prepare("SELECT id, username, firstname, lastname, phonenum, email, education, areainterest, volhours, backcheck, availnow, website FROM glvolusers");
        $stmtVOL->execute();
        $resultVOL = $stmtVOL->setFetchMode(PDO::FETCH_ASSOC);

        foreach(new TableRowsVOL(new RecursiveArrayIterator($stmtVOL->fetchAll())) as $k=>$v) {
            echo $v;
        }

        $pdo = null;        
        $stmtVOL = null;
        echo "</table>";

    ?>

        <br>

        <form action="../../includes/deleteadm_voluser.inc.php" method="post">
            <label for="deletevoladm">NGO ID to Delete</label>
            <input id="deletevoladm" type="text" name="deletevoladm" placeholder="Volunteer ID to Delete">
            <button>Delete Volunteer User</button>
        </form>

        <br>
        
        <form action="../p_register_user/registervol.php" method="post">
            <label for="registervoladm">Create New Volunteer User</label>
            <button>Create New Volunteer User</button>
        </form>
    
        <br>

        <form action="" method="post">
            <label for="editvoladm">Edit Volunteer User</label>
            <button>Edit Volunteer User</button>
        </form>

        <br>

    <?php
        die();
    /*
    } else{
        header("Location: ../p_forbidden/forbidden.php");
        die();
    }
    */
    ?>
</body>

</html>