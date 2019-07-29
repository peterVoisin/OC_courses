<?php 
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
 
//liste des posts
function listPosts()
{
	$postManager = new \Wamp\Blog\Model\PostManager();
	$posts = $postManager->getPosts();
	
	require('view/frontend/listPostView.php');
}
//affichage du post
function post()
{
	$postManager = new \Wamp\Blog\Model\PostManager();
	$commentManager =  new \Wamp\Blog\Model\CommentManager();
	
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	
	require('view/frontend/postView.php');
}
//ajouter un commentaire
function addComment($postId, $author, $comment)
{
    $commentManager = new \Wamp\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id='. $postId);
    }
}
//affichage d'un seul commentaire
function comment()
{
	$commentManager = new \Wamp\Blog\Model\CommentManager();
	
	$viewComment = $commentManager->getComment($_GET['id']);
	require('view/frontend/commentView.php');
}
//modif d'un seul commentaire
function edComment($author, $comment, $getId)
{
	$commentManager = new \Wamp\Blog\Model\CommentManager();
	
	$commentEdit = $commentManager->editComment($author, $comment, $getId);
	
	if ($commentEdit === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
	
        header('Location: index.php?action=comment&id='.$getId);
    }
}