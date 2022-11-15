<?php

require("actions/database.php");

if(isset($_POST["validate"])) {
    if(!empty($_POST["pseudo"]) AND !empty($_POST["lastname"]) AND !empty($_POST["firstname"]) AND !empty($_POST["password"])) {
        $user_pseudo = htmlspecialchars($_POST["pseudo"]);
        $user_lastname = htmlspecialchars($_POST["lastname"]);
        $user_firstname = htmlspecialchars($_POST["firstname"]);
        // arg1 : valeur à hasher / arg2 : algo de cryptage
        $user_password = password_hash($_POST["password"], PASSWORD_DEFAULT);


    } else {
        $errorMsg = "Veuillez compléter tous les champs !";
    }
}

// REPRENDRE à 41:40 !!! 