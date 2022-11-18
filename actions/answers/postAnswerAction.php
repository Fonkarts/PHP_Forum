<?php 

require("actions/database.php");

if(isset($_POST["validate"])) {
    if(!empty($_POST["answer"])) {
        $answer_content = nl2br(htmlspecialchars($_POST["answer"]));

        $insertAnswer = $db->prepare("INSERT INTO answers(answer_author_id, answer_author, question_id, answer_content, answer_date) VALUES(?, ?, ?, ?, ?)");
        $insertAnswer->execute(array(
            $_SESSION["id"], 
            $_SESSION["username"],
            $_GET["id"],
            $answer_content,
            date("m/d/Y")
        ));
    } else {
        $errorMsg = "Veuillez compléter tous les champs !";
    }

} else {
    $errorMsg = "Veuillez compléter tous les champs !";
}