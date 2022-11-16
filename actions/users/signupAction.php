<?php
    // if(!isset($_SESSION)) {
    //     session_start();
    // }
    require("actions/database.php");

// Form validation
if(isset($_POST["validate"])) {

    // Checks if all the inputs are completed
    if(!empty($_POST["username"]) AND !empty($_POST["lastname"]) AND !empty($_POST["firstname"]) AND !empty($_POST["password"])) {
        $username = htmlspecialchars($_POST["username"]);
        $user_lastname = htmlspecialchars($_POST["lastname"]);
        $user_firstname = htmlspecialchars($_POST["firstname"]);
        // The password is being hashed. 
        // First arg : what we hash / second arg : encryption tool
        $user_password = password_hash($_POST["password"], PASSWORD_DEFAULT);


        // Check if user already exists...
        $checkIfUserAlreadyExists = $db->prepare("SELECT * FROM users WHERE username= ?");
        // Execute the request and store the data into an array
        $checkIfUserAlreadyExists->execute(array($username));
        
        // If the user doesn't exist already...
        if($checkIfUserAlreadyExists->rowCount() == 0) {
            // ... the inputs values are stored in the db...
            $registerUser = $db->prepare("INSERT INTO users (username, lastname, firstname, pw)VALUES(?, ?, ?, ?)");
            $registerUser->execute(array(
                $username, 
                $user_lastname, 
                $user_firstname, 
                $user_password
            ));

            // ... then we get these infos from the db...
            $getUserInfos = $db->prepare("SELECT id, username, lastname, firstname FROM users WHERE lastname = ? AND firstname= ?");
            $getUserInfos->execute(
                array(
                    $user_lastname, 
                    $user_firstname
                ));

            // ... we store the infos...
            $userInfos = $getUserInfos->fetch();

            // ...get the user authenticated and store his/her infos in the session superglobal...
            $_SESSION["auth"] = true;
            $_SESSION["id"] = $userInfos["id"];
            $_SESSION["username"] = $userInfos["username"];
            $_SESSION["lastname"] = $userInfos["lastname"];
            $_SESSION["firstname"] = $userInfos["firstname"];

            // ... and finally redirect the user to the index page.
            header("location: index.php");
        
        // If the user already exists...
        } else {
            $errorMsg = "Cet utilisateur existe déjà !";
        }

    // If the form is not completed...
    } else {
        $errorMsg = "Veuillez compléter tous les champs !";
    }
}

