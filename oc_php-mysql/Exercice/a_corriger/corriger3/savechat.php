<?php
setcookie('pseudo',$_POST['pseudo'],time()+365*24*3600,null,null,false,true);

try
{
	$bdd=new PDO ('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('Erreur :'.$e->getMessage());
}

$request=$bdd->prepare('INSERT INTO chat_tp4 (pseudo,message,date_publi) VALUES (?,?,NOW())');
$request->execute(array(htmlspecialchars($_POST['pseudo']),htmlspecialchars($_POST['message'])));

header('Location:minichat.php');
?>