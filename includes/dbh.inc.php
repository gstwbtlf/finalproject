<?php

    //echo "Database Includes Handler File";


    //data source name = which database to connect to
    $host = 'localhost';
    $dbname = 'guardianlink_db';
    //database username
    $dbusername = "root";
    //database password
    $dbpassword = "";


    // error handler for database connection
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }