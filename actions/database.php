<?php

try {
    // PHP Data Object is a PHP extension that allows you to use the PDO class
    // in order to communicate with your database
    $db = new PDO(
        "mysql:host=localhost;dbname=forum;charset=utf8;", 
        // Replace these two values by your MySQL infos
        "YourMySQLUserName", 
        "YourMySQLPassword"
    );
} catch(Exception $e) {
    die("Une erreur a été trouvée : " . $e->getMessage());
}

