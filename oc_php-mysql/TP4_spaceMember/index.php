<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <meta charset="utf-8" />
        <title>TP - Space Member</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div>
        <?php
        require 'db.php'; // tu inclus ton fichier avec la connexion à la base de donnée
        
        if (isset($_SESSION['ident']))
        {
            //echo $_SESSION['ident'].'<br/>';
            // requête préparée "SELECT"
            $req = $db->prepare('SELECT * FROM members WHERE ident = :ident');
	        $req->execute(array(
                'ident' => $_SESSION['ident'],
            ));
            // Affichage des messages
            $membre = $req->fetch();
            
            echo '<p>'.$membre['ident'].'</p>';
            echo '<p><a href="session_destroy.php">Logout</a></p>';

            // Fin de requête
            $req->closeCursor();
        }
        else
        {
            header('Location: connect_vue.php');
        }
        ?>
        </div>
    </body>
</html>