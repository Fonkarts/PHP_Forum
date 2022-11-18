<?php
    require("actions/users/securityAction.php");
    require("actions/questions/getAllQuestionsFromUser.php") ;
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require("includes/head.php");?>
    </head>
    <body>
        <?php require("includes/navbar.php");?>

        <div class="container">

            <?php 
            
                while($question = $getAllQuestionsFromUser->fetch()) {
                    ?> 
                    <br><br>
                    <div class="card">
                        <h5 class="card-header fw-bold">
                            <?= $question["title"] ?>
                        </h5>
                        <div class="card-body">
                            <p class="card-text">
                                <?= $question["content"] ?>
                            </p>
                            <a href="get-one-question.php?id=<?=$question["id"]?>" class="btn btn-primary">
                                Accéder à la question
                            </a>
                            <a href="edit-question.php?id=<?= $question["id"]?>" class="btn btn-warning">
                                Modifier la question
                            </a>
                            <a href="actions/questions/deleteQuestionAction.php?id=<?= $question["id"]?>" class="btn btn-danger">
                                Supprimer la question
                            </a>
                        </div>
                        <h5 class="card-footer">
                            <?= "Publié par " . $question["author"] . 
                            ", le " . $question["publishing_date"] . "." ?>
                        </h5>
                    </div>
                    <br><br>
                    <?php
                }

            ?>

        </div>

        
    </body>
</html>