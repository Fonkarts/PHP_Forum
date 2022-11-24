<?php 
    session_start();

    // Redirects the user to the login page if he/she 's not authenticated
    if(!isset($_SESSION["auth"])) {
        header("Location: login.php");
    } 

