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
    <title>Blog PHP Openclassrooms | Ajouter une article</title>
</head>
<body>
    <div class="container">
        <?php require_once('templates/header.php')?>
        <main>

            <?php if (isset($errors) && !empty($errors)) { ?>
                <div>
                    Vérifiez vos informations
                </div>
            <?php } ?>
            <section class="add_post_form">
                <div class="comment_form">

                    <form action="index.php?action=addPost" method="POST">
                        <legend>Ajouter un article</legend>

                        <!--title-->
                        <div class="comment_form-title">
                            <label for="title">Titre</label>
                            <input
                                type="text"
                                name="title"
                                value="<?= isset($input) && isset($input['title']) ? $input['title'] : '' ?>"
                            >
                        </div>
                        <?php if (isset($errors) && isset($errors['title_not_set'])) { ?>
                            <p class="text_danger">
                                Le titre n'est pas facultatif et doit faire plus de 6 characteres
                            </p>
                        <?php } ?>

                        <!--lead_sentence-->
                        <div class="comment_form-lead_sentence">
                            <label for="lead_sentence">Le résumé </label>
                            <input
                                type="text"
                                name="lead_sentence"
                                value="<?= isset($input) && isset($input['lead_sentence']) ? $input['lead_sentence'] : '' ?>"
                            >
                        </div>
                        <?php if (isset($errors) && isset($errors['lead_sentence_not_set'])) { ?>
                            <p class="text_danger">
                                Le résumé n'est pas facultatif et doit faire plus de 6 characteres
                            </p>
                        <?php } ?>

                        <!--content-->
                        <div class="comment_form-content">
                            <label for="content">Votre message</label>
                            <textarea name="content" cols="30" rows="10">
                                <?= isset($input) && isset($input['content']) ? $input['content'] : '' ?>
                            </textarea>
                        </div>
                        <?php if (isset($errors) && isset($errors['content_not_set'])) { ?>
                            <p class="text_danger">
                                Le contenu n'est pas facultatif et doit faire plus de 20 characteres
                        </p>
                        <?php } ?>
                        <div class="comment_form-submit">
                            <input type="submit" value="valider">
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <? require_once('templates/footer.php') ?>
    </div>
</body>
</html>