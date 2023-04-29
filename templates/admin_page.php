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
    <title>Admin Pannel</title>
</head>
<body>
    <div class="container">
        <?php require_once('templates/header.php')?>

        <main class="main_Admin">
            <span class="admin_greetings">
                <h2> Bienvenue  <?php  if (isset($_SESSION['username'])){echo $_SESSION['username'] ;}?></h2>
            </span>
            <section class="comment_Admin">
                <h3 class="comment_displayAll_title">La liste de tous les commentaires</h3>
                <?php foreach ($comments as $comment) {?>
                    <article class="comment_displayAll">
                        <p><?= htmlspecialchars($comment->comment); ?></p>
                        <p> écrit par <?= htmlspecialchars($comment->created_by); ?></p>
                        <p> le : <?= htmlspecialchars($comment->creationDate); ?></p>
                            <span class="comment_Admin_validate">
                                <a href="index.php?action=submitComment&id=<?=$comment->identifier?>">Valider</a>
                            </span>
                            <span class="comment_Admin_delete">
                                <a href="index.php?action=delete&id=<?=$comment->identifier?>">Supprimer</a>
                            </span>
                    </article>
                <?php } ?>
            </section>
            <section class="user_Admin">
                <h3 class="user_displayAll_title">La liste de tous les utilisateurs du blog</h3>
                <?php //var_dump($users)?>
                <?php foreach ($users as $user) {?>
                    <article class="user_displayAll">
                        <p> <?= htmlspecialchars($user->username); ?></p>
                        <p> <?= htmlspecialchars($user->role); ?></p>
                            <span class="user_PassAdmin">
                                <a href="index.php?action=passAdmin&id=<?=$user->identifier?>">Passer ADMIN</a>
                            </span>
                            <span class="admin_PassUser">
                                <a href="index.php?action=passUser&id=<?=$user->identifier?>">Passer USER</a>
                            </span>
                    </article>
                <?php } ?>
            </section>
        </main>
        <?php require('templates/footer.php');?>
    </div>
</body>

</html>