<?php
require('controller/frontend.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        ///////////////
        // Exercice MVC
        elseif ($_GET['action'] == 'selectComment') {
            if (isset($_GET['comId']) && $_GET['comId'] > 0) {
                if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                    selectComment();
                }
                else{
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            else{
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'updateComment') {
            if (isset($_GET['comId']) && $_GET['comId'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    updateComment($_GET['comId'], $_POST['author'], $_POST['comment'], $_GET['postId']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        // Exercice MVC
        ///////////////
    }
    else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}
