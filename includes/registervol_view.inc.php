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
    }
}