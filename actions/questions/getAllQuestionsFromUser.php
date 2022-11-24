<?php

require("actions/database.php");

// We here get all the questions from an user
$getAllQuestionsFromUser = $db->prepare("SELECT * FROM questions WHERE author_id = ? ORDER BY id DESC");
// To do so we get all the questions where the author_id has the same value as the SESSION id
$getAllQuestionsFromUser->execute(array($_SESSION["id"]));