<?php 
    require("actions/users/securityAction.php");
    require("actions/questions/getQuestionToEditAction.php");
    require("actions/questions/editQuestionAction.php");
     
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require("includes/head.php"); ?>
    </head>
    <body>
    <?php require("includes/navbar.php") ?>
        <br><br>
        <div class="container">
        <?php 
            if(isset($errorMsg)) {
                echo "<p>" . $errorMsg . "</p>";
            } else if (isset($successMsg)) {
                echo "<p>" . $successMsg . "</p>";
            }

            if(isset($question_content)) {
                ?> 
                <form method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Titre</label><br>
                        <input type="text" class="form-control" name="title" value=<?= $question_title?>>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold">Contenu</label> <br>
                        <textarea type="text" class="form-control" name="content"><?= $question_content?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="validate">Envoyer modifications</button>
                </form>
                <?php
            }
        ?>
        </div>
    </body>
</html>

<!-- REPRENDRE à 4:01 !!! -->