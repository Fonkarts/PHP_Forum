<?php

    require("actions/database.php");

    if(isset($_GET["id"]) AND !empty($_GET["id"])) {
        
        $question_id = $_GET["id"];

        $checkIfQuestionExists = $db->prepare("SELECT * FROM questions WHERE id = ?");
        $checkIfQuestionExists->execute(array($question_id));
        
        if($checkIfQuestionExists->rowCount() > 0) {
            $questionInfos = $checkIfQuestionExists->fetch();
            if($questionInfos["author_id"] === $_SESSION["id"]) {
                
                $question_title = $questionInfos["title"];
                $question_content = $questionInfos["content"];

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