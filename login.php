<?php 
    require("actions/users/loginAction.php"); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include "includes/head.php" ?>
</head>
<body>
    <br><br>
        <form class="container" method="POST">

            <?php if(isset($errorMsg)) {echo "<p>" . $errorMsg . "</p>";}?>

            <div class="mb-3">
                <label for="username" class="form-label">Pseudo</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de Passe</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
            <br><br>
            <a href="signup.php"><p>Je n'ai pas de compte, je m'inscris</p></a>
        </form>
        
</body>
</html>