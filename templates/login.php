<?php
// Code temporaire mix O.C. et TUTO web
// const ERROR_REQUIRED = 'Veuillez renseigner ce champ';
// const ERROR_EMAIL = 'Veuillez entrer une adresse mail valide';
// const ERROR_PASSWORD = "Erreur de mot de passe";
// $errors = [
// 	'email' => '',
// 	'password' => ''
// ];

// if ($_SERVER['REQUEST_METHOD'] === 'POST')
// {
//     $_POST = filter_input_array(INPUT_POST, [
// 		'email' => FILTER_SANITIZE_EMAIL
// 	]);
//     $email = $_POST['email'] ?? '';
//     $password = $_POST['password'] ?? '';

//     if (!$email)
// 		$errors['email'] = ERROR_EMAIL;
//     if (!$password)
//         $errors['password'] = ERROR_PASSWORD;
    
//     if(isset($_POST['email']) && isset($_POST['password']))
//     {
//         foreach ($users as $user)
//         {
//             if ($user['email'] === $_POST['email'] && $user['password'] === $_POST['password'])
//             {
//                 $loggedUser = [
//                     'email' => $user['email'],
//                 ];
//             }else{
//                 $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s',
//                 $_POST['email'], 
//                 $_POST['password']
//             );
//             }
//         }
//     }
// }
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
    <title>Blog PHP | Se Connecter </title>
</head>
<body>
    <div class="container">
        <?php require('templates/header.php')?>

        <main class="main_login">
            <section class="form_login">
                <h2>Se connecter</h2>
                <form action="index.php?action=logUser" method="post">
                    <div class="login_form-email">
                        <label for="email">EMAIL</label>
                        <input type="email" name="email" id="loginEmail" value="<?= $email ?? '' ?>">
                    </div>
                    <br>
                    <small>L'email utilisé lors de la création de compte</small>
                    <!-- <?php if ($errors['email']) : ?>
                        <p class="text_danger"><?= $errors['email'] ?></p>
                    <?php endif; ?> -->
                    <br>
                    <div class="login_form-password">
                        <label for="password">MOT DE PASSE</label>
                        <input type="password" name="password" id="loginPassword" value="<?= $password ?? '' ?>">
                    </div>
                    <br>
                    <div class="login_form-submit">
                        <button type="submit">Se connecter</button>
                    </div>
                </form>
                <p><a href="index.php?action=register" class="login_link-register">Pas encore inscrit? Cliquez ici pour créer votre compte !</a></p>
            </section>
        </main>
        <?php require('templates/footer.php');?>
    </div>
</body>

</html>
