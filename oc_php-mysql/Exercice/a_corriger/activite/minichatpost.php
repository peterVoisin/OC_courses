<?php
	// vérifier que l'utilisateur a mis des données
	if (isset($_POST['pseudo']) AND isset($_POST['message']))
	{
		// vérifier que les champs de saisie ne sont pas vides
		if (strlen($_POST['pseudo'])>0 AND strlen($_POST['message'])>0)
		{
			$pseudo = $_POST['pseudo'] ;
			$message = $_POST['message'] ;

			// récupération de la base de données
			try
			{
				$bdd = new PDO('mysql: host=localhost;dbname=test_base;charset=utf8','root','root') ;
				echo 'OK' ;

			}
			catch (Exception $e)
			{
				echo 'error : ' . $e->getMessage() ;
			}
			// Préparer la requête SQL d'enregistrement du message
			$requete = $bdd->prepare('INSERT INTO chat(pseudo,message,date_envoi) VALUES(:pseudo, :message, NOW())') ;
			// Exécuter la requête après l'ajout de quelques paramètres
			$requete->execute(array(
					'pseudo' => $pseudo,
					'message' => $message
			)) ;
			// Redirection vers la page d'origine qui affiche les messages
			header('Location: minichat.php ') ;
		}
	}
?>
