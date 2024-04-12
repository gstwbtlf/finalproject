<?php

declare(strict_types=1);

//checks if all input fields have been filled
function isvol_input_empty(string $username, string $firstname, string $lastname, string $pswd, string $email, string $phonenum, string $website) {
    if (empty($username) || empty($firstname) || empty($lastname) || empty($pswd) || empty($email) || empty($phonenum) || empty($website)) {
        return true;
    } else {
        return false;
    }
}


//checks if email is valid
function isvol_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}


//checks if username is already taken
function isvol_username_taken(object $pdo, string $username) {
    if (getvol_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}


//checks if email is already registered
function isvol_email_registered(object $pdo, string $email) {
    if (getvol_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}