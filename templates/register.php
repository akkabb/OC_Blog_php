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
    <link rel="stylesheet" href="../css/style.css">
    <title>Blog PHP | S'inscrire </title>
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
            <section class="form_register">
                <h2>S'inscrire</h2>
                <form action="/" method="post">
                    <label for="userName">NOM D'UTILISATEUR</label>
                    <br>
                    <input type="text" name="userName" id="">
                    <br>
                    <label for="email">EMAIL</label>
                    <br>
                    <input type="email" name="email" id="registerEmail" value="<?= $email ?? '' ?>">
                    <br>
                    <!-- <?php if ($errors['email']) : ?>
                        <p class="text_danger"><?= $errors['email'] ?></p>
                    <?php endif; ?> -->
                    <label for="firstname">PRENOM</label>
                    <br>
                    <input type="text" name="firstname" id="">
                    <br>
                    <label for="lastname">NOM</label>
                    <br>
                    <input type="text" name="lastname" id="">
                    <br>
                    <label for="password">MOT DE PASSE</label>
                    <br>
                    <input type="password" name="password" id="loginPassword" value="<?= $password ?? '' ?>">
                    <br>
                    <br>
                    <button type="submit">S'inscrire</button>
                </form>
            </section>
        </main>
        <footer>
            <p class="footer">2023 © Tous droits réservés</p>
        </footer>
    </div>
</body>

</html>