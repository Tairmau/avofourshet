<?php
session_start();
$pdo = PdoAvofourshet::getPdoAvofourshet();

//initPanier();
$action = $_REQUEST['action'];
switch($action)
{

	case'ajoutpanier':
	{
        $email = $_SESSION['login'];
        $compteinfo = $pdo->infocompte($email);

		$image = $_REQUEST['photo'];
		$nom = $_REQUEST['nom'];
		$ingredients = $_REQUEST['ingredients'];
		$prix = $_REQUEST['prix'];

        foreach ($compteinfo as $ligne) : 
            $nom_cli = $ligne['nom'];
            $prenom = $ligne['prenom'];
        endforeach;
        
		$unIdProduits = $_REQUEST['id'];
        $commandes = $pdo->ajoutpanierBDD($unIdProduits,$image,$nom,$ingredients,$email,$nom_cli,$prenom,$prix);
		header('Location: index.php?uc=connexionBonne&ucconn=menu&action=voirLesProduits');
		break;
	}
	case'supprimerproduitpanier':
		{
			header('Location: index.php?uc=connexionBonne&ucconn=menu&action=recapcommande');
			break;

		}
	case'recapcommande':
		{
			$email = $_SESSION['login'];
			$compteinfo = $pdo->infocompte($email);
			$articlescommandes = $pdo->recapcommande($email);
			include('vues/confcommande.php');
			break;

		}
	case 'qteandtaille':
		{
			$email = $_SESSION['login'];
			$compteinfo = $pdo->infocompte($email);
			$articles = $pdo->ajoutpanierSite($email);
			foreach ($_POST['qte'] as $id_commande => $Qte) {
				$taille = $_POST['taille'][$id_commande];
				$addqte = $pdo->addqteandtaille($Qte,$taille, $id_commande);
			}
			header('Location: index.php?uc=connexionBonne&ucconn=menu&action=recapcommande');
			exit;
			break;

		}
	case 'livraison':
		{
				$email = $_SESSION['login'];
				$compteinfo = $pdo->infocompte($email);
				include('vues/adresse.php');
				break;

		}
	case 'adresse':
		{
				$email = $_SESSION['login'];
				$compteinfo = $pdo->infocompte($email);
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$habitation = $_POST['habitation'];
				$codep = $_POST['codep'];
				$pays = $_POST['pays'];
				$telephone = $_POST['telephone'];

				if ($nom != "" || $prenom != "" || $habitation != "" || $codeP != "" || $pays != "" || $telephone != "") 
				{
					$adresse = $pdo->adresse($nom,$prenom,$habitation,$codep,$pays,$telephone,$email);
					header('Location: index.php?uc=connexionBonne&ucconn=menu&action=paiement');
					include('vues/paiement.php');
				}
				else{
					include('vues/adresse.php');
				}

				break;
		}


}
?>

