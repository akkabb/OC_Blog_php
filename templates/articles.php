<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php 
        $title = "Blog PHP | Articles";
        require_once 'head.php';
        ?>    
    </head>
    <body>
        <div class="container">
           <?php require 'templates/header.php';?>
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
                        <em><a class="article_news_link"  href="index.php?action=post&id=<?= urlencode($post->id) ;?>">Lire l'article</a></em>
                    </p>
                </div>
                <?php
                    }//The end of the loop
                ?>
            </main>
            <?php require 'templates/footer.php';?>
        </div>
    </body>
</html>