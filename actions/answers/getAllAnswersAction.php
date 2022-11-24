<?php 
    require("actions/database.php");
    
    // Gets all the answers from one question from the DB
    $getAllAnswers = $db->prepare("SELECT * FROM answers WHERE question_id = ? ORDER BY id DESC");
    $getAllAnswers->execute(array($question_id));