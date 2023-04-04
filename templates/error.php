<?php $title = "Le Blog PHP Openclassrooms"; ?>

<?php ob_start(); ?>
<h1></h1>
<p>Une erreur est survenue : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>