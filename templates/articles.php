<?php
    include __DIR__ . "/../src/model/connect.php";
    $postRepository = new PostRepository;
    $posts = $postRepository->getPosts();
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
        <link rel="stylesheet" href="../css/style.css">
        <title>Blog PHP | Articles </title>
    </head>
    <body>
        <div class="container">
            <header>
                <a href="#" class="logo_link"><img src="../img/logo.png" class="logo" alt="logo"></a>
                <nav class="menu">
                    <ul class="menu_list">
                        <li><a href="/monpremierblogenphp/templates/homepage.php">Accueil</a></li>
                        <li><a href="/monpremierblogenphp/templates/articles.php">Articles</a></li>
                        <li><a href="/monpremierblogenphp/templates/login.php">Se connecter</a></li>
                        <li><a href="/monpremierblogenphp/templates/register.php">S'inscrire</a></li>
                    </ul>
                </nav>
            </header>
            <main>
                <h2>Articles</h2>
                <h3>Ici vous pouvez consulter les derniers articles :</h3>
                <?php
                    foreach ($posts as $post){
                ?>
                <div class="article_news">
                    <img src="https://picsum.photos/400/200" alt="image_random" class="article_randomPictures">
                    <h3>
                        <?= htmlspecialchars($post->title); ?>
                        <br>
                        <em>écrit le <?=$post->creationDate; ?></em>
                        <em>par :  <?= htmlspecialchars($post->creationBy); ?></em>
                    </h3>
                    <p><?= $post->leadSentence;?></p>
                    <!-- <p>
                        <?=
                            //we display the content
                            nl2br(htmlspecialchars($post->content));
                        ?>
                    </p> -->
                    <p>
                        <!-- <em><a href="index.php?action=post&id=<?= urlencode($post->id) ;?>">Lire l'article</a></em> -->
                        <em><a href="../index.php?action=post&id=<?= urlencode($post->id) ;?>">Lire l'article</a></em>
                    </p>
                </div>
                <?php
                    }//The end of the loop
                ?>
            </main>
            <footer>
                <p class="footer">2023 © Tous droits réservés</p>
            </footer>
        </div>
    </body>
</html>