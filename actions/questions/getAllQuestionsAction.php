<?php
    require("actions/database.php");

    // We here use the "query" method instead of the "prepare" one, because we want all the data. No selection.
    $getAllQuestions = $db->query("SELECT id, author, title, content, publishing_date FROM questions ORDER BY id DESC");
    
    // If there is a non-empty search parameter in the url...
    if(isset($_GET["search"]) AND !empty($_GET["search"])) {
        // ... we store that value
        $user_search = $_GET["search"];

        // ... and we get all the questions from the DB that contains the searched word(s)
        $getAllQuestions = $db->query('SELECT id, author_id, author, title, content, publishing_date FROM questions WHERE title LIKE "%'.$user_search.'%" ORDER BY id DESC');
    }