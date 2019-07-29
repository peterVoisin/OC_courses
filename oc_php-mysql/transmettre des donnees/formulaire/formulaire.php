<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div>Cette page ne contient que du HTML.<br/>
Veuillez entrer votre prénom :<br/>
<form method="post" action="cible.php" enctype="multiport/form-data">

<input type="text" name="prenom" value="Firstname"/><br/>
<br/>
<select name="Origine">
	<option value="choix1" selected="selected">Choix 1</option>
	<option value="choix2">Choix 2</option>
	<option value="choix3">Choix 3</option>
	<option value="choix4">Choix 4</option>
</select><br/>
<br/>
<input type="checkbox" name="case" id="case" checked="checked" /> <label for="case">Case cochée par défaut</label><br/>
<input type="checkbox" name="case" id="case1"/> <label for="case1">Une case à cocher</label><br/>
<br/>
Les boutons d'options
<input type="radio" name="bouton" value="oui" id="oui" checked="checked"/> <label for="oui">Oui</label>
<input type="radio" name="bouton" value="non" id="non"/> <label for="non">Non</label><br/>
<br/>
<textarea name="message" rows="8" cols="45">
Votre message ici.
</textarea><br/>
<input type="hidden" name="pseudo" value="peter"/>
<br/>
<input type="file" name="monfichier" /><br/>
<input type="submit" value="Envoyer le fichier"/><br/>
<br/>
<input type="submit" value="Envoyer">

</form>
</div>
</body>
</html>