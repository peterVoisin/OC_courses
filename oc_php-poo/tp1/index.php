<?php
// Autoload
function chargerClasse($classname)
{
  require $classname . '.php';
}
spl_autoload_register('chargerClasse');

session_start();

if (isset($_GET['deconnexion'])) {
  session_destroy();
  header('Location: .');
  exit();
}

if (isset($_SESSION['perso'])) {
  $perso = $_SESSION['perso'];
}

//$now = new DateTime('NOW');
//echo $now->format('Y-m-d H:i:s');

$db = new PDO('mysql:host=localhost;dbname=poo_tp1', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Alerte chaque requête échouée

$manager = new PersonnagesManager($db);

if (isset($_POST['creer']) && isset($_POST['nom'])) { // SI création
  $perso = new Personnage(['nom' => $_POST['nom']]);

  if (!$perso->nomValide()) {
    $message = 'Le nom choisi est invalide.';
    unset($perso);
  } elseif ($manager->exists($perso->nom())) {
    $message = 'Le nom du personnage est déjà pris.';
    unset($perso);
  } else {
    $manager->add($perso);
  }
}

elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) { // SI utilise
  if ($manager->exists($_POST['nom'])) {
    $perso = $manager->get($_POST['nom']);
    $now = new DateTime('NOW');
    if ($perso->lastConnect()->format('Y-m-d') != $now->format('Y-m-d')) {
      $perso->setKickOfDay(0);
    }
    //$perso->setKickOfDay(($perso->lastConnect()->format('Y-m-d') != $now->format('Y-m-d')) ? 0 : ;
    $perso->setLastConnect($now->format('Y-m-d H:i:s'));
    $manager->update($perso);
  } else {
    $message = 'Vous devez d\'abord créer ce personnage !';
  }
}

elseif (isset($_GET['frapper'])) { // SI clic perso pour frapper
  if (!isset($perso)) {
    $message = 'Merci de créer un perso ou de vous identifier';
  } else {
    if (!$manager->exists((int) $_GET['frapper'])) {
      $message = 'Le personnage qui vous voulez frapper n\'existe pas !';
    } else {
      $persoAFrapper = $manager->get((int) $_GET['frapper']);
      $retour = $perso->frapper($persoAFrapper); // Recup erreurs ou messsages

      switch ($retour) {
        case Personnage::CEST_MOI :
          $message = 'Mais.. pourquoi voulez-vous vous frapper ?';
          break;
        case Personnage::PERSONNAGE_FRAPPE :
          $message = 'Vous avez frappé '.htmlspecialchars($persoAFrapper->nom()).' !';
          //$perso->setLastKick($now->format('Y-m-d'));
          $manager->update($perso);
          $manager->update($persoAFrapper);
          break;
        case Personnage::PERSONNAGE_TUE :
          $message = 'Vous avez tué ce personnage !';
          $manager->update($perso);
          $manager->delete($persoAFrapper);
          break;
        case Personnage::LIMIT_KICK :
          $message = 'Vous êtes fatigué, vous ne pouvez plus frapper';
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div id="bloc">
    <div>
      <p>Nombre de personnages créés : <?= $manager->count() ?></p>
<?php
if (isset($message)) { // SI message existe
  echo '<p>'.$message.'</p>';
}

if (isset($perso)) { // SI $perso existe
?>
      <p id="deco"><a href="?deconnexion=1">Déconnexion</a></p>
    </div>
    <fieldset>
      <legend>Mes informations</legend>
      <p>Nom : <?= htmlspecialchars($perso->nom()) ?><br />
        Dégâts : <?= $perso->degats() ?><br />
        Expérience : <?= $perso->experience() ?><br />
        Niveau : <?= $perso->niveau() ?><br/>
        Force : <?= $perso->forcePerso() ?></p>
    </fieldset>

    <fieldset>
      <legend>Qui frapper ?</legend>
      <p>
<?php
$persos = $manager->getList($perso->nom());

if (empty($persos)) {
  echo 'Personne à frapper !';
} else {
  foreach ($persos as $unPerso)
    echo '<a href="?frapper=', $unPerso->id(), '">', htmlspecialchars($unPerso->nom()), '</a> (dégâts : ', $unPerso->degats(), ', niveau : ', $unPerso->niveau(), ')<br />';
}
?>
      </p>
    </fieldset>
<?php
}
else
{
?>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="nom" maxlength="50" />
        <input type="submit" value="Créer ce personnage" name="creer" />
        <input type="submit" value="Utiliser ce personnage" name="utiliser" />
      </p>
    </form>
<?php
}
?>
</div>
  </body>
</html>
<?php
if (isset($perso)) {
  $_SESSION['perso'] = $perso;
}
