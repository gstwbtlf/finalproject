<?php
require_once '../../includes/config_session.inc.php';
require_once '../../includes/login_view.inc.php';
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


<h3> Logout</h3>
    <br>
    <form action="../../includes/logout.inc.php" method="post">
        <br>
        <button>Logout</button>
    </form>
</body>
</html>