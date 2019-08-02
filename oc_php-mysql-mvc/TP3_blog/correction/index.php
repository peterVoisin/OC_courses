<!-- CORRECTION -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
    <link href="styles.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
    	<p>Derniers billets du blog :</p>
 
<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch())
{
?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    <br />
    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
</body>
</html>

<!-- CODE PERSO DU TP
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

//<?php
//try
//{
	// On se connecte à MySQL
//	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//}
//catch(Exception $e)
//{
	// En cas d'erreur, on affiche un message et on arrête tout
//        die('Erreur : '.$e->getMessage());
//}
//$reponse = $bdd->query('SELECT * FROM billets ORDER BY id DESC LIMIT 0,5');
//
//while ($donnees = $reponse->fetch())
//{
//$id=$donnees['id'];
//?>
//<div class="news">
	<h3><?php// echo $donnees['titre']; ?></h3>
	<p><?php// echo $donnees['contenu']; ?><br/>
	<?php// echo $donnees['date_creation']; ?><br/>
	<a href="commentaires.php?id=<?php// echo $id; ?>">Voir l'article</a></p>
	</p>
</div>
<?php
//}

//$reponse->closeCursor(); // Termine le traitement de la requête
?>

</body>
</html>
-->