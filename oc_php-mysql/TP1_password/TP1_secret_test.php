<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
        <meta charset="utf-8" />
        <title>Page protégée par mot de passe</title>
   </head>
   <body>
   
    <?php
       if (isset($_POST['secret']) AND $_POST['secret'] == "kangourou")
       {
        ?>
       <p>Vous accès au code secret :</p>
       <P>LE CODE SECRET</P>
       <?php
       }
       else
       {
            echo "Le mot de passe n'est pas valide";
            ?>
            <br/>
            <a href="TP1_formulaire_test.php">Entrez un nouveau mot de passe !</a>
            <?php
       }
       
    ?>
   
   </body>
</html>