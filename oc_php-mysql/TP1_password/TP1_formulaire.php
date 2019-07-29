<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
        <meta charset="utf-8" />
        <title>Page protégée par mot de passe</title>
   </head>
   <body>
		
		<?php
		if (!isset($_POST['pass']) OR $_POST['pass'] == "")
		{
			?>
			<form action="TP1_formulaire.php" method="post">
        	<p>Veuillez entrer le mot de passe pour obtenir les codes d\'accès au serveur central de la NASA :</p>
			<p>
				<input type="password" name="pass" /><br/>
				<input type="submit" value="Valider" />
			</p>
		 	</form>
        	<p>Cette page est réservée au personnel de la NASA. Si vous ne travaillez pas à la NASA, inutile d'insister vous ne trouverez jamais le mot de passe ! ;-)</p>
		<?php
		}
		elseif ($_POST['pass'] != "kangourou")
		{
			?>
			<form action="TP1_formulaire.php" method="post">
        	<p>Veuillez entrer le mot de passe pour obtenir les codes d\'accès au serveur central de la NASA :</p>
			<p>
				<p>Mot de passe incorrect</p>
				<input type="password" name="pass" /><br/>
				<input type="submit" value="Valider" />
			</p>
		 	</form>
        	<p>Cette page est réservée au personnel de la NASA. Si vous ne travaillez pas à la NASA, inutile d'insister vous ne trouverez jamais le mot de passe ! ;-)</p>
		<?php
		}
		elseif ($_POST['pass'] == "kangourou")
		{
			?>
	        <h1>Voici les codes d'accès :</h1>
	        <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>   
	        
	        <p>
	        Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />
	        La NASA vous remercie de votre visite.
	        </p>
		<?php
		}
		?>
   </body>
</html>
