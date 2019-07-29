<!DOCTYPE html>
<html>
<head>
	<title>Ma page PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>
<body>
	<form id="formulaire" action="minichatpost.php" method="POST">
		<p><label>Pseudo : <input type="text" name="pseudo"> </label></p>
		<p><label>Message : <input type="textarea" name="message"> </label></p>
		<p><input type="submit" name="envoyer" value="Envoyer"></p>
	</form>

	<br/>
	<h1>Messages :</h1>
	<?php
			// récupération de la base de données
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=test_base;charset=utf8','root','root') ;
			}
			catch (Exception $e)
			{
				echo 'error : ' . $e->getMessage() ;
			}
			// éxecution de la requête de récupération des messages
			$response = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_envoi,\'[%d-%m-%Y %H:%i:%s] \') as date_envoi FROM chat ORDER BY id DESC LIMIT 0,10') ;
			// tant qu'il y a des messages
			while ($donne = $response->fetch())
			{
				// Afficher le message
				echo '<p> <strong>'.htmlspecialchars($donne['date_envoi']). htmlspecialchars($donne['pseudo']).'</strong> : '. htmlspecialchars($donne['message']).'</p>' ;
			}
	?>
</body>
</html>
