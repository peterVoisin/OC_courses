<?php

	$_POST["pseudo"] = htmlspecialchars($_POST["pseudo"]);
	$_POST["message"] = htmlspecialchars($_POST["message"]);

	$bdd = new PDO("mysql:host=localhost;dbname=test", "root", "root");

	$reponse = $bdd->prepare("INSERT INTO tpminichat(pseudo, message, temps) VALUES (?, ?, NOW())");

	$reponse->execute(array($_POST["pseudo"], $_POST["message"]));

	$reponse->closeCursor();

	header("Location: tpMiniChat.php");

?>