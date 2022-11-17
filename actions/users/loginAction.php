<?php 
    session_start();
    
    require("actions/database.php");

// Form validation
if(isset($_POST["validate"])) {

    // Checks if all the inputs are completed
    if(!empty($_POST["username"]) AND !empty($_POST["password"])) {
        $username = htmlspecialchars($_POST["username"]);
        $user_password = htmlspecialchars($_POST["password"]);

        // Check if user already exists...
        $checkIfUserAlreadyExists = $db->prepare("SELECT * FROM users WHERE username= ?");
        // Execute the request and store the data into an array
        $checkIfUserAlreadyExists->execute(array($username));

        // If the user doesn't exist already...
        if($checkIfUserAlreadyExists->rowCount() > 0) {
            // ... the infos are stored
            $userInfos = $checkIfUserAlreadyExists->fetch();

            // ... the password from the input is compared to the on we got from the db
            // ... and if it matches...
            if(password_verify($user_password, $userInfos["pw"])) {
                // ... the user is being authenticated and the infos are stored in the session superglobal...
                $_SESSION["auth"] = true;
                $_SESSION["id"] = $userInfos["id"];
                $_SESSION["username"] = $userInfos["username"];
                $_SESSION["lastname"] = $userInfos["lastname"];
                $_SESSION["firstname"] = $userInfos["firstname"];

                header("Location: index.php");

            } else {
                $errorMsg = "Votre mot de passe est incorrect !";
            }

        } else {
            $errorMsg = "Votre pseudo est incorrect !";
        }

        

    // If the form is not completed...
    } else {
        $errorMsg = "Veuillez compléter tous les champs !";
    }
}

?>