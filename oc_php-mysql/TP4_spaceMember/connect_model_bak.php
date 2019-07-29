<?php 

// Connexion à la base de donnees
require 'db.php'; // tu inclus ton fichier avec la connexion à la base de donnée

if(isset($_POST['ident']) AND isset($_POST['password']))
{
   // echo '$_POST['ident']';
    // Sécurité
    $ident = addslashes(htmlspecialchars(htmlentities(trim($_POST['ident']))));
    $email = addslashes(htmlspecialchars(htmlentities(trim($_POST['password']))));
    $password = sha1($_POST['password']);
    $req = $db->query("SELECT ident FROM members WHERE ident = '$ident'"); // On séléectionne le champ (identifiant) dans notre table users où identifiant est égale au champ identifiant rentré par l'utilisateur
    $count = $req->rowCount(); // on rowCount() la requete, donc rowcount retournera une valeur si il trouve.
    if($count != 0) // si il ne trouve pas une valeur, alors c'est bon
    {
        $req1 = $db->query("SELECT * INTO members");
        $resultat = $req1->fetch();

        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['ident'] = $resultat['ident'];
                header('Location: index.php');
            }
            else {
                session_start();
                $_SESSION['erreur'] = 1;
                header('Location: connect_vue.php');
            }
        }

        // Fin de requête
        $req->closeCursor();
    }else{
        $message = 'Cette adresse e-mail est déjà utilisé.';
        echo "$message";
    }
}else{
$message = 'Veuillez entrer vos identifiants';
echo "$message";
}
// Fin de requête
$req->closeCursor();
?>