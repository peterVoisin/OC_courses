<?php
function chargerClasse($classname){
  require $classname.'.php';
}
spl_autoload_register('chargerClasse');

session_start();

if (isset($_GET['deconnexion'])) {
  session_destroy();
  header('location: .');
  exit();
}

$db = new PDO('mysql:host=localhost;dbname=oc_courses','root','root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$manager = new PersonnagesManager($db);

if (isset($_SESSION['perso'])) {
  $perso = $_SESSION['perso'];
}

if (isset($_POST['creer']) && isset($_POST['nom'])) {
  $perso = new Personnage(['nom' => $_POST['nom']]);

  if (!$perso->nomValide()) {
    $message = 'Le nom choisi est invalide.';
    unset($perso);
  } elseif ($manager->exists($perso->nom())) {
    $message = 'Le nom du personnage est déjà pris !';
    $perso = $manager->get($_POST['nom']);
    $now = new DateTime('NOW');
    $perso->setLastConnect($now->format('Y-m-d H:i:s'));
    $manager->update($perso);
  } else {
    $manager->add($perso);
  }

}

elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) {
  if ($manager->exists($_POST['nom'])) {
    $perso = $manager->get($_POST['nom']);
    $now = new DateTime('NOW');
    if ($perso->lastKick()->format('Y-m-d') != $now->format('Y-m-d')) {
      $perso->setKicksDay(0);
    }
    if ($perso->lastConnect()->format('Y-m-d') != $now->format('Y-m-d')) {
      $perso->setDegats(0);
      $perso->setLastConnect($now->format('Y-m-d H:i:s'));
    }
    $manager->update($perso);
  } else {
    $message = 'Ce personnage n\'existe pas !';
  }
}

elseif (isset($_GET['frapper'])) {
  if (!isset($perso)) {
    $message = 'Merci de créer un personnage ou de vous identifier.';
  } else {
    if ($perso->kicksDay() >= 5) {
      $message = 'Vous êtes fatigué, vous ne pouvez plus frapper :(';
    } else {
      if (!$manager->exists((int) $_GET['frapper'])) {
        $massage = 'Le personnage qui vous voulez frapper n\'existe pas !';
      } else {
        $persoAFrapper = $manager->get((int) $_GET['frapper']);

        $retour = $perso->frapper($persoAFrapper);

        switch ($retour) {
          case Personnage::CEST_MOI:
            $message = 'Mais... vous ne pouvez pas vous frapper !!!';
            break;
          case Personnage::PERSONNAGE_FRAPPE:
            $now = new DateTime('NOW');
            $perso->setLastKick($now->format('Y-m-d H:i:s'));
            $message = 'Le personnage a bien été frappé !';
            $manager->update($perso);
            $manager->update($persoAFrapper);
            break;
          case Personnage::PERSONNAGE_TUE:
            $now = new DateTime('NOW');
            $perso->setLastKick($now->format('Y-m-d H:i:s'));
            $message = 'Vous avez tué ce personnage !';
            $manager->update($perso);
            $manager->delete($persoAFrapper);
            break;
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TP: Mini je de combat</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div id="bloc">
      <p>Nombre de personnages créés : <?= $manager->count() ?></p>

      <?php
      if (isset($message)) {
        echo '<p id="warning">'.$message.'</p>';
      }
      if (isset($perso)) {
      ?>
        <p id="logout"><a href="?deconnexion=1">Déconnexion</a></p>
        <fieldset>
          <legend>Règles du jeu</legend>
          <ul>
            <li>Chaque joueur commence avec une force de 5, au niveau 1 et 5 coups possible par jour.</li>
            <li>Chaque coup inflige l'équivalent de la force du joueur frappant.</li>
            <li>Chaque coup augmente l'expérience de 10 points.</li>
            <li>Le joueur qui atteint 100 d'expérience gagne 1 niveau.</li>
            <li>Chaque niveau augmente la force de l'équivalent du niveau.</li>
            <li>Chaque jour, les dégâts diminus de 50 points.</li>
            <li>Le joueur qui atteint 100 de dégats meurt.</li>
          </ul>
        </fieldset>
        <fieldset>
          <legend>Mes informations</legend>
          <p>
            Nom : <?= htmlspecialchars($perso->nom()) ?>
          </p>
          <p>
            Force : <?= $perso->forcePerso() ?> |
            Dégâts : <?= $perso->degats() ?> |
            Niveau : <?= $perso->niveau() ?> |
            Expérience : <?= $perso->experience() ?> |
            Frappes : <?= $perso->kicksDay() ?>/5
          </p>
        </fieldset>
        <fieldset>
          <legend>Qui frapper ?</legend>
          <p>
      <?php
      $persos = $manager->getList($perso->nom());

      if (empty($persos)) {
        echo 'Il n\'y a personne à frapper !';
      } else {
        foreach ($persos as $unPerso) {
          echo '<a href="?frapper='.$unPerso->id().'">', htmlspecialchars($unPerso->nom()), '</a> (dégâts : '.$unPerso->degats().')<br/>';
        }
      }
      ?>
      </p>
      </fieldset>
      <?php
      } else {
      ?>
        <form action="" method="post">
          <p>
            <label for="nom">Nom : </label>
            <input type="text" name="nom" maxlength="50" autofocus>
          </p>
          <p>
            <input type="submit" class="bouton" name="creer" value="Créer ce personnage">
            <input type="submit" class="bouton" name="utiliser" value="Utiliser ce personnage">
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
?>
