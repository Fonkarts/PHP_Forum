<?php

require("actions/database.php");

$getAllMyQuestions = $db->prepare("SELECT * FROM questions WHERE author_id = ? ORDER BY id DESC");
$getAllMyQuestions->execute(array($_SESSION["id"]));