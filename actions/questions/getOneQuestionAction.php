<?php

require("actions/database.php");

// If there's a question id in the url parameters...
if(isset($_GET["id"]) AND !empty($_GET["id"])) {
    // ... we store it
    $question_id = $_GET["id"];
    // ... and serach for the corresponding question
    $checkIfQuestionExists = $db->prepare("SELECT * FROM questions WHERE id= ?");
    $checkIfQuestionExists->execute(array($question_id));

    // If there's more than 0 result...
    if($checkIfQuestionExists->rowCount() > 0) {

        // ... we get the infos and store it into variables
        $questionInfos = $checkIfQuestionExists->fetch();
        
        $question_title = $questionInfos["title"];
        $question_content = $questionInfos["content"];
        $question_author = $questionInfos["author"];
        $question_date = $questionInfos["publishing_date"];

        // As we used the nl2br method to store the content data in the DB,
        // we know have to replace the stored <br> tags into spaces.
        $question_content = str_replace("<br />", "", $question_content);

    } else {
        $errorMsg = "Aucune question n'a été trouvée !";
    }


} else {
    $errorMsg = "Aucune question n'a été trouvée !";
}