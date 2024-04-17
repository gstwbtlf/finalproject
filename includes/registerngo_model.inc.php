<?php

declare(strict_types=1);

//compare username in registration to existing usernames in db
function getngo_username(object $pdo, string $username){
    $query = "SELECT username FROM glngousers WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//compare email in registration to existing emails in db
function getngo_email(object $pdo, string $email){
    $query = "SELECT email FROM glngousers WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function setngo_user(object $pdo, string $username, string $firstname, string $lastname, string $pswd, string $email, string $phonenum, string $website, string $organizationname, string $ngoneeds, string $missionstmt) {
    
    //set user type to 'usr' automatically upon registration
    $usertype = "usr";
    
    $query = "INSERT INTO glngousers (usertype, username, firstname, lastname, pswd, email, phonenum, website, orgname, ngoneeds, missionstmt) VALUES (:usertype, :username, :firstname, :lastname, :pswd, :email, :phonenum, :website, :orgname, :ngoneeds, :missionstmt);";

    $stmt = $pdo->prepare($query);
   
    //hash password
    $options = [
        'cost' => 12
    ];

    $hashedPswd = password_hash($pswd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":usertype", $usertype); 
    $stmt->bindParam(":username", $username);    
    $stmt->bindParam(":firstname", $firstname);    
    $stmt->bindParam(":lastname", $lastname);    
    $stmt->bindParam(":pswd", $hashedPswd);    
    $stmt->bindParam(":email", $email);    
    $stmt->bindParam(":phonenum", $phonenum);    
    $stmt->bindParam(":website", $website);    
    $stmt->bindParam(":orgname", $organizationname);    
    $stmt->bindParam(":ngoneeds", $ngoneeds); 
    $stmt->bindParam(":missionstmt", $missionstmt);       
    
    $stmt->execute();
}