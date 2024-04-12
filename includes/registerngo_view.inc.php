<?php

declare(strict_types=1);

function checkngo_register_errors() {
    if (isset($_SESSION['errorsngo_register'])) {
        $errors = $_SESSION['errorsngo_register'];

        echo "<br>";

        foreach ($errors as $error){
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errorsngo_register']);
    } else if (isset($_GET["register"]) && $_GET["register"] === "success"){
        echo '<br>';
        echo '<p>Registration success!</p>';
    }
}