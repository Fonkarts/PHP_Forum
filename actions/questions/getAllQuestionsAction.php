<?php
    require("actions/database.php");

    // query plutôt que prepare parce qu'on va télécharger TOUS les résultats, pas de sélection
    $getAllQuestions = $db->query("SELECT id, author, title, content, publishing_date FROM questions ORDER BY id DESC");
    
    if(isset($_GET["search"]) AND !empty($_GET["search"])) {
        $user_search = $_GET["search"];

        $getAllQuestions = $db->query('SELECT id, author_id, author, title, content, publishing_date FROM questions WHERE title LIKE "%'.$user_search.'%" ORDER BY id DESC');
    
        
    }