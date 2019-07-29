<?php 
session_start();
// Connexion à la base de donnees
require 'db.php'; // tu inclus ton fichier avec la connexion à la base de donnée
//
if(isset($_POST['ident']) AND isset($_POST['password']))
{
    //echo $_POST['ident'].'<br/>';
    //echo $_POST['password'];
    $ident = addslashes(htmlspecialchars(htmlentities(trim($_POST['ident']))));
    //$password = addslashes(htmlspecialchars(htmlentities(trim($_POST['password']))));
    //echo $ident.'<br/>';
    //echo $password.'<br/>';
    // Hachage du mot de passe
    //$pass_hach = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //echo $pass_hach;
    // On séléectionne le champ (identifiant) dans notre table users où identifiant est égale au champ identifiant rentré par l'utilisateur
    $req = $db->query("SELECT id, ident, password FROM members WHERE ident = '$ident'");
    $result = $req->fetch();
    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordOK =  password_verify($_POST['password'], $result['password']);
    
    if(!$result) {
        $_SESSION['message'] = 1;
        $req->closeCursor();
        header('Location: connect_vue.php');
    }
    else {
        if($isPasswordOK) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['ident'] = $result['ident'];
            $req->closeCursor();
            header('Location: index.php');
        }else{
        $_SESSION['message'] = 1;
        $req->closeCursor();
        header('Location: connect_vue.php');
        }
    }
}else {
    $_SESSION['error'] = 'Veuillez entrer vos identifiants';
    header('Location: connect_vue.php');
    //echo "$message";
}
// Fin de requête
//$req->closeCursor();
?>