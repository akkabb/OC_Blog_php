<?php
    //include __DIR__ . "/../src/connect.php";
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
    <link rel="stylesheet" href="css/articles.css">
    <title>Blog PHP Openclassrooms | details de l'article</title>
</head>
<body>
    <div class="container">
        <?php require_once('templates/header.php')?>
        <main>
                <article>
                    <h1><?= htmlspecialchars($post->title); ?></h1>
                    <h3>
                        Publiée le <?=$post->creationDate; ?> par <?= htmlspecialchars($post->creationBy); ?>
                    </h3>
                    <img src="https://picsum.photos/400/200" alt="image_random" class="article_randomPictures">
                    <h2><?= $post->leadSentence;?></h2>
                    <p>
                        <?= $post->content;?>
                    </p>
                    <?php 
                        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 1) {?>
                            <div class="article_AdminEdit">
                                <strong><a href="index.php?action=updateArticle&id=<?=$post->id?>" class="article_modify">Modifier</a></strong>
                                
                                <strong><a href="index.php?action=deleteArticle&id=<?=$post->id?>" class="article_delete">Supprimer</a></strong>
                            </div></br> 
                        <?php 
                        }
                    ?> 
                </article>
                <section class="display_comments" id="display_comments">
                    <h2>Commentaires</h2>
                    <?php if (!empty($comments)) {?>
                        <?php var_dump($comments)?>
                        <?php foreach ($comments as $comment) { ?>
                            <div class="comment_news">
                                <div class="comment_contentWrap">
                                    <p><?= htmlspecialchars($comment->comment); ?></p>
                                </div>
                                <p> écrit par <?= htmlspecialchars($comment->created_by); ?></p>
                                <p> le : <?= htmlspecialchars($comment->creationDate); ?></p>
                                <p><?php /* $comment->id*/ ?></p>
                            </div>
                        <?php }?> 
                    <?php } else {?>
                        <div class="comment_area">
                            <p>Aucun commentaire pour le moment</p>
                        </div>
                    <?php } ?>
                </section>
                <section class="comment_form">
                    <?php if (isset($_SESSION['username'])){?>
                    <div class="comment_form">
                        <form action="index.php?action=addComment&id=<?= $post->id ?>" method="POST">
                            <legend>Laisser un commentaire sur cet article</legend>
                            <div class="comment_form-author">
                                <label for="author">Auteur</label>
                                <input type="text" name="author" id="" value=<?= $_SESSION['username'];?>>
                            </div>
                            <div class="comment_form-content">
                                <label for="comment">Votre message</label>
                                <textarea name="comment" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="comment_form-submit">
                                <input type="submit" value="valider">
                            </div>
                        </form>
                    </div>
                    <?php } else{?>
                        <p ><a href="index.php?action=register" style="color:#fff;" class="comment_allowComment">Créer un compte et vous pourrez laisser un commentaire !</a></p>
                    <?php }?>
                </section>
        </main>
        <? require_once('templates/footer.php') ?>
    </div>
</body>
</html>

