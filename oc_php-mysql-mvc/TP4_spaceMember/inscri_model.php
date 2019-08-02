<?php 
session_start();
// Connexion à la base de donnees
require 'db.php'; // tu inclus ton fichier avec la connexion à la base de donnée

if(isset($_POST['ident']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirm']))
{
    // Sécurité
    $ident = addslashes(htmlspecialchars(htmlentities(trim($_POST['ident']))));
    $email = addslashes(htmlspecialchars(htmlentities(trim($_POST['email']))));
    
    // Confirmer le mot de passe
    if ($_POST['password'] == $_POST['password_confirm'])
    {
        $pass_hach = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        // On vérifie si l'email à un format valide
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
        {
            // On séléectionne le champ (identifiant) dans notre table users où identifiant est égale au champ identifiant rentré par l'utilisateur
            $req = $db->query("SELECT ident FROM members WHERE ident = '$ident'");
            $count = $req->rowCount(); // on rowCount() la requete, donc rowcount retournera une valeur si il trouve.
            //echo $count;
            if($count == 0) // si il ne trouve pas une valeur, alors c'est bon
            {
                $req = $db->prepare('INSERT INTO members(ident, password, email, sign_in) VALUES(:ident, :pass, :email, NOW())');
                $req->execute(array(
                    'ident' => $ident,
                    'pass' => $pass_hach,
                    'email' => $email
                ));
                // Fin de requête
                $_SESSION['ident'] = $ident;
                $req->closeCursor();
                header('Location: index.php');
            }else{
                $req->closeCursor();
                $_SESSION['error'] = 5 ;
                header('Location: inscri_vue.php');
            }
        }else{
            $_SESSION['error'] = 4 ;
            $req->closeCursor();
            header('Location: inscri_vue.php');
        }
    }else{
        $_SESSION['error'] = 3 ;
        header('Location: inscri_vue.php');
    }
}else{
    $_SESSION['error'] = 2 ;
    header('Location: inscri_vue.php');
}
?>