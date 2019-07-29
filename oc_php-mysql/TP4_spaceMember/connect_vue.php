<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <title>Connexion</title>
    </head>
    <body>
        <!-- Formulaire de connexion-->
        <form method="post" action="connect_model.php">
            <p>Veuillez saisir vos identifiant</p>
            <?php
            if (isset($_SESSION['message']) && $_SESSION['message'] == 1 ) {
                echo '<p class="error">Ce compte n\'existe pas, vérifiez vos identifiants !</p>';
            }
            ?>
            <label for="ident" class="test">
                Identifiant : 
            </label>
            <input type="text" name="ident" id="ident" required /><br/>
            <label for="password">
               Mot de passe : 
            </label>
            <input type="password" name="password" id="password" maxlength="255" required /><br/>
            <input type="submit" value="Connexion" id="submit" />
            <p class="info">Vous ne possédez pas de compte ? <a href="inscri_vue.php">Sign In</a> or <a href="session_destroy.php">Logout</a></p>
        </form>

    </body>
</html>
