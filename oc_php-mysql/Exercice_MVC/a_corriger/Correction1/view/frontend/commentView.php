<?php $title = 'Commentaire'; ?>

<?php ob_start(); ?>

<?php 
while ($data = $viewComment->fetch()){
	?>
<p><a href="index.php?action=post&amp;id=<?= $data['post_id'] ?>">Retour à la liste des billets</a></p>
    <div class="news">
        <h3>
			Author : 
            <?= htmlspecialchars($data['author']) ?>
            
        </h3>
        
        <p>
			Message:<br/>
            <?= nl2br(htmlspecialchars($data['comment'])) ?>
            <br />
        </p>
    </div>

<h2>Modifier :</h2>
<form action="index.php?action=edComment&amp;id=<?= $data['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea name="comment" maxlength="255" id="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
}
$viewComment->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/template.php'); ?>