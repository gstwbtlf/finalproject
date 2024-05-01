<?php

//Contact NGO User

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'config_session.inc.php';
    require_once 'dbh.inc.php';

    //volunteer id
    $voluser_id = $_SESSION["user_id"];
    //ngo id
    $ngouser_id = $_POST["ngouser_id"];

    //user details
    $queryvoluser = "SELECT firstname, lastname, phonenum, email FROM glvolusers WHERE id = :id;";
    $stmtvoluser = $pdo->prepare($queryvoluser);
    $stmtvoluser->bindParam(":id", $voluser_id);
    $stmtvoluser->execute();
    $resultvoluser = $stmtvoluser->fetch(PDO::FETCH_ASSOC);
    
    //NGO contact details
    $queryngo = "SELECT firstname, lastname, orgname, phonenum, email FROM glngousers WHERE id = :id;";
    $stmtngo = $pdo->prepare($queryngo);
    $stmtngo->bindParam(":id", $ngouser_id);
    $stmtngo->execute();
    $resultngo = $stmtngo->fetch(PDO::FETCH_ASSOC);



    try {
        $to = $resultngo["email"];
        $subject = "Want to Connect";
    
        $txt = "Hello ". $resultNGO["firstname"] . $resultNGO["lastname"] . "," . "<br><br>" . 
            "I found you through the Guardian Link portal. I believe I can help you and would like to speak with you further on my qualifications." .
            "<br><br>My contact details are as follows:" . 
            "Name: " . $resultvoluser["firstname"] . $resultvoluser["lastname"] . "<br>" . 
            "Email: " . $resultvoluser["email"] . "<br><br>" .
            "Look forward to hearing from you!" . "<br><br>" .
            $resultvoluser["firstname"];
    
        $headers = "From:" . $resultvoluser["email"] . "\r\n";
    
        if (mail($to,$subject,$txt,$headers)){
            echo "Email sent successfully!";
        } else {
            echo "Error sending email.";
        }

        header("Location: ../Private/p_usertables/volunteer.php");

        //close connections
        $pdo = null;
        $stmtngo = null;
        $stmtvoluser = null;
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    } 

} else {
    header("Location: ../Private/p_forbidden/forbidden.php");
    die();
}