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
    <title>Document</title>
    <link rel="stylesheet" href="adminpanel.css">
</head>
<body>

    <h3>     
        <?php
            output_username();
        ?>
    </h3>

    <?php 
        echo "Admin Volunteer Panel Page";
    ?>    

    <br>

    <h3> Logout</h3>
    
    <form action="../../includes/logout.inc.php" method="post">
        <button>Logout</button>
    </form>



    <?php
        //NGO Table listing
        echo "NGO Users";
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Firstname</th><th>Lastname</th><th>Organization Name</th><th>Phone Number</th><th>Email</th><th>Mission Statement</th><th>Org Needs</th><th>Website</th></tr>";

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

        $stmtNGO = $pdo->prepare("SELECT firstname, lastname, orgname, phonenum, email, missionstmt, ngoneeds, website FROM glngousers");
        $stmtNGO->execute();
        $resultNGO = $stmtNGO->setFetchMode(PDO::FETCH_ASSOC);

        foreach(new TableRowsNGO(new RecursiveArrayIterator($stmtNGO->fetchAll())) as $k=>$v) {
            echo $v;
        }

        echo "</table>";
        $stmtNGO = null;
        
        echo "<br>";
    
        //Volunteer Table listing
        echo "Volunteer Users";
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Firstname</th><th>Lastname</th><th>Phone Number</th><th>Email</th><th>Education</th><th>Area of Interest</th><th>Volunteer Hours</th><th>Background Check</th><th>Availability</th><th>Website</th></tr>";

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

        $stmtVOL = $pdo->prepare("SELECT firstname, lastname, phonenum, email, education, areainterest, volhours, backcheck, availnow, website FROM glvolusers");
        $stmtVOL->execute();
        $resultVOL = $stmtVOL->setFetchMode(PDO::FETCH_ASSOC);

        foreach(new TableRowsVOL(new RecursiveArrayIterator($stmtVOL->fetchAll())) as $k=>$v) {
            echo $v;
        }

        $pdo = null;        
        $stmtVOL = null;
        echo "</table>";
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