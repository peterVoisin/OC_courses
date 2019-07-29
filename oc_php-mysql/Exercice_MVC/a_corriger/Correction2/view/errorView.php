<?php $title = 'Erreur - Mon blog'; ?>

<?php ob_start(); ?>
<h1>Erreur</h1>
<h2><?= $errorMessage ?> </h2>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>