<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        $title = "Blog PHP Openclassrooms | Ajouter une article"; 
        require_once 'head.php';
    ?>  
    <link rel="stylesheet" href="css/articles.css">
</head>
<body>
    <div class="container">
        <?php require_once 'templates/header.php'?>
        <main class="main_addPost">

            <?php if (isset($errors) && !empty($errors)) { ?>
                <div>
                    Vérifiez vos informations
                </div>
            <?php } ?>
            <section class="add_post_form">
                <div class="comment_form">

                    <form action="index.php?action=addPost" method="POST" class="addPostFORM">
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
        <? require_once 'templates/footer.php' ?>
    </div>
</body>
</html>