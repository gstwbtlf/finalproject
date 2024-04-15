<?php

declare(strict_types=1);


function is_input_empty (string $username, string $pswd) {

    if (empty($username) || empty ($pswd)) {
        return true;
    } else {
        return false;
    }
}


// is the user in the database already?
function is_username_wrong(bool|array $result) {

    if (!$result){
        return true;
    } else {
        return false;
    }
    
}


// is the user's password matching the one in the database?
function is_password_wrong(string $pswd, string $hashedPswd) {

    if (!password_verify($pswd, $hashedPswd)){
        return true;
    } else {
        return false;
    }
    
}