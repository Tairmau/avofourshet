<?php
$action = $_REQUEST['action'];
$pdo = PdoAvofourshet::getPdoAvofourshet();

session_start();

switch($action){

    
    case 'verifconnex':
        {
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            $count = $pdo->verifconnex($login,$mdp);
            //echo $count;
            $admin = $pdo->verifconnexadmin($login,$mdp);

            if ($count == 1) {
                $_SESSION['login'] = $login;
                header('Location: index.php?uc=connexionBonne&ucconn=accueil');
                exit();
            }
            elseif($admin == 1){
                $_SESSION['login'] = $login;
                header('Location: index.php?uc=admin&ad=messages&action=commentaires');
                exit();
                return $admin;
            } else {
                //echo 'Erreur de connexion';
            }

        }
    case 'register' : 
    {

        $nom = $_POST['nom'];

        $prenom = $_POST['prenom'];
        
        $email = $_POST['email'];
        
        $motdepasse = $_POST['mdp'];

        if($nom != "" && $prenom != "" && $email != "" && $motdepasse != "" && strpos($email, '@gmail.com') || strpos($email, '@yahoo.com')){
            $pdo->register($nom,$prenom,$email,$motdepasse);
            $pdo->importregister($email,$motdepasse);
    
            header('Location: index.php?uc=connexion');
        }
        else{
            //echo'veuillez remplir tout les champs';
        }

        break;
    }

    case 'compteinfo':
        {
                $email = $_SESSION['login'];
                $compteinfo = $pdo->infocompte($email);
            break;
        }
    case 'suppcompte':
        {
            $email = $_SESSION['login'];
            $suppcompte = $pdo->suppcompte($email);
            session_destroy();
            if($pdo){
                header('Location: index.php?uc=connexion');
            }
            break;
        }
    
    
        
}

?>