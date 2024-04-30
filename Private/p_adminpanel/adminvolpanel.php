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
                <li><form action="../../includes/logout.inc.php" method="post"><button>LOGOUT</button></form></li>
            </ul>     
        </nav>
    </header>
    <div class="main-doc">
    <h3>     
        <?php
            output_username();
        ?>
    </h3>

    <?php 
        //echo "Admin Volunteer Panel Page";
    ?>    

     <!--
        <h3> Logout</h3>
        <form action="../../includes/logout.inc.php" method="post">
            <button>Logout</button>
        </form>
    -->



    <!--
        //NGO Table listing 
    -->
        <div class="admin-panel-form">
            NGO Users
        </div>

    <?php
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID #</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Organization Name</th><th>Phone Number</th><th>Email</th><th>Mission Statement</th><th>Company Needs</th><th>Website</th></tr>";

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

<div class="admin-users-panel-form">     
            <table>
                <th>Admin Controls (NGOs)</th>
                <tr>
                    <form action="../p_register_user/registerngo.php" method="post">
                        <td align="right"><label for="registerngoadm">New NGO</label></td>
                        <td align="left"><button>New NGO</button></td>
                    </form>
                </tr>  
                <tr>
                    <form action="" method="post">
                        <td align="right"><label for="editngoadm">Edit NGO</label></td>
                        <td align="left"><button>Edit NGO</button></td>
                    </form>
                </tr>
                <tr>
                    <form action="../../includes/deleteadm_ngouser.inc.php" method="post">
                        <td align="right"><label for="deletengoadm">Delete NGO</label>
                        <input id="deletengoadm" type="text" name="deletengoadm" placeholder="ID #" size="2"></td>
                        <td align="left"><button>Delete NGO</button></td>
                    </form>
                </tr>
            </table>
        </div>

        <br>

    <!--       
        //Volunteer Table listing
    -->
    
    <div class="admin-panel-form">
        Volunteer Users
    </div>

        <?php
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID #</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Email</th><th>Education</th><th>Area of Interest</th><th>Volunteer Hours</th><th>Background Check</th><th>Availability</th><th>Website</th></tr>";

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

        <div class="admin-users-panel-form">     
            <table>
                <th>Admin Controls (VOLs)</th>
                <tr>
                    <form action="../p_register_user/registervol.php" method="post">
                        <td align="right"><label for="registervoladm">New Volunteer</label></td>
                        <td align="left"><button>New Volunteer</button></td>
                    </form>
                </tr>
                <tr>
                    <form action="" method="post">
                        <td align="right"><label for="editvoladm">Edit Volunteer</label></td>
                        <td align="left"><button>Edit Volunteer</button></td>
                    </form>
                </tr>
                <tr>
                    <form action="../../includes/deleteadm_voluser.inc.php" method="post">
                        <td align="right"><label for="deletevoladm">Delete Volunteer</label>
                        <input id="deletevoladm" type="text" name="deletevoladm" placeholder="ID #" size="2"></td>
                        <td align="left"><button>Delete Volunteer</button></td>
                    </form>
                </tr>
            </table>
        </div>
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

</div>
</body>

</html>