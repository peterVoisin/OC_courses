<?php
session_start();
// verification des variables
if (isset($_POST['pseudo']) AND isset($_POST['message']) AND $_POST['pseudo'] != "" AND $_POST['message'] != "")
{
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['erreur'] = 0;
    
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	// Enregistrer dans BDD
	$req = $bdd->prepare('INSERT INTO minichat(pseudo, message, date_post) VALUES(:pseudo, :message, NOW())');
	$req->execute(array(
	    'pseudo' => $_POST['pseudo'],
	    'message' => $_POST['message'],
	    ));
    // Fin de requête
    $req->closeCursor();
}
else {
    // Sinon rediriger vers minichat.php
    $_SESSION['erreur'] = 1;
	header('Location: minichat.php');
}

// Rediriger vers minichat.php
header('Location: minichat.php');
?>