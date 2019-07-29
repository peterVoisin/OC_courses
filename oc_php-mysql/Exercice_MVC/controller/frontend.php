<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \coursMVC\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \coursMVC\Blog\Model\PostManager();
    $commentManager = new \coursMVC\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \coursMVC\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

///////////////
// Exercice MVC
// Récupérer le commentaire à modifier et son billet
function selectComment()
{
    $postManager = new \coursMVC\Blog\Model\PostManager();
    $commentManager = new \coursMVC\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['postId']);
    $comment = $commentManager->getComment($_GET['comId']);

    require('view/frontend/updateComView.php');
}

// Update du commentaire
function updateComment($commentId, $author, $comment, $postId)
{
    $commentManager = new \coursMVC\Blog\Model\CommentManager();

    $updatedLines = $commentManager->updateComment($commentId, $author, $comment);

    if ($updatedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
// Exercice MVC
///////////////