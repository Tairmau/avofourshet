<?php
session_start();
$pdo = PdoAvofourshet::getPdoAvofourshet();

//initPanier();
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirLesProduits':
	{
  		$lesProduits = $pdo->getlesproduits();
		  include("vues/order.php");
  		break;
	}
	case 'voirLesProduitsAdmin':
	{
		$lesProduits = $pdo->getlesproduits();
		include("vues/orderadmin.php");
		break;
	}
	case 'ajouterproduit':
	{
		include("vues/newproduct.php");

		$image = $_POST['image'];
		$nom = $_POST['nom'];
		$ingredients = $_POST['ingredients'];
		$prix = $_POST['prix'];
		if(!empty($image) && !empty($nom) && !empty($ingredients) && !empty($prix)){
			$ajoutproduit = $pdo->ajouterproduit($image, $nom, $ingredients, $prix);
			header('Location: index.php?uc=admin&ad=produits&action=ajouterproduit');
			
		}else{
			echo '<p class="error-msgadmin">Veuillez remplir tous les champs.</p>';
		}
		break;
	}
	case'supprimerproduit':
	{
		$lesProduits = $pdo->getLesProduits();
		$unProduits = $_REQUEST['id'];
		$supprimerProduit = $pdo->supprimerProduit($unProduits);
		header('Location: index.php?uc=admin&ad=voirProduits&action=voirLesProduitsAdmin');
		break;
	}

	case'modifierproduit':
	{
		include('vues/modifproduct.php');
		$unProduits = $_REQUEST['id'];

		$image = $_POST['image'];
		$nom = $_POST['nom'];
		$ingredients = $_POST['ingredients'];
		$prix = $_POST['prix'];
		
		$modifierProduit = $pdo->modifierProduit($unIdProduit,$image,$nom,$ingredients,$prix);
		break;
	}
}
?>


