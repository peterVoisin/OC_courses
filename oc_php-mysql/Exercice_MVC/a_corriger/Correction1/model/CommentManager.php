<?php

namespace Wamp\Blog\Model; 

require_once('model/Manager.php');

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
	
	//récup un comment
	public function getComment($getId)
	{
		$db = $this->dbConnect();
        $viewComment = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ? ORDER BY comment_date DESC');
        $viewComment->execute(array($getId));

        return $viewComment;
	}
	//modif comment
	public function editComment($author, $comment, $getId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('UPDATE comments SET author = ?, comment  = ? WHERE id = ?');
		$commentEdit= $comments->execute(array($author, $comment, $getId));
		
		return $commentEdit;
		
	}
}