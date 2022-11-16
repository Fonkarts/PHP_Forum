<?php

require("actions/database.php");

if(isset($_POST["validate"])) {
    if(!empty($_POST["title"]) AND !empty($_POST["content"])) {

        $question_title = htmlspecialchars($_POST["title"]);
        // The nl2br method transforms [saut de lignes] to <br>
        $question_content = nl2br(htmlspecialchars($_POST["content"]));
        $question_date = date("d/m/Y");
        $question_author_id = $_SESSION["id"];
        $question_author = $_SESSION["username"];

        $insertNewQuestion = $db->prepare("INSERT INTO questions(title, content, author_id, author, publishing_date) VALUES(?, ?, ?, ?, ?)");
        $insertNewQuestion->execute(
            array(
                $question_title, 
                $question_content, 
                $question_author_id, 
                $question_author, $question_date
            ));

            $successMsg = "Votre question a bien été publiée !";

    } else {
        $errorMsg = "Veuillez compléter tous les champs !";
    }
}