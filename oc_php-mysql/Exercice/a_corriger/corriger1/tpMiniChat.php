<!DOCTYPE html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="tpMiniChat.css">
		<title>TP mini-Chat</title>
	
	</head>
		
	<body>

		<?php  

			$bdd = new PDO("mysql:host=localhost;dbname=test", "root", "root"); 
					
			$reponse1 = $bdd->query("SELECT pseudo, message, DATE_FORMAT(temps, '%d/%m/%Y %Hh%imin%ss') AS temps FROM tpminichat ORDER BY id DESC") or die(print_r($bdd->errorinfo()));

			$valeurParDefaut = $reponse1->fetch();

			$reponse1->closeCursor();
		?>

		<div class="englobeTout">
			
			<div class="formulaire">
				
				<!--       formulaire      -->

				<form method="post" action="tpMiniChatPost.php">
				
					<p><label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo" value="<?php echo $valeurParDefaut['pseudo'] ?>" maxlength="12" required></p>
									
									<!--  avec l'option required je suis sûr que le fofulaire sera rempli -->

					<p><label for="message">Message : </label><input type="text" name="message" id="message" maxlength="80" required></p>

					<div class="envoyer"><div><p><input type="submit" name=""></p></div></div>

				</form>

			</div>	
									

			<div class="message">

									<!--  Partie message -->						
				
				<?php  

					$reponse2 = $bdd->query("SELECT pseudo, message, DATE_FORMAT(temps, '%d/%m/%Y %Hh%imin%ss') AS temps FROM tpminichat") or die(print_r($bdd->errorinfo()));
					
					while($donnée = $reponse2->fetch())
					{
						echo "<div><p>[" . $donnée["temps"] . "]<strong> " . $donnée["pseudo"] . "</strong> : " . $donnée["message"] . "</p></div>";
					}

					$reponse2->closeCursor(); 

				?>

			</div>

		</div>


	</body>

</html>