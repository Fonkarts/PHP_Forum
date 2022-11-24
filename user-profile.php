<?php 
    session_start();
    require("actions/users/getOneUserAction.php");
    require("actions/questions/getAllQuestionsFromUser.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include "includes/head.php"; ?>
</head>
<body>
    <?php include "includes/navbar.php"; ?> 

    <?php 
    if(isset($errorMsg)) {echo $errorMsg;}
    ?>
    <section class="user-profile-infos container">
        <br><br>
        <?php 
        if(isset($user_firstname)) {
            ?> 
                <div class="card mb-3 user-profile-card" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="assets/img/user-profile-test.jpg" class="user-profile-img img-thumbnail" style="width: 200px; display: block;"alt="user photo">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $username?></h5><br>
                                <p class="card-text"><?= "Nom : " . $user_lastname?></p>
                                <p class="card-text"><?= "Prénom : " . $user_firstname?></p> 
                            </div>
                        </div>
                    </div>
                </div>  
            <?php
        }      
        ?>
    </section>

    <section class="user-questions container justify-content-center">
        <h2>Mes questions</h2>
        <?php 
        if($getAllQuestionsFromUser->rowCount() > 0) {
            while($question = $getAllQuestionsFromUser->fetch()) {
                ?> 
                <br>
                <div class="card">
                    <h5 class="card-header question-title">
                        <?= $question["title"] ?>
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            <?= $question["content"] ?>
                        </p>
                        <a href="get-one-question.php?id=<?=$question["id"]?>" class="btn read-button">
                            Voir
                        </a>
                        <a href="edit-question.php?id=<?= $question["id"]?>" class="btn edit-button">
                            Modifier
                        </a>
                        <a href="actions/questions/deleteQuestionAction.php?id=<?= $question["id"]?>" class="btn delete-button">
                            Supprimer
                        </a>
                    </div>
                    <h5 class="card-footer question-footer">
                        <?= "Publié par " . $question["author"] . 
                        ", le " . $question["publishing_date"] . "." ?>
                    </h5>
                </div>
                <br>
                <?php
            }
        } else {
            ?> 
                <p>Vous n'avez pas encore publié d'article !</p>
            <?php
        }
        ?>
    </section>
</body>
</html>