<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <meta charset="utf-8" />
        <title>Exercice - Mini Chat</title>
    </head>
    <style>
        *{
            font-family: sans-serif;
            color: #3C3C3C
        }
        a{
            text-decoration: none;
            color: #F99E40
        }
        form{
            text-align: center;
            background-color: #F9F9F9;
            width: 500px;
            margin: 30px auto 20px auto;
            border: 1px solid #E6E6E6;
            border-radius: 3px
        }
        #pseudo{
            width: 200px;
            margin-bottom: 15px
        }
        #message{
            width: 350px;
            margin-bottom: 15px
        }
        #submit{
            width: 100px;
            color: #F99E40
        }
        .sup{
            font-variant-position: super;
             color: #A0A0A0
       }
        div{
            background-color: #F8FAFF;
            width: 50%;
            margin: auto;
            border: 1px solid #E6E6E6;
            border-radius: 3px
        }
        .msg{
            margin: 25px;
            padding-left: 8px;
            border-left: 5px solid #E6E6E6
            -webkit-hyphens: auto;
            -moz-hyphens: auto;
            -ms-hyphens: auto;
            -o-hyphens: auto;
            hyphens: auto;
            word-wrap: break-word;
        }
        .msg strong{
            color: #F99E40
        }
        .msg span{
            font-size: 80%;
            color: #A0A0A0
        }
        .info{
            font-size: 0.8em;
            color: #A0A0A0
        }
    </style>
    <body>
        <!-- Formulaire de saisi d'un message-->
        <form method="post" action="minichat_post.php">
            <p>Veuillez saisir un pseudo et votre message !</p>
            <p>
            <?php
            // Si $_POST['pseudo'] existe, on l'affiche en "value"
            if (isset($_SESSION['pseudo']))
            {?>
               <label for="pseudo"><span class="sup">*</span> Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value='<?php echo htmlspecialchars($_SESSION['pseudo']); ?>' /><br/>
            <?php
            }
            // sinon, on affiche rien en "value"
            else
            {
            ?>
                <label for="pseudo"><span class="sup">*</span> Pseudo</label> : <input type="text" name="pseudo" id="pseudo" maxlength="255" required /><br/>
            <?php
            }
            ?>
            <label for="message"><span class="sup">*</span> Message</label> :  <input type="text" name="message" id="message" maxlength="255" required /><br/>
            <input type="submit" value="Poster" id="submit" />
            </p>
            <p class="info"><span class="sup">*</span> Les champs sont obligatoires et limités à 255 caractères - <a href="session_destroy.php">Logout</a></p>
        </form>

        <div>
        <?php
        // Connexion à la base de donnees
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        // requête préparée "SELECT" des 10 derniers messages
        $msg = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_post, \'%d/%m/%Y\') AS date_dmY, DATE_FORMAT(date_post, \'%Hh%imin\') AS date_Hms FROM minichat ORDER BY id DESC LIMIT 0,10');

        // Affichage des messages
        while ($donnees = $msg->fetch())
        {
           echo '<p class="msg"><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '<br/>
           <span>Posté à ' . htmlspecialchars($donnees['date_Hms']) . ' le ' . htmlspecialchars($donnees['date_dmY']) . '</span></p>';
        }

        // Fin de requête
        $msg->closeCursor();
        ?>
        </div>
    </body>
</html>
