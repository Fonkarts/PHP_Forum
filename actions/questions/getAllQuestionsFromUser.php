<?php

require("actions/database.php");

$getAllQuestionsFromUser = $db->prepare("SELECT * FROM questions WHERE author_id = ? ORDER BY id DESC");
$getAllQuestionsFromUser->execute(array($_SESSION["id"]));