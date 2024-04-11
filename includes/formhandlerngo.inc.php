<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];    
    $lastname = $_POST["lastname"];
    $pswd = $_POST["pswd"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenum"];
    $website = $_POST["website"];
    $organizationname = $_POST["orgname"];
    $ngoneeds = $_POST["ngoneeds"];
    $missionstmt = $_POST["missionstmt"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO glngousers (username, firstname, lastname, pswd, email, phonenum, website, orgname, ngoneeds, missionstmt) VALUES (:username, :firstname, :lastname, :pswd, :email, :phonenum, :website, :orgname, :ngoneeds, :missionstmt);";
    
        $stmt = $pdo->prepare($query);

        //hash password
        $options = [
            'cost' => 12
        ];
        
        $hashedPswd = password_hash($pswd, PASSWORD_BCRYPT, $options);

        $stmt->bindParam(":username", $username);    
        $stmt->bindParam(":firstname", $firstname);    
        $stmt->bindParam(":lastname", $lastname);    
        $stmt->bindParam(":pswd", $hashedPswd);    
        $stmt->bindParam(":email", $email);    
        $stmt->bindParam(":phonenum", $phonenumber);    
        $stmt->bindParam(":website", $website);    
        $stmt->bindParam(":orgname", $organizationname);    
        $stmt->bindParam(":ngoneeds", $ngoneeds); 
        $stmt->bindParam(":missionstmt", $missionstmt);        
 
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header ("Location: ../index.php");
    
        die();
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else{
    header("Location: ../Private/p_forbidden/forbidden.php");
}