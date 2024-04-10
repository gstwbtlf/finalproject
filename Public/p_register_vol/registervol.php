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

            <label for="volphonenum">Volunteer Phone Number?</label>
            <input id="volphonenum" type="text" name="volphonenum" placeholder="Volunteer Phone Number (including area code)">

            <br>
        
            <label for="volpswd">Password?</label>
            <input id="volpswd" type="text" name="volpswd" placeholder="Password">

            <br>

            <label for="availnow">Are you available?</label>
            <select id="availnow" name="availnow">
            <option value="avail1">Now</option>
            <option value="avail2">In 1 Month</option>
            <option value="avail3">In 6 Months</option>
            <option value="avail4">In 12 Months</option>
            </select>

            <br>

            <label for="numhours">Number of Hours Available Per Week?</label>
            <select id="numhours" name="numhours">
                <option value="hours1">0-1</option>
                <option value="hours2">2-4</option>
                <option value="hours3">4-8</option>
                <option value="hours4">9+</option>
            </select>

            <br>

            <label for="backgroundcheck">Criminal Background Check?</label>
            <select id="backgroundcheck" name="backgroundcheck">
            <option value="backcheck1">Pending</option>
            <option value="backcheck2">Yes</option>
            <option value="backcheck3">No</option>
            </select>

            <br>

            <label for="education">Highest Level of Education?</label>
            <select id="education" name="education">
                <option value="edu1">None</option>
                <option value="edu2">High School</option>
                <option value="edu3">College</option>
                <option value="edu4">University</option>
            </select>

            <br>

            <label for="areainterest">Area of Interest?</label>
            <select id="areainterest" name="areainterest">
            <option value="int1">Area1</option>
            <option value="int2">Area2</option>
            <option value="int3">Aare3</option>
            <option value="int4">Area4</option>
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