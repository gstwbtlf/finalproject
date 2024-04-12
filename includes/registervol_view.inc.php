<?php

declare(strict_types=1);

function checkvol_register_errors() {
    if (isset($_SESSION['errorsvol_register'])) {
        $errors = $_SESSION['errorsvol_register'];

        echo "<br>";

        foreach ($errors as $error){
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errorsvol_register']);
    } else if (isset($_GET["register"]) && $_GET["register"] === "success"){
        echo '<br>';
        echo '<p>Registration success!</p>';
    }
}