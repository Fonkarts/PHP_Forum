<?php

    require("actions/database.php");

    // If there's an id in the url parameters...
    if(isset($_GET["id"]) AND !empty($_GET["id"])) {
        // ... we store it
        $question_id = $_GET["id"];

        // ... and use it to prepare and send a request
        $checkIfQuestionExists = $db->prepare("SELECT * FROM questions WHERE id = ?");
        $checkIfQuestionExists->execute(array($question_id));
        
         // If there's more than 0 result...
        if($checkIfQuestionExists->rowCount() > 0) {

            // ... we get all the relative infos
            $questionInfos = $checkIfQuestionExists->fetch();

            // We here check that the current user is also the author of that question
            if($questionInfos["author_id"] === $_SESSION["id"]) {
                
                // ... we store the infos
                $question_title = $questionInfos["title"];
                $question_content = $questionInfos["content"];

                // As we used the nl2br method to store the content data in the DB,
                // we know have to replace the stored <br> tags into spaces.
                $question_content = str_replace("<br />", "", $question_content);

            } else {
                $errorMsg = "Vous n'êtes pas l'auteur de cette question, Ouste !";
            }
        } else {
            $errorMsg = "Aucune question n'a été trouvée !";
        }
    } else {
        $errorMsg = "Aucune question n'a été trouvée !";
    }