<?php 
    session_start();
    // Redirect the user to the login page if he/she 's not authenticated
    if(!isset($_SESSION["auth"])) {
        header("location: login.php");
    }

    require("../database.php");

    // If there's an id in the url parameters...
    if(isset($_GET["id"]) AND !empty($_GET["id"])) {

        // ... we store it
        $question_id = $_GET["id"];

        // ... we search the corresponding question in the DB
        $checkIfQuestionExists = $db->prepare("SELECT author_id FROM questions WHERE id = ?");
        $checkIfQuestionExists->execute(array($question_id));

        // If there is more than 0 result...
        if($checkIfQuestionExists->rowCount() > 0) {

            // ... we get its infos
            $questionInfos = $checkIfQuestionExists->fetch();
            // ... then if the author of the question is also the current user...
            if($questionInfos["author_id"] === $_SESSION["id"]) {

                // ... we delete the question and redirect the user to his/her questions page
                $deleteQuestion = $db->prepare("DELETE FROM questions WHERE id = ?");
                $deleteQuestion->execute(array($question_id));

                header("location: ../../my-questions.php");

            } else {
                $errorMsg = "Vous n'êtes pas l'auteur de la question ! Suppression non autorisée dis donc !";
            }

        } else {
            $errorMsg = "Aucune question n'a été trouvée !";
        }

    } else {
        $errorMsg = "Aucune question n'a été trouvée !";
    }