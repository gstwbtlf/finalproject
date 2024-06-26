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
    <title>User Portal</title>
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="usertables.css">
</head>

<body>

    <header class="header-tablespanel">
        <div class="header-tablespanel-logo">
            <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
            <nav class="header-tablespanel-left-nav">
                <ul>
                    <li><form action="../p_userpanel/volpanel.php" method="post"><button>VOLUNTEER PROFILE</button></form></li>
                </ul>     
             </nav>
        </div>

        <nav class="header-tablespanel-right-nav">
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
    
        <br>
    
    <!--
        //NGO Table listing
    -->
        <div class="user-panel-form">
            NGO Information
        </div>

<?php
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>GL #</th><th>First Name</th><th>Last Name</th><th>Organization Name</th><th>Phone Number</th><th>Email</th><th>Mission Statement</th><th>Company Needs</th><th>Website</th></tr>";

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

        <p></p>

        <div class="user-form-table">
            <form action="../../includes/contactngo_user.inc.php" method="post">
                <table>
                    <th>Make Contact</th>
                    <tr>
                        <td><label for="ngouser_id">Enter the GuardianLink # of <br>the NGO you wish to contact.</label></td>
                    </tr>
                    <tr>
                        <td align="center">
                        <input id="ngouser_id" type="text" name="ngouser_id" placeholder="GL #" size="3"></td>
                    </tr>
                    <tr>
                        <td align="center"><button>Contact NGO</button></td>
                    </tr>
                </table>
            </form> 
        </div>

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
    </div>

</body>

</html>