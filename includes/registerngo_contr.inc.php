<?php

declare(strict_types=1);

//checks if all input fields have been filled
function isngo_input_empty(string $username, string $firstname, string $lastname, string $pswd, string $email, string $phonenum, string $website, string $orgname, string $missionstmt) {
    if (empty($username) || empty($firstname) || empty($lastname) || empty($pswd) || empty($email) || empty($phonenum) || empty($website) || empty($orgname) || empty($missionstmt)) {
        return true;
    } else {
        return false;
    }
}


//checks if email is valid
function isngo_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}


//checks if username is already taken
function isngo_username_taken(object $pdo, string $username) {
    if (getngo_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}


//checks if email is already registered
function isngo_email_registered(object $pdo, string $email) {
    if (getngo_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}