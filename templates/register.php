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
            <section class="form_register">
                <h2>S'inscrire</h2>
                <form action="index.php?action=addUser" method="post">
                    <label for="userName">NOM D'UTILISATEUR</label>
                    <br>
                    <input type="text" name="username" id=""required>
                    <br>
                    <label for="email">EMAIL</label>
                    <br>
                    <input type="email" name="email" id="registerEmail" value="<?= $email ?? '' ?>"required>
                    <br>
                    <!-- <?php if ($errors['email']) : ?>
                        <p class="text_danger"><?= $errors['email'] ?></p>
                    <?php endif; ?> -->
                    <label for="firstname">PRENOM</label>
                    <br>
                    <input type="text" name="firstname" id=""required>
                    <br>
                    <label for="lastname">NOM</label>
                    <br>
                    <input type="text" name="lastname" id=""required>
                    <br>
                    <label for="password">MOT DE PASSE</label>
                    <br>
                    <input type="password" name="password" id="loginPassword" value="<?= $password ?? '' ?>">
                    <br>
                    <br>
                    <input type="hidden" name="token" value="<?= Token::generate();?>">
                    <button type="submit">S'inscrire</button>
                </form>
            </section>
        </main>
        <?php require 'templates/footer.php';?>
    </div>
</body>

</html>