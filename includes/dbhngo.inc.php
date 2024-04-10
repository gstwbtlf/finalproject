<?php
    echo "Database Includes Handler File";


    //data source name = which database to connect to
    $dsn = "mysql:host=localhost;dbname=guardianlink_db";
    //database username
    $dbusername = "root";
    //database password
    $dbpassword = "";


    // error handler for database connection
    try {
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }