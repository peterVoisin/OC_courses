<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
        <meta charset="utf-8" />
        <title>Mini Chat</title>
   </head>
   <body>
		
		<form method="post" action="minichat_post.php">
    	<p>Veuillez saisir votre pseudo puis votre message</p>
		<p>
			<input type="text" name="pseudo" /><br/>
			<input type="text" name="message" /><br/>
			<input type="submit" value="Valider" />
		</p>
	 	</form>


	 	<?php

		try
		{
		    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

		// Récupérer et afficher
		$mess = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY id DESC LIMIT 0,10');

		// Affichage
		while ($donnees = $mess->fetch())
		{
    		echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
		}

		$reponse->closeCursor();


		?>

   </body>
</html>
