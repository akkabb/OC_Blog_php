<?php $title = "Le Blog PHP Openclassrooms"; ?>
<?= require_once('templates/header.php'); ?>
<?php ob_start(); ?>
<h1></h1>
<p>Une erreur est survenue : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>