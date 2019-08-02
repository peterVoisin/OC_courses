<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$nom_jeu = 'Battlefield 1942';

// Suppimer une entrée
$req = $bdd->prepare('DELETE FROM jeux_video WHERE nom = :nom_jeu');
$req->execute(array(
    'nom_jeu' => $nom_jeu,
     ));
echo $nom_jeu . ' supprimé !';

// On met à jour
//$req = $bdd->prepare('UPDATE jeux_video SET prix = :nvprix, nbre_joueurs_max = :nv_nb_joueurs WHERE nom = :nom_jeu');
//$req->execute(array(
//    'nvprix' => $nvprix,
//    'nv_nb_joueurs' => $nv_nb_joueurs,
//    'nom_jeu' => $nom_jeu
//    ));


//$nb_modifs = $bdd->exec('UPDATE jeux_video SET possesseur = \'Florent\' WHERE possesseur = \'Michel\'');
//echo $nb_modifs . ' entrées ont été modifiées !';

//$bdd->exec('UPDATE jeux_video SET prix = 10, nbre_joueurs_max = 32 WHERE nom = \'Battlefield 1942\'');


// On ajoute une entrée dans la table jeux_video
//$bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')');
//
//echo 'Le jeu a bien été ajouté !';
// ou
//$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
//$req->execute(array(
//    'nom' => $nom,
//    'possesseur' => $possesseur,
//    'console' => $console,
//    'prix' => $prix,
//    'nbre_joueurs_max' => $nbre_joueurs_max,
//    'commentaires' => $commentaires
//    ));
//
//echo 'Le jeu a bien été ajouté !';
?>


</body>
</html>