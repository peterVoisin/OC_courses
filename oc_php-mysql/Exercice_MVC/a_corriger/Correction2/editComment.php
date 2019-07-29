<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Modification des commentaires</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>
<div class="news">

</div>
<h2>Commentaire</h2>
<form action="index.php?action=modif&amp;commentId=<?= $_GET['commentId'] ?>&amp;id=<?= $_GET['id'] ?>" method="post">
    <div>
        <label for="comment">Commentaire</label><br />
        
        
        <textarea id="comment" name="comment"></textarea>
        
        
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>