<?php
// Effectuer ici la requête qui insère le message
if (isset($_POST['pseudo']) AND $_POST['message']) 
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	// Enregistrer dans BDD
	$req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :message)');
	$req->execute(array(
	    'pseudo' => $_POST['pseudo'],
	    'message' => $_POST['message'],
	    ));
}
else {
	header('Location: minichat.php');
}

// Puis rediriger vers minichat.php comme ceci :
header('Location: minichat.php');
?>