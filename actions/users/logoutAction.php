<?php 
    session_start();
    
    // We here erase all the data in the session storage and redirect the user to the login page
    $_SESSION = [];
    session_destroy();
    header("Location: ../../login.php");

