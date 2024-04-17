<?php

declare(strict_types=1);

//is username or email entered blank?
function input_empty (string $username, string $email) {

    if (empty($username) || empty ($email)) {
        return true;
    } else {
        return false;
    }
}


// is the user in the database already?
function username_wrong(bool|array $result) {

    if (!$result){
        return true;
    } else {
        return false;
    }
    
}


// is the user's email matching the one in the database?
function email_wrong(bool|array $result) {

    if (!$result){
        return true;
    } else {
        return false;
    }
    
}