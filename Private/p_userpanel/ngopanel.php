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
    <title>User Portal</title>
    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="userpanel.css">
</head>

<body>

    <header class="header-userpanel">
        <div class="header-userpanel-logo">
            <img src="../../assets/logos/GL_Logo.png" alt = "GL Logo">
        </div>

        <nav class="header-userpanel-right-nav">
            <ul>
                <li><form action="../../includes/logout.inc.php" method="post"><button>LOGOUT</button></form></li>
            </ul>     
        </nav>
    </header>

    <div class="main-doc">

    <h2>     
        <?php
            output_username();
        ?>
    </h2>

    <br>

    <?php 
        //echo "NGO Panel Page<br>";


        //ngo id
        $ngouser_id = $_SESSION["user_id"];

        //user details
        $queryngouser = "SELECT username, firstname, lastname, orgname, phonenum, email, missionstmt, ngoneeds, website FROM glngousers WHERE id = :id;";
        $stmtngouser = $pdo->prepare($queryngouser);
        $stmtngouser->bindParam(":id", $ngouser_id);
        $stmtngouser->execute();
        $resultngouser = $stmtngouser->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="user-profile-form">
        <div>
            <h3>
                Account Information
            </h3>

            <table>
                <tr>
                    <td align="right"><label>Name:</label></td>
                    <td align="left"><?php echo $resultngouser["firstname"] . " " . $resultngouser["lastname"]; ?></td>
                </tr>
                <tr>
                    <td align="right"><label>Organization Name:</label></td>
                    <td align="left"><?php echo $resultngouser["orgname"]; ?></td>
                </tr>
                <tr>
                    <td align="right"><label>Phone Number:</label></td>
                    <td align="left"><?php echo $resultngouser["phonenum"]; ?></td>
                </tr>
                <tr>
                    <td align="right"><label>Email:</label></td>
                    <td align="left"><?php echo $resultngouser["email"]; ?></td>
                </tr>
                <tr>
                    <td align="right"><label>Company Mission Statement:</label></td>
                    <td align="left"><?php echo $resultngouser["missionstmt"]; ?></td>
                </tr>
                <tr>
                    <td align="right"><label>Company Needs:</label></td>
                    <td align="left"><?php echo $resultngouser["ngoneeds"]; ?></td>
                </tr>
                <tr>
                    <td align="right"><label>LinkedIn Profile:</label></td>
                    <td align="left"><?php echo $resultngouser["website"]; ?></td>
                </tr>
            </table>

    <?php
            //echo "Username: " . $resultngouser["username"] . "<br>";
            //echo "Contact Name: " . $resultngouser["firstname"] . " " . $resultngouser["lastname"] . "<br>";
           // echo "Organization Name: " . $resultngouser["orgname"] . "<br>";
            //echo "Phone Number: " . $resultngouser["phonenum"] . "<br>";
           // echo "Email: " . $resultngouser["email"] . "<br>";
           // echo "Company Mission Statement: " . $resultngouser["missionstmt"] . "<br>";
            //echo "Company Needs: " . $resultngouser["ngoneeds"] . "<br>";            
           // echo "Company Website: " . $resultngouser["website"] . "<br>";
    ?>   
        </div>

        <p></p>

        <div>
            <form action="../p_usertables/ngo.php" method="post">
                <button>View Volunteer List</button>
            </form>
        </div>

<!--
    <h3>Logout</h3>
    <form action="../../includes/logout.inc.php" method="post">
        <button>Logout</button>
    </form>
-->

        <p></p>

        <div>
            <h3>Delete My Account</h3>
            WARNING! Account deletion is permanent and unrecoverable.
            <br>

        </div>

        <div>
            <form action="../../includes/deletengo_ngouser.inc.php" method="post">
                <button>Delete Account</button>
            </form>
        </div>
    </div>

</div>

</body>

</html>