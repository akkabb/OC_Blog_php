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
    <title>Blog PHP Openclassrooms</title>
</head>
<body>
    <div class="container">
        <header>
            <a href="#" class="logo"><img src="img/logo.png" alt="logo"></a>
            <nav class="menu">
                <ul class="menu_list">
                    <li>Accueil</li>
                    <li>Articles</li>
                    <li>S'inscrire</li>
                    <li>Se connecter</li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="catch_phrase">
                <h1>Martin Birikorang</h1>
            </section>
            <section class="about_me">
                <h2>Bienvenue sur mon blog !</h2>
                <p class="about_paragraph">
                    <p class="about_paragraph">
                    Je suis étudiant Openclassrooms.
                    Dans le cadre du parcours <b>Développeur d'Applications PHP / Symfony</b>. 
                    </p>
                 Je réalise ce blog pour monter en compétence, et démontrer que je peux vous aider à réaliser le votre.
                </p>
                <p class="about_paragraph">
                 Ici, je serai ravi de vous partager mes réalisations. Par la même occasion, je vous partagerai mes découvertes dans l'univers de la programmation informatique. 
                 Pour cela, n'hésitez pas à lire mes articles. Bonne découvertes et bonne lecture...
                </p>
                <ul class="about_links">
                    <li class="about_githubLink"><a href="https://github.com/akkabb"><i class="fab fa-github" aria-hidden="true">Mon Github</i></a></li>
                    <li class="about_cv"><a href="img/CV/CV_dev.pdf">Voir mon CV</a></li>
                    <li class="about_twitterLink"><a href="https://twitter.com/"><i class="fab fa-linkedin" aria-hidden="true"></i>Mon Linkedin</a></li>
                </ul>
            </section>
            <section class="contact_form">
                <h2>Me contacter</h2>
                <form action="/" method="">
                    <label for="email">mail</label>
                    <input type="email" name="email" id="">
                    <br>
                    <div class="form_name">
                        <label for="firstname">prenom</label>
                        <input type="text" name="firstname" id="">
                        <label for="lastname">nom</label>
                        <input type="text" name="lastname" id="">
                    </div>
                    <br>
                    <label for="message">message</label>
                    <textarea name="message" id="" cols="30" rows="10"></textarea>
                    <br>
                    <button type="submit">Envoyer</button>
                </form>
            </section>
            <!-- A consever pour utiliser pour les posts <img src="https://picsum.photos/200/300" alt="test image "> -->
        </main>
        <footer>
            <p class="footer">© Copyright 2023</p>
        </footer>
    </div>
</body>
</html>