<?php

echo "Forgot Password Email Sender";
echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);

    try {
        require_once 'fpswd_contr.inc.php';
        require_once 'fpswd_view.inc.php';

        // ERROR HANDLERS
       
        //errors array
        $errors = [];

        //checks if all input fields in registration form has been filled with info
        if (input_empty($username, $email)) {
            $errors["fpswdempty_input"] = "Fill in all fields!";
        }

        /*
        //grab user data
        $result = get_user($pdo, $username, $email);

        //wrong username
        if (username_wrong($result)) {
            $errors["fpswdusername_incorrect"] = "Username invalid!";
        }

        //wrong email
        if (email_wrong($result)) {
            $errors["fpswdemail_incorrect"] = "Email invalid!";
        }
        */
        
        //start session
        require_once 'config_session.inc.php';

        //if error message, let user know and send back to login page
        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location: ../Private/p_forgotpswd/forgotpswd.php");
            die();
        }

        //$to = "admin@website.com";
        $to = " ";
        $subject = "Forgot My Password";
    
        $txt = "Hello Administrator!" . "<br><br>" . 
            "I have forgotten my password. Please reset it for me. My information is as follows:" . 
            "Username: " . $username . "<br>" . 
            "Email: " . $email . "<br><b>" .
            "Thank you!" . "<br><b>" .
            $username;
    
        $headers = "From:" . $email . "\r\n";
    
        if (mail($to,$subject,$txt,$headers)){
            echo "Email sent successfully!";
        } else {
            echo "Error sending email.";
        }

        header("Location: ../Public/p_login/login.php");
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    } 

} else {
    header("Location: ../Private/p_forbidden/forbidden.php");
    die();
}