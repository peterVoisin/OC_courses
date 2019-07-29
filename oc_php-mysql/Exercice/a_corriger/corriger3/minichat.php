<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>TP4: Mini-chat</title>
	</head>

	<body>		
		<form method="post" action="savechat.php">
			<p>Pseudo: <input name="pseudo" type="text" value="<?php if(isset($_COOKIE['pseudo'])){echo($_COOKIE['pseudo']);} ?>"/></p>
			<p>Message: <input name="message" type="text" /></p>
			<input type="submit" value="Envoyer" />
		</form>

<?php
try
{
	$bdd=new PDO ('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('Erreur :'.$e->getMessage());
}

$request=$bdd->query('SELECT pseudo,message,DATE_FORMAT(date_publi,\'[%d/%m/%Y %Hh%im%ss]\') AS date_jour FROM chat_tp4 ORDER BY date_publi DESC LIMIT 0,10');
while($donnees=$request->fetch())
{
	echo('<p>'.$donnees['date_jour'].' '.htmlspecialchars($donnees['pseudo']).' : '.htmlspecialchars($donnees['message']).'</p>');
}

$request->closeCursor();

?>
	</body>
</html>