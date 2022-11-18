<?php 

    require("actions/database.php");

    $getAllAnswers = $db->prepare("SELECT * FROM answers WHERE question_id = ? ORDER BY id DESC");
    $getAllAnswers->execute(array($question_id));