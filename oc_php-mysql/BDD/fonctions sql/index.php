<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


$reponse = $bdd->query('SELECT UPPER(nom) AS nom_maj FROM jeux_video');

while ($donnees = $reponse->fetch())
{
    echo $donnees['nom_maj'] . '<br />';
}

$reponse->closeCursor();

?>

</body>
</html>
