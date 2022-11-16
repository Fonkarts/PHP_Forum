<?php 
    require("actions/questions/publishQuestionAction.php");
    require("actions/users/securityAction.php"); 
?> 

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include "includes/head.php"?>
    </head>
    <body>
        <?php include "includes/navbar.php"?> 
    <br><br>
            <form class="container" method="POST">

                <?php if(isset($errorMsg)) {
                    echo "<p>" . $errorMsg . "</p>";
                    } else if (isset($successMsg)) {
                        echo "<p>" . $successMsg . "</p>";
                    }
                ?>

                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label><br>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Contenu</label> <br>
                    <textarea type="text" class="form-control" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="validate">Envoyer</button>
            </form>
    </body>
</html>