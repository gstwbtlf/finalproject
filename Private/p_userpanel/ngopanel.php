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
    <link rel="stylesheet" href="userpanel.css">
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

    <form action="../p_usertables/ngo.php" method="post">
        <button>Volunteer List</button>
    </form>


    <h3> Logout</h3>

    <form action="../../includes/logout.inc.php" method="post">
        <button>Logout</button>
    </form>

    <br>

</body>
</html>