<?php
    require_once '../../includes/config_session.inc.php';
    require_once '../../includes/registervol_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Private/p_register_vol/registervol.css">
</head>
<body>
    <?php 
        echo "Volunteer Register Page";
    ?>   

    <br>

    <a href="../.."> 
        <button>Home</button>
    </a>

    <br>

    <main>
        <form action="../../includes/registervol.inc.php" method="post">
            <label for="username">Username?</label>
            <input id="username" type="text" name="username" placeholder="Username">

            <br>

            <label for="firstname">Volunteer First Name?</label>
            <input id="firstname" type="text" name="firstname" placeholder="Volunteer First Name">

            <br>

            <label for="lastname">Volunteer Last Name?</label>
            <input id="lastname" type="text" name="lastname" placeholder="Volunteer Last Name">

            <br>

            <label for="email">Volunteer Email?</label>
            <input id="email" type="text" name="email" placeholder="Volunteer Email">

            <br>

            <label for="phonenum">Volunteer Phone Number?</label>
            <input id="phonenum" type="text" name="phonenum" placeholder="Volunteer Phone Number (including area code)">

            <br>
        
            <label for="pswd">Password?</label>
            <input id="pswd" type="text" name="pswd" placeholder="Password">

            <br>

            <label for="availnow">Are you available?</label>
            <select id="availnow" name="availnow">
            <option value="Now">Now</option>
            <option value="In 1 Month">In 1 Month</option>
            <option value="In 6 Months">In 6 Months</option>
            <option value="In 12 Months">In 12 Months</option>
            </select>

            <br>

            <label for="volhours">Number of Hours Available Per Week?</label>
            <select id="volhours" name="volhours">
                <option value="0-1">0-1</option>
                <option value="2-4">2-4</option>
                <option value="4-8">4-8</option>
                <option value="9+">9+</option>
            </select>

            <br>

            <label for="backcheck">Criminal Background Check?</label>
            <select id="backcheck" name="backcheck">
            <option value="Pending">Pending</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            </select>

            <br>

            <label for="education">Highest Level of Education?</label>
            <select id="education" name="education">
                <option value="None">None</option>
                <option value="High School">High School</option>
                <option value="College">College</option>
                <option value="University">University</option>
            </select>

            <br>

            <label for="areainterest">Area of Interest?</label>
            <select id="areainterest" name="areainterest">
            <option value="Area1">Area1</option>
            <option value="Area2">Area2</option>
            <option value="Area3">Area3</option>
            <option value="Area4">Area4</option>
            </select>

            <br>

            <label for="website">LinkedIn Page?</label>
            <input id="website" type="text" name="website" placeholder="LinkedIn URL">

            <br>

            <button type="submit">Register</button>
        </form>

        <?php
            checkvol_register_errors();
        ?>
    </main>
</body>
</html>