<?php $title = 'Erreur'; ?>

<?php ob_start(); ?>
<h1>Une Erreur est survenu</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<p>L'erreur est : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
