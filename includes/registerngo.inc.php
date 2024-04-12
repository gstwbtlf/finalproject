<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];    
    $lastname = $_POST["lastname"];
    $pswd = $_POST["pswd"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenum"];
    $website = $_POST["website"];
    $organizationname = $_POST["orgname"];
    $ngoneeds = $_POST["ngoneeds"];
    $missionstmt = $_POST["missionstmt"];

    try {
        require_once 'dbh.inc.php';        
        require_once 'registerngo_model.inc.php';
        require_once 'registerngo_contr.inc.php';

        // ERROR HANDLERS

        //errors array
        $errors = [];

        //checks if all input fields in registration form has been filled with info
        if (isngo_input_empty($username, $firstname, $lastname, $pswd, $email, $phonenumber, $website, $organizationname, $missionstmt)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        //if valid email submitted
        if (isngo_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }

        //if username is already taken
        if (isngo_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }

        //if email is already registered
        if (isngo_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }


        //start session
        require_once 'config_session.inc.php';


        //if error message, let user know and send back to register page
        if ($errors) {
            $_SESSION["errorsngo_register"] = $errors;

            header("Location: ../Public/p_register_ngo/registerngo.php");
            die();
        }


        //sign user into site when no errors present
        createngo_user($pdo, $username, $firstname, $lastname, $pswd, $email, $phonenumber, $website, $organizationname, $ngoneeds, $missionstmt);

        header ("Location: ../Public/p_register_ngo/registerngo.php?register=success");

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