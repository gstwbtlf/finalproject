<?php

ini_set('session.use_only_cookies', 1);

// use session id only created by server within the website
ini_set('session.use_strict_mode', 1);

// cookie parameters when sessions start
session_set_cookie_params([
    //cookie gets destroyed after a certain amount of time
    //30 minutes
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    //only run cookie in a secure website connection
    'secure' => true,
    'httponly' => true
]);

session_start();

//first time session created
if (!isset($_SESSION['last_regeneration'])){
    
    //generate new id for current session that is stronger
    regenerate_session_id();

} else {

    //regenerate session id
    $interval = 60 * 30;

    if (time() - $_SESSION['last_regeneration'] >= $interval){
        regenerate_session_id();
    }
}


function regenerate_session_id(){
    session_regenerate_id();
    $_SESSION['last_regeneration'] = time();
}

