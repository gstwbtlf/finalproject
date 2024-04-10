<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];    
    $lastname = $_POST["lastname"];
    $pswd = $_POST["pswd"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenum"];
    $website = $_POST["website"];
    $availability = $_POST["availnow"];
    $weekhours = $_POST["volhours"];
    $backgroundcheck = $_POST["backcheck"];
    $education = $_POST["education"];
    $areasofinterest = $_POST["areainterest"];

    try {
        require_once "dbhvol.inc.php";

        $query = "INSERT INTO glvolusers (username, firstname, lastname, pswd, email, phonenum, website, availnow, volhours, backcheck, education, areainterest) VALUES (:username, :firstname, :lastname, :pswd, :email, :phonenum, :website, :availnow, :volhours, :backcheck, :education, :areainterest);";
    
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);    
        $stmt->bindParam(":firstname", $firstname);    
        $stmt->bindParam(":lastname", $lastname);    
        $stmt->bindParam(":pswd", $pswd);    
        $stmt->bindParam(":email", $email);    
        $stmt->bindParam(":phonenum", $phonenumber);    
        $stmt->bindParam(":website", $website);    
        $stmt->bindParam(":availnow", $availability);    
        $stmt->bindParam(":volhours", $weekhours);    
        $stmt->bindParam(":backcheck", $backgroundcheck);    
        $stmt->bindParam(":education", $education);    
        $stmt->bindParam(":areainterest", $areasofinterest);    
 
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