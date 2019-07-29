<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
        <meta charset="utf-8" />
        <title>superglobales</title>
   </head>
   <body>
		
   		<pre>
			<?php
			// On s'amuse à créer quelques variables de session dans $_SESSION
			$_SESSION['prenom'] = 'Jean';
			$_SESSION['nom'] = 'Dupont';
			$_SESSION['age'] = 24;
			print_r($_COOKIE);
			?>
		</pre>

   </body>
</html>
