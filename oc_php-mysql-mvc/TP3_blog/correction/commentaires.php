<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="styles.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>
 
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

// Récupération du billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
</body>
</html>

<!-- PERSO TP
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
//	$com_id = $_GET['id'];
	//echo $com_id;
//	try
//	{
		// On se connecte à MySQL
//		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//	}
//	catch(Exception $e)
//	{
		// En cas d'erreur, on affiche un message et on arrête tout
//	        die('Erreur : '.$e->getMessage());
//	}
//
//	$article = $bdd->query('SELECT * FROM billets WHERE id="'.$com_id.'"');
//
//	while ($donnees = $article->fetch()) {
?>
<div class="news">
<a href="index.php?id=<?php //echo $id; ?>">Retour à la liste des billets</a></p>
<h3>Bienvenue sur mon blog ! le <?php //echo $donnees['date_creation']?></h3>
<p>
<?php
//	echo $donnees['contenu'].'<br/>';
//	}
//	$article->closeCursor();
?>
</p>
<h1>Commentaires</h1>
<?php
	// Récupérer et afficher
//	$mess = $bdd->query('SELECT * FROM commentaires WHERE id_billet="'.$com_id.'" ORDER BY id DESC LIMIT 0,10');
// ORDER BY DESC LIMIT 0,10
	// Affichage
//	while ($comm = $mess->fetch())
//	{
//		echo htmlspecialchars($comm['date_commentaire']) . '<p><strong>' . htmlspecialchars($comm['auteur']) . '</strong> : ' . htmlspecialchars($comm['commentaire']) . '</p>';
//	}
//
//	$mess->closeCursor();



	?>
</div>
</body>
</html>
-->