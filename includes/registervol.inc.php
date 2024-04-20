<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];    
    $lastname = $_POST["lastname"];
    $pswd = $_POST["pswd"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenum"];
    $website = $_POST["website"];
    $availability = $_POST["availnow"];
    $weekhours = $_POST["volhours"];
    $backgroundcheck = $_POST["backcheck"];
    $education = $_POST["education"];
    $areasofinterest = $_POST["areainterest"];

    try {
        require_once 'dbh.inc.php';
        require_once 'registervol_model.inc.php';
        require_once 'registervol_contr.inc.php';

        // ERROR HANDLERS
       
        //errors array
        $errors = [];

        //checks if all input fields in registration form has been filled with info
        if (isvol_input_empty($username, $firstname, $lastname, $pswd, $email, $phonenumber, $website)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        //if valid email submitted
        if (isvol_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }

        //if username is already taken
        if (isvol_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }

        //if email is already registered
        if (isvol_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }


        //start session
        require_once 'config_session.inc.php';

        
        //if error message, let user know and send back to register page
        if ($errors) {
            $_SESSION["errorsvol_register"] = $errors;

            header("Location: ../Private/p_register_user/registervol.php");
            die();
        }


        //sign user into site when no errors present
        createvol_user($pdo, $username, $firstname, $lastname, $pswd, $email, $phonenumber, $website, $availability, $weekhours, $backgroundcheck, $education, $areasofinterest);

        header ("Location: ../Private/p_register_user/registervol.php?register=success");
   
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