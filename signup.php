<?php require("actions/signupAction.php"); ?>

<!DOCTYPE html>
<html lang="fr">
    <?php include "includes/head.php" ?>
    <body>
        <br><br>
        <form class="container" method="POST">

            <?php if(isset($errorMsg)) {echo "<p>" . $errorMsg . "</p>";}?>

            <div class="mb-3">
                <label for="username" class="form-label">Pseudo</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de Passe</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
            <br><br>
            <a href="login.php"><p>J'ai déjà un compte, je me connecte</p></a>
        </form>
        
    </body>
</html>

<!-- REPRENDRE à 41:40 !!! -->