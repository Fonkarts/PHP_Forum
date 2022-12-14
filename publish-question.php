<?php 
    require("actions/users/securityAction.php");
    require("actions/questions/publishQuestionAction.php");
     
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
                <!-- If the errorMsg variable is set it will display here -->
                <!-- And so the successMsg -->
                <?php if(isset($errorMsg)) {
                    echo "<p>" . $errorMsg . "</p>";
                    } else if (isset($successMsg)) {
                        echo "<p>" . $successMsg . "</p>";
                    }
                ?>

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Titre</label><br>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">Contenu</label> <br>
                    <textarea type="text" class="form-control" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="validate">Envoyer</button>
            </form>
    </body>
</html>