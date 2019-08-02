<?php
    // Connexion à la base de donnée
        try
        {
            $host = 'localhost';
            $database = 'cours_php';
            $dbidentifiant = 'root';
            $dbpassword = 'root';
            $db = new PDO('mysql:host='.$host.';dbname='.$database.'', $dbidentifiant, $dbpassword);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }catch(PDOException $e){
            echo 'La base de donnée n\'est pas disponible pour le moment. <br />';
            echo ''.$e->getMessage().'<br />';
            echo 'Ligne : '.$e->getLine();
        }
?>