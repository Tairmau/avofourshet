<?php
$action = $_REQUEST['action'];
$pdo = PdoAvofourshet::getPdoAvofourshet();

switch($action){

    case 'commentaires':
    {
        
        $lesCommentaires = $pdo->getLesCommentaires();
        include("vues/commentaire.php");

  		break;
    }
}

?>