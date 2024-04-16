<?php
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
    <link rel="stylesheet" href="Private/p_ngopanel/ngopanel.css">
</head>
<body>


    <h3>     
        <?php
            output_username();
        ?>
    </h3>


    <?php 
        echo "NGO Panel Page";
    ?>   

    <form action="../p_ngo/ngo.php" method="post">
        <button>Volunteer List</button>
    </form>


    <h3> Logout</h3>

    <form action="../../includes/logout.inc.php" method="post">
        <button>Logout</button>
    </form>

    <br>


    <?php
    /*
    //Volunteer Table listing
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Firstname</th><th>Lastname</th><th>Phone Number</th><th>Email</th><th>Education</th><th>Area of Interest</th><th>Volunteer Hours</th><th>Background Check</th><th>Availability</th><th>Website</th></tr>";

        class TableRows extends RecursiveIteratorIterator {
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

        $stmt = $pdo->prepare("SELECT firstname, lastname, phonenum, email, education, areainterest, volhours, backcheck, availnow, website FROM glvolusers");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }

        $pdo = null;
        echo "</table>";
        */
    ?>


</body>
</html>