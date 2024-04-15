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

//is user logged in? then regerate session id with user id
if (isset($_SESSION["user_id"])) {

    if (!isset($_SESSION['last_regeneration'])){
    
    //generate new id from session id and user id
    regenerate_session_id_loggedin();

    } else {

        //regenerate session id
        $interval = 60 * 30;

        if (time() - $_SESSION['last_regeneration'] >= $interval){
        regenerate_session_id_loggedin();
        }
    }

} else {
    //first time session created
    if (!isset($_SESSION['last_regeneration'])) {
    
    //generate new id for current session that is stronger
    regenerate_session_id();

    } else {

        //regenerate session id
        $interval = 60 * 30;

        if (time() - $_SESSION['last_regeneration'] >= $interval){
        regenerate_session_id();
        }
    }
}



function regenerate_session_id_loggedin() {
    session_regenerate_id(true);

    //regenerate session by combining user id with session id
    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION['last_regeneration'] = time();
}

//regenerate session id & reset timer
function regenerate_session_id() {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}
