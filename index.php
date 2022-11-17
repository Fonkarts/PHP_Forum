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

        <div class="container">

            <h1 style="text-align: center;">Index</h1>
            <br><br>

            <form method="GET">

                <div class="form-group row">
                    <div class="col-8">
                        <input type="search" name="search" class="from-control">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-success">Rechercher</button>
                    </div>
                </div>
            </form>
            <br>
            <?php 
            
                while($question = $getAllQuestions->fetch()) {
                    ?> 
                    <br><br>
                    <div class="card">
                        <div class="card-header fw-bold">
                            <a href="get-one-question.php?id=<?=$question["id"]?>">
                                <?= $question["title"]?>
                            </a>
                        </div>
                        <div class="card-body">
                        <?= $question["content"]?>
                        </div>
                        <div class="card-footer">
                            <?= "Publié par " . $question["author"] . ", le " . $question["publishing_date"]?>
                        </div>
                    </div>
                    <br><br>
                    <?php
                }
            
            ?>
        </div>
    </body>
</html>

