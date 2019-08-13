<?php
require 'lib/autoload.php';

$db = DBFactory::getMysqlConnexionWithPDO();
$manager = new NewsManagerPDO($db);

if (isset($_GET['modifier'])) {
  $news = $manager->getUnique((int) $_GET['modifier']);
}

if (isset($_GET['supprimer'])) {
  $manager->delete((int) $_GET['supprimer']);
  $message = 'Le news a bien été supprimée !';
}

if (isset($_POST['auteur'])) {
  $news = new News([
    'auteur' => $_POST['auteur'],
    'titre' => $_POST['titre'],
    'contenu' => $_POST['contenu']
  ]);

  if (isset($_POST['id'])) {
    $news->setId($_POST['id']);
  }

  if ($news->isValid()) {
    $manager->save($news);
    $message = $news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !';
  } else {
    $erreurs = $news->erreurs();
  }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administration des news - TP3</title>
    <style type="text/css">
      table, td{
        border:1px solid black;
      }
      table{
        margin:auto;
        text-align:center;
        border-collapse:collapse;
      }
      td{
        padding:3px;
      }
    </style>
  </head>
  <body>
    <p><a href=".">Accéder à l'accueil du site</a></p>

    <form action="admin.php" method="post">
      <p style="text-align:center">
<?php
if (isset($message)) {
  echo $message.'<br/>';
}
?>
        <?php if (isset($erreurs) && in_array(news::AUTEUR_INVALID,$erreurs)) echo 'L\'auteur est invalide.<br/>'; ?>
        Auteur : <input type="text" name="auteur" value="<?php if (isset($news)) echo $news->auteur(); ?>" /><br/>
        <?php if (isset($erreurs) && in_array(news::TITRE_INVALID,$erreurs)) echo 'Le titre est invalide.<br/>'; ?>
        Titre : <input type="text" name="titre" value="<?php if (isset($news)) echo $news->titre(); ?>" /><br/>
        <?php if (isset($erreurs) && in_array(news::CONTENU_INVALID,$erreurs)) echo 'Le contenu est invalide.<br/>'; ?>
        Contenu :<br/>
        <textarea rows="8" cols="60" name="contenu"><?php if (isset($news)) echo $news->contenu(); ?></textarea><br/>
<?php
if (isset($news) && !$news->isNew()) {
?>
        <input type="hidden" name="id" value="<?= $news->id() ?>"/>
        <input type="submit" name="modifier" value="Modifier"/>
<?php
} else {
?>
        <input type="submit" name="ajouter" value="Ajouter"/>
<?php
}
?>
      </p>
    </form>

    <p style="text-align:center">Il y a actuellement <?= $manager->count() ?> news. En voici le liste :</p>

    <table>
      <tr>
        <th>Auteur</th><th>titire</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th>
      </tr>
      <?php
      foreach ($manager->getList() as $news) {
        echo '<tr><td>'.$news->auteur().'</td><td>'.$news->titre().'</td><td>'.$news->dateAjout()->format('d/m/Y à H:hi').'</td><td>'.($news->dateAjout() == $news->dateModif() ? '-' : $news->dateModif()->format('d/m/Y à H:hi')).'</td><td><a href="?modifier='. $news->id().'">Modifier</a> | <a href="?supprimer='.$news->id().'">Supprimer</a></td></tr>'."\n";
      }
      ?>
    </table>

  </body>
</html>
