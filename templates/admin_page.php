<!DOCTYPE html>
<html lang="fr">
<head>
<?php 
    $title = "Admin Pannel"; 
    require_once 'head.php';
    ?>  
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="container">
        <?php require_once 'templates/header.php'?>

        <main class="main_Admin">
            <span class="admin_greetings">
                <h2> Bienvenue  <?php  if (isset($_SESSION['username'])){echo htmlentities($_SESSION['username']) ;}?></h2>
            </span>
            <span>
                <?php
                if (isset($_SESSION['deleteComment'])) {
                    echo htmlentities($_SESSION['deleteComment']);
                    unset($_SESSION['deleteComment']);
                }
                elseif (isset($_SESSION['submitComment'])) {
                    echo htmlentities($_SESSION['submitComment']);
                    unset($_SESSION['submitComment']);
                }
                elseif (isset($_SESSION['passAdmin'])) {
                    echo htmlentities($_SESSION['passAdmin']);
                    unset($_SESSION['passAdmin']);
                }
                elseif (isset($_SESSION['passUser'])) {
                    echo htmlentities($_SESSION['passUser']);
                    unset($_SESSION['passUser']);
                }
                ?>
            </span>
            <section class="comment_Admin">
                <h2 class="comment_displayAll_title">La liste de tous les commentaires</h2>
                <?php foreach ($comments as $comment) {?>
                    <article class="comment_displayAll">
                        <h3><?= htmlentities($comment->comment); ?></h3>
                        <h3> écrit par <?= htmlentities($comment->created_by); ?></h3>
                        <p class="comment_display_time"> le : <?= htmlspecialchars($comment->creationDate); ?></p>
                            <span class="comment_Admin_validate">
                                <a href="index.php?action=submitComment&id=<?= urlencode($comment->id);?>" class="admin_btn_validate">Valider</a>
                            </span>
                            <span class="comment_Admin_delete">
                                <a href="index.php?action=deleteComment&id=<?= urlencode($comment->id);?>" class="admin_btn_delete">Supprimer</a>
                            </span>
                    </article>
                <?php } ?>
            </section>
            <section class="user_Admin">
                <h2 class="user_displayAll_title">La liste de tous les utilisateurs du blog</h2>
                <?php //var_dump($users)?>
                <?php foreach ($users as $user) {?>
                    <article class="user_displayAll">
                        <p> <?= htmlentities($user->username); ?></p>
                        <?php if ($user->role === '2') { ?>
                            <span class="user_PassAdmin">
                                <a href="index.php?action=passAdmin&id=<?= urlencode($user->id);?>">Passer ADMIN</a>
                            </span>
                        <?php } else { ?>    
                            <span class="admin_PassUser">
                                <a href="index.php?action=passUser&id=<?= urlencode($user->id);?>">Passer USER</a>
                            </span>
                        <?php } ?>
                    </article>
                <?php } ?>
            </section>
        </main>
        <?php require 'templates/footer.php';?>
    </div>
</body>

</html>