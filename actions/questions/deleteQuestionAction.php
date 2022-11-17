<?php 
    session_start();
    if(!isset($_SESSION["auth"])) {
        header("location: login.php");
    }
    // Pas besoin de mettre actions/ car ce fichier ne sera pas rattaché 
    // à une page située dans le dossier racine
    require("../database.php");

    if(isset($_GET["id"]) AND !empty($_GET["id"])) {

        $question_id = $_GET["id"];

        $checkIfQuestionExists = $db->prepare("SELECT author_id FROM questions WHERE id = ?");
        $checkIfQuestionExists->execute(array($question_id));

        if($checkIfQuestionExists->rowCount() > 0) {

            $questionInfos = $checkIfQuestionExists->fetch();
            if($questionInfos["author_id"] === $_SESSION["id"]) {

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