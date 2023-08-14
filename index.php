<?php
session_start();

//include("vues/accueil.php");
include("vues/entete.php") ;
require_once("util/class.PDO.Avofourshet.inc.php");

$pdo = PdoAvofourshet::getPdoAvofourshet();

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

switch($uc){

    case 'accueil':
		{
            include("vues/bandeau.php") ;
            include("vues/accueil.php");
            break;
        }
    
    case 'aboutus':
        {
            include("vues/bandeau.php") ;
            include("vues/aboutus.php");
            break;
        }
    case 'contact':
        {
            include("controleurs/c_contactMail.php");
            include("vues/bandeau.php") ;
            include("vues/contact.php");
            break;
        }
    case 'menu':
        {
            include("vues/bandeau.php") ;
            include("controleurs/c_afficherproduit.php");
            
            break;
        }
    case 'connexion':
        {
            include("controleurs/c_verifconnex.php");
            include("vues/bandeau.php");
            include("vues/connexion.php");
            break;
        }
    case 'register':
         {
            include("controleurs/c_verifconnex.php");
            include("vues/bandeau.php");
            include("vues/register.php");
            break;
        }
    case 'connexionBonne':
        {
            if(!isset($_REQUEST['ucconn'])){
                $ucconn = 'accueil';
            }
            else{
                $ucconn = $_REQUEST['ucconn'];
            }
            include("controleurs/c_verifconnex.php");

                
            switch($ucconn)
            {
                case 'accueil':
                    {
                        include("vues/bandeau2.php") ;
                        include("vues/accueil.php");
                        //include("controleurs/c_ticketres.php");

                        break;
                    }
                
                case 'aboutus':
                        {
                            include("vues/bandeau2.php") ;
                            include("vues/aboutus.php");

                            break;
                        }
                case 'contact':
                        {
                            include("controleurs/c_contactMail.php");
                            include("vues/bandeau2.php") ;
                            include("vues/contact.php");

                            break;
                        }
                case 'menu':
                        {
                            include("vues/bandeau2.php");
                            include("controleurs/c_ajoutpanier.php");
                            include("controleurs/c_afficherproduit.php");

                            break;
                        }
                case 'deconnexion':
                        {
                            include("controleurs/c_deconnexion.php");
                            
                            break;
                        } 
                case 'compte':
                        {                            
                            include("vues/bandeau2.php");
                            include("controleurs/c_verifconnex.php");
                            break;
                        }
                    case 'panier':
                        {
                            include("controleurs/c_ajoutpanier.php");
                        }
                    case 'confirmcommande':
                        {
                            include("controleurs/c_ajoutpanier.php");
                        }
    
            }
            break;
        }
    case 'admin':
        {
            include("controleurs/c_verifconnex.php");
            if(!isset($_REQUEST['ad'])){
                $ad = 'messages';

            }
            else{
                $ad = $_REQUEST['ad'];
            }
                
                    switch($ad)
                    {

                        case 'messages':
                            {
                                include("vues/bandeauAdmin.php");
                                include("controleurs/c_commentaires.php");
                            break;
                            }
                        case 'voirProduits':
                                {
                                    include("vues/bandeauAdmin.php");
                                    include("controleurs/c_afficherproduit.php");
                                break;
                                }
    
                        case 'produits':
                            {
                                include("vues/bandeauAdmin.php");
                                include("controleurs/c_afficherproduit.php");
                            break;
                            }

                        case 'tickets':
                            {
                                include("vues/bandeauAdmin.php");
                                include("controleurs/c_ticketsAdmin.php");
                            break;
                            }
                        case 'deconnexion':
                            {
                                include("controleurs/c_deconnexion.php");
                            break;
                            }
                    }
            

        break;
        }


}

//$pdo->testsql()

?>