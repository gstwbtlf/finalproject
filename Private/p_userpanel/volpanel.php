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
        //volunteer id
        $voluser_id = $_SESSION["user_id"];
        
        //user details
        $queryvoluser = "SELECT username, firstname, lastname, phonenum, email, education, availnow, volhours, backcheck, areainterest, website FROM glvolusers WHERE id = :id;";
        $stmtvoluser = $pdo->prepare($queryvoluser);
        $stmtvoluser->bindParam(":id", $voluser_id);
        $stmtvoluser->execute();
        $resultvoluser = $stmtvoluser->fetch(PDO::FETCH_ASSOC);

?>

        <div class="user-profile-form">
            <div>
                <h3>
                Account Information
                </h3>

                <table>
                    <tr>
                        <td align="right"><label>Name:</label></td>
                        <td align="left"><?php echo $resultvoluser["firstname"] . " " . $resultvoluser["lastname"]; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Phone Number:</label></td>
                        <td align="left"><?php echo $resultvoluser["phonenum"]; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Email:</label></td>
                        <td align="left"><?php echo $resultvoluser["email"]; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Education:</label></td>
                        <td align="left"><?php echo $resultvoluser["education"]; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Availability:</label></td>
                        <td align="left"><?php echo $resultvoluser["availnow"]; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Weekly Volunteer Hours:</label></td>
                        <td align="left"><?php echo $resultvoluser["volhours"]; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Background Check:</label></td>
                        <td align="left"><?php echo $resultvoluser["backcheck"]; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Areas of Expertise:</label></td>
                        <td align="left"><?php echo $resultvoluser["areainterest"]; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><label>LinkedIn Profile:</label></td>
                        <td align="left"><?php echo $resultvoluser["website"]; ?></td>
                    </tr>
                </table>
            </div>

            <p></p>

            <div>
                <form action="../p_usertables/volunteer.php" method="post">
                    <button>View NGO List</button>
                </form>
            </div>

            <p></p>

            <div>
                <h3>Delete My Account</h3>
                    WARNING! Account deletion is permanent and unrecoverable.
                <br>
            </div>

            <div>
                <form action="../../includes/deletevol_voluser.inc.php" method="post">
                    <button>Delete My Account</button>
                </form>
            </div>
        </div>

    </div>
    
</body>

</html>