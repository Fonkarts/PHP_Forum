<?php 
require("actions/database.php");


if(isset($_SESSION["id"]) AND !empty($_SESSION["id"])) {

    $user_id = $_SESSION["id"];

    $checkIfUserExists = $db->prepare("SELECT username, lastname, firstname FROM users WHERE id = ?");
    $checkIfUserExists->execute(array($user_id));

    if($checkIfUserExists->rowCount() > 0 AND !empty($checkIfUserExists)) {
        $userInfos = $checkIfUserExists->fetch();

        $username = $userInfos["username"];
        $user_lastname = $userInfos["lastname"];
        $user_firstname = $userInfos["firstname"];

    } else {
        $errorMsg = "Utilisateur non trouvé !";
    }
} else {
    $errorMsg = "Aucun utilisateur trouvé !";
}

    