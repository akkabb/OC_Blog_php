<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/css/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Basic&family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Error Page</title>
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
        <?php require('templates/footer.php');?>
    </div>
</body>

</html>