<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
        <meta charset="utf-8" />
        <title>Mini Chat</title>
   </head>
   <body>
		
    <div>Mini Chat<br/>
        
        Vous pouvez discuter en entrant votre pseudo et votre message<br/>
        <form method="post" action="minichat_post.php">
            Pseudo : <input type="text" name="pseudo"/><br/>
            Message : <input type="text" name="message"/><br/>
            <input type="submit" value="Envoyer">
        </form>
    
    </div>

    <div>
        
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $message = $bdd->query('SELECT id, pseudo, message FROM minichat ORDER BY id DESC Limit 0,10');

        while ($donnees = $message->fetch())
        {
            echo '<p>' . htmlspecialchars($donnees['pseudo']) . ' : ' . htmlspecialchars($donnees['message']) . ' </p>';
        }

        $message->closeCursor();
        ?>
        
    </div>

   </body>
</html>