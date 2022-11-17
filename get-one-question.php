<?php
    session_start();
    require("actions/questions/getOneQuestionAction.php") 
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
            <div class="card">
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
            <br><br>
            
            <?php
        }    
        ?>

    </div>

</body>
</html>