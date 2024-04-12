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
function getvol_email(object $pdo, string $email){
    $query = "SELECT email FROM glvolusers WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}