<?php

declare(strict_types=1);

//compare username in registration to existing usernames in db
function getvol_username(object $pdo, string $username){
    $query = "SELECT username FROM glvolusers WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//compare email in registration to existing emails in db
function getvol_email(object $pdo, string $email) {
    $query = "SELECT email FROM glvolusers WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}



function setvol_user(object $pdo, string $username, string $firstname, string $lastname, string $pswd, string $email, string $phonenum, string $website, string $availability, string $weekhours, string $backgroundcheck, string $education, string $areasofinterest) {
    $query = "INSERT INTO glvolusers (username, firstname, lastname, pswd, email, phonenum, website, availnow, volhours, backcheck, education, areainterest) VALUES (:username, :firstname, :lastname, :pswd, :email, :phonenum, :website, :availnow, :volhours, :backcheck, :education, :areainterest);";
    
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
    $stmt->bindParam(":phonenum", $phonenum);    
    $stmt->bindParam(":website", $website);    
    $stmt->bindParam(":availnow", $availability);    
    $stmt->bindParam(":volhours", $weekhours);    
    $stmt->bindParam(":backcheck", $backgroundcheck);    
    $stmt->bindParam(":education", $education);    
    $stmt->bindParam(":areainterest", $areasofinterest);    
    
    $stmt->execute();
}