<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>

    <?php
    $monfichier = fopen('compteur.txt', 'r+');
     
    $pages_vues = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
    $pages_vues += 1; // On augmente de 1 ce nombre de pages vues
    fseek($monfichier, 0); // On remet le curseur au début du fichier
    fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
     
    fclose($monfichier);
     
    echo '<p>Cette page a été vue ' . $pages_vues . ' fois !</p>';
    ?>
    </body>
</html>
