<?php 
require("actions/database.php");

// If there is an id in the session storage...
if(isset($_SESSION["id"]) AND !empty($_SESSION["id"])) {

    // ... we store it
    $user_id = $_SESSION["id"];

    // ... and use it to send the request
    $checkIfUserExists = $db->prepare("SELECT username, lastname, firstname FROM users WHERE id = ?");
    $checkIfUserExists->execute(array($user_id));

    // If there is more than 0 result...
    if($checkIfUserExists->rowCount() > 0 AND !empty($checkIfUserExists)) {
        // ... we get the data
        $userInfos = $checkIfUserExists->fetch();

        // ... and store it in variables
        $username = $userInfos["username"];
        $user_lastname = $userInfos["lastname"];
        $user_firstname = $userInfos["firstname"];

    } else {
        $errorMsg = "Utilisateur non trouvé !";
    }
} else {
    $errorMsg = "Aucun utilisateur trouvé !";
}

    