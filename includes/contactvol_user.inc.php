<?php

//Contact NGO User

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'config_session.inc.php';
    require_once 'dbh.inc.php';

    //ngo id
    $ngouser_id = $_SESSION["user_id"];
    //volunteer id
    $voluser_id = $_POST["voluser_id"];

    //user details
    $queryngouser = "SELECT firstname, lastname, orgname, phonenum, email FROM glngousers WHERE id = :id;";
    $stmtngouser = $pdo->prepare($queryngouser);
    $stmtngouser->bindParam(":id", $ngouser_id);
    $stmtngouser->execute();
    $resultngouser = $stmtngouser->fetch(PDO::FETCH_ASSOC);
    
    //volunteer contact details
    $queryvol = "SELECT firstname, lastname, phonenum, email FROM glvolusers WHERE id = :id;";
    $stmtvol = $pdo->prepare($queryvol);
    $stmtvol->bindParam(":id", $voluser_id);
    $stmtvol->execute();
    $resultvol = $stmtvol->fetch(PDO::FETCH_ASSOC);

    try {
        $to = $resultngouser["email"];
        $subject = "Want to Connect";
    
        $txt = "Hello ". $resultvol["firstname"] . $resultvol["lastname"] . "," . "<br><br>" . 
            "I found you through the Guardian Link portal. I believe you can help my organization and would like to speak with you about your qualifications." .
            "<br><br>My contact details are as follows:" . 
            "Name: " . $resultngouser["firstname"] . $resultngouser["lastname"] . "<br>" . 
            "Organization: " . $resultngouser["orgname"] . "<br>" . 
            "Email: " . $resultvoluser["email"] . "<br><br>" .
            "Look forward to hearing from you!" . "<br><br>" .
            $resultngouser["firstname"];
    
        $headers = "From:" . $resultngouser["email"] . "\r\n";
    
        if (mail($to,$subject,$txt,$headers)){
            echo "Email sent successfully!";
        } else {
            echo "Error sending email.";
        }

        header("Location: ../Private/p_usertables/ngo.php");

        //close connections
        $pdo = null;
        $stmtvol = null;
        $stmtngo = null;
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    } 

} else {
    header("Location: ../Private/p_forbidden/forbidden.php");
    die();
}