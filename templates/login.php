<!DOCTYPE html>
<html lang="fr">
<head>
<?php 
    $title = "Blog PHP | Se Connecter"; 
    require_once 'head.php';
?>  
</head>
<body>
    <div class="container">
        <?php require_once 'templates/header.php'?>

        <main class="main_login">
            <section class="form_login">
                <?php
                if (isset($_SESSION['login_failed'])) {
                    echo $_SESSION['login_failed'];
                    unset($_SESSION['login_failed']);
                    }
                ?>
                <h2>Se connecter</h2>
                <form action="index.php?action=logUser" method="post">
                    <div class="login_form-email">
                        <label for="email">EMAIL</label>
                        <input type="email" name="email" id="loginEmail" value="<?= $email ?? '' ?>" required>
                    </div>
                    <br>
                    <small>L'email utilisé lors de la création de compte</small>
                    <!-- <?php if ($errors['email']) : ?>
                        <p class="text_danger"><?= $errors['email'] ?></p>
                    <?php endif; ?> -->
                    <br>
                    <div class="login_form-password">
                        <label for="password">MOT DE PASSE</label>
                        <input type="password" name="password" id="loginPassword" value="<?= $password ?? '' ?>" required>
                    </div>
                    <br>
                    <input type="hidden" name="token" value="<?= Token::generate();?>">
                    <div class="login_form-submit">
                        <button type="submit">Se connecter</button>
                    </div>
                </form>
                <p><a href="index.php?action=register" class="login_link-register">Pas encore inscrit? Cliquez ici pour créer votre compte !</a></p>
            </section>
        </main>
        <?php require 'templates/footer.php';?>
    </div>
</body>

</html>
