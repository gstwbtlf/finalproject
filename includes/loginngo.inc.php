<?php

echo 'NGO Login Handler Page';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pswd = $_POST["pswd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'loginngo_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS
       
        //errors array
        $errors = [];

        //checks if all input fields in registration form has been filled with info
        if (is_input_empty($username, $pswd)) {
            $errors["empty_input"] = "Error! Fill in all fields!";
        }

        //grab user data
        $result = get_user($pdo, $username);

        //wrong username
        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Error! Username invalid!";
        }

        //wrong password
        if (!is_username_wrong($result) && is_password_wrong($pswd, $result["pswd"])) {
            $errors["login_incorrect"] = "Error! Incorrect password!";
        }

        //start session
        require_once 'config_session.inc.php';
        
        //if error message, let user know and send back to login page
        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location: ../Public/p_login/login.php");
            die();
        }

        //regenerate session by combining user id with session id
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_name"] = htmlspecialchars($result["username"]);
        $_SESSION["user_type"] = $result["usertype"];
        $_SESSION["tbl_type"] = $result["tbl"];

        // reset session regeneration time
        $_SESSION['last_regeneration'] = time();
        
        //check usertype, route pages accordingly
        if ($result["usertype"] === "adm") {
            header("Location: ../Private/p_adminpanel/adminngopanel.php?login=success");
        } else {
            header("Location: ../Private/p_userpanel/ngopanel.php?login=success");
        }

        //close connections
        $pdo = null;
        $stmt = null;
        die();
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else{
    header("Location: ../Private/p_forbidden/forbidden.php");
    die();
}