<?php
require 'lib/autoload.php';

$db = DBFactory::getMysqlConnexionWithPDO();
$manager = new NewsManagerPDO($db);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Accueil du site - TP3</title>
  </head>
  <body>
    <p><a href="admin.php">Accéder à l'espace d'administration</a></p>
<?php
if (isset($_GTE['id'])) {
  $news = $manager->getUnique((int) $_GET['id']);

  echo '<p>Par <em>'.$news->auteur().'</em>, le '.$news->dateAjout()->format('d/m/Y à H\hi').'</p>'.'\n'.
       '<h2>'.$news->titre().'</h2>'."\n".
       '<p>'.nl2br($news->contenu()).'</p>'."\n";

  if ($news->dateAjout() != $news->dateModif()) {
    echo '<p style="text-align:right"><small><em>Modifiée le '.$news->dateModif()->format('d/m/Y à H\hi').'</em></small></p>';
  }
} else {
  echo '<h2 style="text-align:center">Liste des 5 dernières news</h2>';

  foreach ($manager->getList(0,5) as $news) {
    if (strlen($news->contenu()) <= 200) {
      $contenu = $news->contenu();
    } else {
      $debut = substr($news->contenu(),0,200);
      $debut = substr($debut,0,strrpos($debut,' ')).'...';

      $contenu = $debut;
    }

    echo '<h4><a href="?id='.$news->id().'">'.$news->titre().'</a></h4>'."\n".
         '<p>'.nl2br($contenu).'</p>';
  }
}
?>
  </body>
</html>
