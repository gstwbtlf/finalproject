<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Private/p_register_ngo/registerngo.css">
</head>
<body>
    <?php 
        echo "NGO Register Page";
    ?> 

    <br>

    <a href="../.."> 
        <button>Home</button>
    </a>

    <br>  

    <main>
        <form method="post">
            <label for="acctngoname">Username?</label>
            <input id="acctngoname" type="text" name="acctngoname" placeholder="Username">

            <br>

            <label for="pocname">Point of Contact Name?</label>
            <input id="pocname" type="text" name="pocname" placeholder="Point of Contact Name">

            <br>

            <label for="orgname">Organization Name?</label>
            <input id="orgname" type="text" name="orgname" placeholder="Organization Name">

            <br>

            <label for="pocemail">Point of Contact Email?</label>
            <input id="pocemail" type="text" name="pocemail" placeholder="Point of Contact Email">

            <br>
        
            <label for="ngopswd">Password?</label>
            <input id="ngopswd" type="text" name="ngopswd" placeholder="Password">

            <br>

            <label for="areasofconcern">Areas of Concern?</label>
            <select id="areasofconcern" name="areasofconcern">
                <option value="concern1">Concern 1</option>
                <option value="concern2">Concern 2</option>
                <option value="concern3">Concern 3</option>
                <option value="concern4">Concern 4</option>
            </select>

            <br>

            <button type="submit">Register</button>
        </form>
    </main>
</body>
</html>