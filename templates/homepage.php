<!DOCTYPE html>
<html lang="fr">
<head>
<?php 
    $title = "Blog PHP Openclassrooms"; 
    require_once 'head.php';
?>    
</head>
<body>
    <div class="container">
        <?php require_once 'templates/header.php'?>
        <main>
            <span class="">
                <?php
                    if (isset($_SESSION['mailsend']))
                    {
                        echo $_SESSION['mailsend'];
                        unset($_SESSION['mailsend']);
                    }
                ?>
            </span>
            <section class="catch_phrase">
                <h1>Martin Birikorang</h1>
            </section>
            <section class="about_me">
            <h2>Bienvenue <?php if (isset($_SESSION['accountCreated'])){echo $_SESSION['accountCreated'];} unset($_SESSION['accountCreated']);?> sur mon blog !</h2>
                <div class="about_sentences">
                    <p class="about_paragraph">
                        <span class="bracket">{</span>
                        Je suis étudiant Openclassrooms.
                        Dans le cadre du parcours <b>Développeur d'Applications PHP / Symfony</b>. 
                    </p>
                    <p class="about_paragraph">
                        Je réalise ce blog pour monter en compétence, et démontrer que je peux vous aider à réaliser le votre.
                    </p>
                    <p class="about_paragraph">
                        Ici, je serai ravi de vous partager mes réalisations. <br> Par la même occasion, je vous partagerai mes découvertes dans l'univers de la programmation informatique. 
                        Pour cela, n'hésitez pas à lire mes articles. 
                    </p>
                    <p>
                        Bonne découvertes et bonne lecture...
                        <span class="bracket">}</span>
                    </p>
                </div>
                <ul class="about_links">
                    <li class="about_githubLink about_link"><a href="https://github.com/akkabb" class="github_btn"><i class="fa fa-github" aria-hidden="true"></i>Mon Github</a></li>
                    <li class="about_cv about_link"><a href="img/CV/CV_dev.pdf" class="cv_btn"><i class="fa fa-file" aria-hidden="true"></i>Voir mon CV</a></li>
                    <li class="about_twitterLink about_link"><a href="https://twitter.com/" class="twitter_btn"><i class="fa fa-twitter" aria-hidden="true"></i>Mon Twitter</a></li>
                </ul>
            </section>
            <section class="contact_form">
                <h2>Me contacter</h2>
                <form action="index.php?action=contactForm" method="POST">
                    <label for="email">mail</label>
                    <input type="email" name="email" id="email" value="<?= $email ?? '' ?>">
                    <?php if ($errors['email']) : ?>
                        <p class="text_danger"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                    <br>
                        <label for="firstname">prenom</label>
                        <input type="text" name="firstname" id="firstname" value="<?= $firstname ?? '' ?>">
                        <?php if ($errors['firstname']) : ?>
                            <p class="text_danger"><?= $errors['firstname'] ?></p>
                        <?php endif; ?> 
                    <br>
                        <label for="lastname">nom</label>
                        <input type="text" name="lastname" id="lastname" value="<?= $lastname ?? '' ?>">
                        <?php if ($errors['lastname']) : ?>
                            <p class="text_danger"><?= $errors['lastname'] ?></p>
                        <?php endif; ?>
                    <br>
                    <label for="message">message</label>
                    <textarea name="message" id="" cols="30" rows="10"></textarea>
                    <?php if ($errors['message']) : ?>
                        <p class="text_danger"><?= $errors['message'] ?></p>
                    <?php endif; ?>
                    <br>
                    <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                    <button type="submit">Envoyer</button>
                </form>
            </section>
            <!-- A consever pour utiliser pour les posts <img src="https://picsum.photos/200/300" alt="test image "> -->
        </main>
        <?php require_once 'templates/footer.php' ?>
        
    </div>
</body>
</html>