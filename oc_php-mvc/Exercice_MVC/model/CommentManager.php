<?php

namespace coursMVC\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    ///////////////
    // Exercice MVC
    // Récupérer le commentaire à modifier
    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $selectCom = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $selectCom->execute(array($commentId));
        $comment = $selectCom->fetch();

        return $comment;
    }

    // Mise à jour du commentaire
    public function updateComment($commentId, $author, $comment)
    {
        $db = $this->dbConnect();
        $update = $db->prepare('UPDATE comments SET comment = :newcom, author = :author, comment_date = NOW() WHERE id = :comId');
        $update->execute(array(
            ':newcom' => $comment,
            ':author' => $author,
            ':comId' => $commentId
        ));

        return $updatedLines;
    }
    // Exercice MVC
    ///////////////
}