<?php

session_start();
session_unset();
session_destroy();

header("Location: ../Public/p_login/login.php");
die();