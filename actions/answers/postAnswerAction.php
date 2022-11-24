<?php 

require("actions/database.php");


if(isset($_POST["validate"])) {
    // if the answer has content...
    if(!empty($_POST["answer"])) {
        // ... we transform line breaks into <br> tags, sanitize the input and store it into a variable
        $answer_content = nl2br(htmlspecialchars($_POST["answer"]));

        // ... then we post the answer
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