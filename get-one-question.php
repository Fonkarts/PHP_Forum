<?php
    session_start();
    require("actions/questions/getOneQuestionAction.php");
    require("actions/answers/postAnswerAction.php");
    require("actions/answers/getAllAnswersAction.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include "includes/head.php"; ?>
</head>
<body>
    <?php include "includes/navbar.php"; ?>
    <br><br>

    <div class="container">

        <?php 
        if(isset($errorMsg)) {
            echo "<p>" . $errorMsg . "</p>";
        } 
        
        if(isset($question_date)) {
            ?> 
            <br><br>
            <section class="question-content">
                <div class="card question-card">
                    <div class="card-header fw-bold">
                        <?= $question_title?>
                    </div>
                    <div class="card-body">
                        <?= $question_content?>
                    </div>
                    <div class="card-footer">
                        <?= "Publié par " . $question_author . ", le " . $question_date?>
                    </div>
                </div>
            </section>
            <br>
            <section class="write-answer">
                <form class="form-group" method="POST">
                    <div class="mb-3">
                        <label for="answer" class="form-label fw-bold">Réponse :</label>
                        <textarea name="answer" id="answer" class="form-control"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary" name="validate">Envoyer</button>
                    </div>
                </form>
            </section>
            <br><br>
            <section class="answers">
            <?php 
                while($answer = $getAllAnswers->fetch()) {
                    ?> 
                    <div class="card answer-card">
                        <div class="card-header fw-bold">
                            <?= $answer["answer_author"] . " a répondu :"?>
                        </div>
                        <div class="card-body">
                            <?= $answer["answer_content"]?>
                        </div>
                        <div class="card-footer">
                            <?= "Publié le " . $answer["answer_date"]?>
                        </div>
                    </div>
                    <br><br>
                    <?php
                }
            ?>
            </section>

            <?php
        }    
        ?>

    </div>

</body>
</html>