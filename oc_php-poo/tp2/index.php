<?php
function chargerClasse($classe)
{
  require $classe.'.php';
}

spl_autoload_register('cahrgerClasse');

session_start();

if (isset($_GET['deconnexion'])) {
  session_destroy();
  header('Location: .');
  exit();
}

$db = new PDO('mysql:host=localhost;dbname=combats', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$manager = new PersonnagesManager($db);

if (isset($_SESSION['perso'])) { // Si session existe, on restaure l'objet
  $perso = $_SESSION['perso'];
}

if (isset($_POST['creer']) && isset($_POST['nom'])) { // Si création perso
  switch ($_POST['type']) {
    case 'guerrier': $perso = new Guerrier(['nom' => $_POST['nom']]); break;
    case 'magicien': $perso = new Magicien(['nom' => $_POST['nom']]); break;
    default: $message = 'Le type du personnage est invalide'; break;
  }

  if (isset($perso)) { // Si type perso valide, on créé un perso
    if (!$perso->nomValide()) {
      $message = 'Le nom choisi est invalide';
      unset($perso);
    } elseif ($manager->exists($perso->nom())) {
      $message = 'Le nom du personnage existe déjà';
      unset($perso);
    } else {
      $manager->add($perso);
    }
  }
}
elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) { // Si utilise perso
  if ($manager->exists($_POST['nom'])) { // Si il existe
    $perso = $manager->get($_POST['nom']);
  } else {
    $message = 'Ce personnage n\'existe pas !';
  }
}
elseif (isst($_GET['frapper'])) { //Si on clique sur un perso
  if (!isset($perso)) {
    $message = 'Merci de créer un personnage ou de vous identifier';
  } else {
    if (!$manager->exists((int) $_GET['frapper'])) {
      $message = 'Le personnage que vous voulez frapper n\'existe pas !';
    } else {
      $persoAFrapper = $manager->get((int) $_GET['frapper']);
      $retour = $perso->frapper($persoAFrapper); // On stocke les éventuelles erreurs ou messages que renvoie la méthode frapper

      switch ($retour) {
        case Personnage::CEST_MOI :
          $message = 'Vous ne pouvez pas vous frapper !!!';
          break;
        case Personnage::PERSO_FRAPPE :
          $message = 'Vous avez frappé '.htmlspecialchars($persoAFrapper->nom()).' !';
          $manager->update($perso);
          $manager->update($persoAFrapper);
          break;
        case Personnage::PERSO_TUE :
          $message = 'Vous aves tué '.htmlspecialchars($persoAFrapper->nom()).' !';
          $manager->update($perso);
          $manager->delete($persoAFrapper);
          break;
        case Personnage::PERSO_ENDORMI :
          $message = 'Vous êtes endormi, vous ne pouvez pas frapper !';
          break;
      }
    }
  }
}
elseif (isset($_GET['ensorceler'])) {
  if (!isset($perso)) {
    $message = 'Merci de créer un personnage ou de vous identifier';
  } else {
    // Il faut vérifier que le personnage est un magicien
    if ($perso->type() != 'magicien') {
      $message = 'Seuls les magiciens peuvent ensorceler';
    } else {
      if (!$manager->exists((int) $_GET['ensorceler'])) {
        $message = 'Le personnage que vous voulez frapper n\'existe pas !';
      } else {
        $personAFrapper = $manager->get((int) $_GET['ensorceler']);
        $retour = $perso->lancerUnSort($persoAEncorceler);

        switch ($retour) {
          case Personnage::CEST_MOI :
          $message = 'Vous ne pouvez pas vous frapper !!!';
          break;
        case Personnage::PERSO_ENSORCELE :
          $message = 'Vous avez encorcelé '.htmlspecialchars($persoAFrapper->nom()).' !';
          $manager->update($perso);
          $manager->update($persoAEncorceler);
          break;
        case Personnage::PAS_DE_MAGIE :
          $message = 'Vous n\'avez plus de magie !';
          break;
        case Personnage::PERSO_ENDORMI :
          $message = 'Vous êtes endormi, vous ne pouvez pas laner de sort !';
          break;
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TP 2 : Mini jeu de combat</title>
    <meta charset="utf-8"/>
  </head>
  <body>
    <p>Nombre de personnages créés : <?= $manager->count() ?></p>
<?php
if (isset($message)) { //Si $messge existe
  echo '<p>'.$message.'</p>';
}

if (isset($perso)) { // Si on utilise un perso (nouveau ou pas)
?>
    <p><a href="?deconnexion=1">Déconnexion</a></p>

    <fieldset>
      <legend>Mes informations</legend>
      <p>Type : <?= ucfirst($perso->type()) ?><br/>
        Nom : <?= ucfirst($perso->nom()) ?><br/>
        Dégâts : <?= ucfirst($perso->degats()) ?><br/>
<?php
// Afficher atout du perso suivant son type
switch ($perso->type()) {
  case 'magicien' : echo 'Magie : '; break;
  case 'guerrier' : echo 'Protection : '; break;
}
echo $perso->atout();
?>
      </p>
    </fieldset>

    <fieldset>
      <legend>Qui attaquer ?</legend>
      <p>
<?php
// On récupère tous les personnages par ordre alphabatique, excepté celui utilisé
$retourPersos = $manager->getList($perso->nomm());

if (empty($retourPersos)) {
  echo 'Personne à frapper !';
} else {
  if ($perso->estEndormi()) {
    echo 'Un magicien vous a endormi, vous vous réveillerez dans '.$perso->reveil().' !';
  } else {
    foreach ($retourPersos as $unPerso) {
      echo '<a href="?frapper='.$unPerso->id().'">'.htmlspecialchars($unPerso->nom()).'</a> (dégâts : '.$unPerso->degats().' | type : '.$unPerso->type().')';

      // Ajout d'un lien pour lancer un sort si personnage est magicien
      if ($perso->type() == 'magicien') {
        echo ' | <a href="?encorceler='.$unPerso->id().'">Lancer un sort</a>';
      }
      echo '<br/>';
    }
  }
}
?>
      </p>
    </fieldset>
<?php
} else {
?>
    <form action="" method="post">
      <p>Nom : <input type="text" name="nom" maxlength="50"/> <input type="submit" value="Utiliser ce personnage" name="utiliser"/><br/>
        Type :
        <select name="type">
          <option value="magicien">Magicien</option>
          <option value="guerrier">Guerrier</option>
        </select>
      </p>
    </form>
<?php
}
?>
  </body>
</html>
<?php
if (isset($perso)) { // Si on a créé un perso, on stocke dans $_SESSION
  $_SESSION['perso'] = $perso;
}
