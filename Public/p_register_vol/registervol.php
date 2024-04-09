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
        <form method="post">
            <label for="acctvolname">Username?</label>
            <input id="acctvolname" type="text" name="acctvolname" placeholder="Username">

            <br>

            <label for="volname">Volunteer Name?</label>
            <input id="volname" type="text" name="volname" placeholder="Volunteer Name">

            <br>

            <label for="volemail">Volunteer Email?</label>
            <input id="volemail" type="text" name="volemail" placeholder="Volunteer Email">

            <br>
        
            <label for="volpswd">Password?</label>
            <input id="volpswd" type="text" name="volpswd" placeholder="Password">

            <br>

            <label for="numhours">Number of Hours Available Per Week?</label>
            <select id="numhours" name="numhours">
                <option value="hours1">0-1</option>
                <option value="hours2">2-4</option>
                <option value="hours3">4-8</option>
                <option value="hours4">9+</option>
            </select>

            <br>

            <label for="backcheck">Criminal Background Check?</label>
            <select id="backcheck" name="backcheck">
                <option value="hours1">Yes</option>
                <option value="hours2">No</option>
            </select>

            <br>

            <label for="onlinepro">LinkedIn Page?</label>
            <input id="onlinepro" type="text" name="onlinepro" placeholder="LinkedIn URL">

            <br>
            
            <button type="submit">Register</button>
        </form>
    </main>
</body>
</html>