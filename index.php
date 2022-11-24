<?php 
    session_start();
    require("actions/questions/getAllQuestionsAction.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "includes/head.php"?>
    </head>
    <body>
        <?php include "includes/navbar.php"?> 

        <section class="container home">
            <br>
            <h1 style="text-align: center;">Home sweet Home</h1>
            <br><br>

            <form method="GET">

                <div class="search-container">
                    <div class="search-bar-container">
                        <input type="search" name="search" class="from-control" placeholder="Chercher une question par mots-clés...">
                    </div>
                    <div class="search-button-container">
                        <button class="btn btn-success">Rechercher</button>
                    </div>
                </div>
            </form>
            <br>
            <?php 
            
                while($question = $getAllQuestions->fetch()) {
                    ?> 
                    <div class="card question-card">
                        <div class="card-header">
                            <a class="question-title" href="get-one-question.php?id=<?=$question["id"]?>">
                                <?= $question["title"]?>
                            </a>
                        </div>
                        <div class="card-body">
                        <?= $question["content"]?>
                        </div>
                        <div class="card-footer question-footer">
                            <?= "Publié par " . $question["author"] . ", le " . $question["publishing_date"]?>
                        </div>
                    </div>
                    <?php
                }
            
            ?>
        </section>
    </body>
</html>

