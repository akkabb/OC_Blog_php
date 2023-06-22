<!DOCTYPE html>
<html lang="fr">
<head>
<?php 
    $title = "Error Page"; 
    require_once 'head.php';
?>    
</head>
<body>
    <div class="container">
        <?php //require_once('templates/header.php')?>

        <main class="error_Back">
            <span class="pageNotFound">
                <p>La page n'existe pas</p>
            </span>
            <span class="back_to_home">
                <p><a href="index.php" class="back_to_home_link">Direction la page accueil</a></p>
            </span>
        </main>
        <?php require 'templates/footer.php';?>
    </div>
</body>

</html>