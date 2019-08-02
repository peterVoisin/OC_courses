<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <meta charset="utf-8" />
        <title>Inscription</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <!-- Formulaire d'inscription'-->
        <form method="post" action="inscri_model.php">
            <p>Formulaire d'inscription</p>
            <p>
                <?php
                if (isset($_SESSION['error']) && $_SESSION['error'] == 2)
                {
                    echo '<p class="error">Veuillez renseigner tout les champs !</p>';
                }
                elseif (isset($_SESSION['error']) AND $_SESSION['error'] == 3)
                {
                    echo '<p class="error">Vos mot de passe ne sont pas identiques !</p>';
                }
                elseif (isset($_SESSION['error']) AND $_SESSION['error'] == 4)
                {
                    echo '<p class="error">Votre email nest pas valide !</p>';
                }
                elseif (isset($_SESSION['error']) AND $_SESSION['error'] == 5)
                {
                    echo '<p class="error">Ce compte existe déjà !</p>';
                }
                ?>
               <label for="ident"><span class="sup">*</span> Votre pseudo</label> : <input type="text" name="ident" id="ident" maxlength="255" required /><br/>
               <label for="password"><span class="sup">*</span> Mot de passe</label> :  <input type="password" name="password" id="password" maxlength="255" required /><br/>
               <label for="password"><span class="sup">*</span> Mot de passe</label> :  <input type="password" name="password_confirm" id="password" maxlength="255" required /><br/>
               <label for="email"><span class="sup">*</span> Email</label> :  <input type="text" name="email" id="email" maxlength="255" required /><br/>
               <input type="submit" value="Inscription" id="submit" />
            </p>
               <p class="info"><span class="sup">*</span> Les champs sont obligatoires et limités à 255 caractères - <a href="session_destroy.php">Logout</a></p>
        </form>

    </body>
</html>