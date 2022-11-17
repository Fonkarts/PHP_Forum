<?php 

require("actions/database.php");

if(isset($_POST["validate"])) {
    if(!empty($_POST["title"]) AND !empty($_POST["content"])) {
        $edited_question_title = htmlspecialchars($_POST["title"]);
        $edited_question_content = nl2br(htmlspecialchars($_POST["content"]));

        $insertEditedQuestion = $db->prepare("UPDATE questions SET title = ?, content = ? WHERE id = ?");
        $insertEditedQuestion->execute(array($edited_question_title, $edited_question_content, $question_id));

        header("Location: my-questions.php");
    } else {
        $errorMsg = "Veuillez compléter tous les champs !";
    }
}