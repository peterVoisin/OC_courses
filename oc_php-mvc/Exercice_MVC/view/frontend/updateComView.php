<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php?action=post&amp;id=<?= $post['id'] ?>">Retour au billet</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<!-- ... -->

<h4>Vous allez modifier le commentaire posté par <strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></h4>

<form action="index.php?action=updateComment&amp;comId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Nouvel(le) auteur(e)</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Modifier le commentaire</label><br />
        <textarea id="comment" name="comment"><?= nl2br(htmlspecialchars($comment['comment'])) ?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

