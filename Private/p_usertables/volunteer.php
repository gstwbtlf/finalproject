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
    <link rel="stylesheet" href="usertables.css">
</head>

<body>
    <h3>     
        <?php
            output_username();
        ?>
    </h3>
    
    <?php 
        echo "Volunteer List Page";
    ?>   
    
    <form action="../p_userpanel/volpanel.php" method="post">
        <button>Volunteer Profile</button>
    </form> 

    <h3>Logout</h3>
    <form action="../../includes/logout.inc.php" method="post">
        <button>Logout</button>
    </form>

    <br>
    
    <?php
        //NGO Table listing
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID #</th><th>Firstname</th><th>Lastname</th><th>Organization Name</th><th>Phone Number</th><th>Email</th><th>Mission Statement</th><th>Org Needs</th><th>Website</th></tr>";

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

        $stmt = $pdo->prepare("SELECT id, firstname, lastname, orgname, phonenum, email, missionstmt, ngoneeds, website FROM glngousers WHERE usertype='usr'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }

        echo "</table>";
        ?>


        <form action="../../includes/contactngo_user.inc.php" method="post">
            <label for="ngouser_id">NGO ID to Contact</label>
            <input id="ngouser_id" type="text" name="ngouser_id" placeholder="NGO ID to Contact">
            <button>Contact NGO</button>
        </form> 


        <?php
        $pdo = null;
        $stmt = null;
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

