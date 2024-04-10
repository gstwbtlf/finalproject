<?php

$pswdSignup = $_POST["pswd"];

$options = [
    'cost' => 12
];

$hashedPswd = password_hash($pswdSignup, PASSWORD_BCRYPT, $options);


$pswdLogin = $_POST["pswd"];

if (password_verify($pswdLogin, $hashedPswd)) {

} else {
    
}