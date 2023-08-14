<?php
$action = $_REQUEST['action'];
$pdo = PdoAvofourshet::getPdoAvofourshet();

switch($action){

    case 'deconnexiongo':
        {
            session_start();

            // Code pour la déconnexion
            if (isset($_GET['action']) && $_GET['action'] === 'deconnexiongo') {
                // Supprimer toutes les variables de session
                session_unset();

                // Détruire la session
                session_destroy();

                // Rediriger vers la page d'accueil ou toute autre page appropriée
                header("Location: index.php?uc=accueil");
                exit();
            }
        }
}
?>