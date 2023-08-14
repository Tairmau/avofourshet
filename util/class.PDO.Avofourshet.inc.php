<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application HtAuto (adaptation du cas lafleur)
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoAvofourshet
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=avofourshet';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoAvofourshet = null;


		//online
		/*private static $serveur='mysql:host=avofouafrancis.mysql.db';
		private static $bdd='dbname=avofouafrancis';   		
		private static $user='avofouafrancis' ;    		
		private static $mdp='DSfoijfhsd82sds' ;*/
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoAvofourshet::$monPdo = new PDO(PdoAvofourshet::$serveur.';'.PdoAvofourshet::$bdd, PdoAvofourshet::$user, PdoAvofourshet::$mdp); 
			PdoAvofourshet::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoAvofourshet::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoHtAuto = PdoHtAuto::getPdoHtAuto();
 * @return l'unique objet de la classe PdoHtAuto
 */
	public  static function getPdoAvofourshet()
	{
		if(PdoAvofourshet::$monPdoAvofourshet == null)
		{
			PdoAvofourshet::$monPdoAvofourshet=new PdoAvofourshet();
		}
		return PdoAvofourshet::$monPdoAvofourshet;  
	}

	/*public function testsql(){

		$req = "SELECT * FROM `test`";
		$res = PdoAvofourshet::$monPdo->query($req);

		$afficher = $res->fetchAll();

		var_dump($afficher);
	}*/

	public function sendmail($climail,$msgcli)
	{
		/*$climail = "From: siberfrancis971@gmail.com";
		$msgcli = $_POST['climessage'];
		$dest = "test_francis@yahoo.com";
		$sujet = "Email de test";
		if (mail($dest, $sujet,$msgcli,$climail)) {
		  echo "Email envoyé avec succès à $dest ...";
		} else {
		  echo "Échec de l'envoi de l'email...";
		}*/
		$req = "INSERT INTO commentaires (mails, messages) VALUES ('$climail', '$msgcli')";
		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
		
	}
	public function verifconnex($login,$mdp)
	{
		$req = "SELECT count(*) FROM connexion where 
		login = '$login' and motdepasse = '$mdp' ";

		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
		$count = $res->fetchColumn();

		return $count;
 	}
	 public function verifconnexadmin($login,$mdp)
	 {
		 $req = "SELECT count(*) FROM admin WHERE login = '$login' and motdepasse = '$mdp';";
		 $res = PdoAvofourshet::$monPdo->prepare($req);
		 $res->execute();
		 $admin = $res->fetchColumn();
 
		 return $admin;
	  }
	 public function register($nom,$prenom,$email,$motdepasse)
	 {
		//recuperer les infos pour les mettre dans la bdd register 
		$req = "INSERT INTO inscription(nom, prenom, email, motdepasse) VALUES ('$nom', '$prenom', '$email', '$motdepasse')";
		//$req2 = "INSERT INTO connexion(login, motdepasse) VALUES ('$email', '$motdepasse')";
		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
	 }
	 public function importregister($email,$motdepasse){

		$req = "INSERT INTO connexion(login, motdepasse) VALUES ('$email', '$motdepasse')";
		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
	 }
	 public function getLesCommentaires(){
		$req="select * from commentaires";
		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	 }
	 public function getLesTickets(){
		$req="select * from reservation";
		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	 }
	 public function infocompte($email){
		$req = "SELECT nom,prenom,email FROM inscription WHERE email = '$email';";
		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
		$compteinfo = $res->fetchAll();
		return $compteinfo; 
	 }
	 public function suppcompte($email){
		
		$req1 = "DELETE FROM connexion
		WHERE login = '$email';";

		$req2 = "DELETE FROM inscription
		WHERE email = '$email';";

		var_dump($email);
		$res1 = PdoAvofourshet::$monPdo->prepare($req1);
		$res2 = PdoAvofourshet::$monPdo->prepare($req2);


		$res1->execute();
		$res2->execute();

	 }

	 public function getlesproduits(){

		$req="select * from produits";
		$res=  PdoAvofourshet::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	 }
	 public function ajouterproduit($image,$nom,$ingredients,$prix){

		$req ="INSERT INTO produits (photo,nom,ingredients,prix) VALUES ('$image','$nom','$ingredients','$prix');";
		PdoAvofourshet::$monPdo->exec($req);

	 }

	 public function supprimerProduit($unProduits)
	 {
		 $req = "delete from produits where id = $unProduits";
		 //var_dump($req);
		 PdoAvofourshet::$monPdo->exec($req);

	 }
	 public function modifierProduit($unIdProduit,$image,$nom,$ingredients,$prix)
	 {
		 $req = "UPDATE produits SET photo = '$image',nom = '$nom',ingredients = '$ingredients',prix = '$prix' WHERE id = '$unIdProduit';";
		 $res = PdoAvofourshet::$monPdo->prepare($req);
		 $res->execute();

	 }
	 public function ajoutpanierBDD($unIdProduit, $image, $nom, $ingredients, $email, $nom_cli, $prenom, $prix)
	 {
		 $req = "SELECT COUNT(*) AS count FROM commandes WHERE id = '$unIdProduit';";
		 $res = PdoAvofourshet::$monPdo->query($req);
		 $row = $res->fetch(PDO::FETCH_ASSOC);
		 $count = $row['count'];
	 
		 if ($count == 0) {
			 $req = "INSERT INTO commandes (id, image, nom, ingredients, email_cli, nom_cli, prenom_cli, prix) VALUES ('$unIdProduit', '$image', '$nom', '$ingredients', '$email', '$nom_cli', '$prenom', '$prix');";
			 PdoAvofourshet::$monPdo->exec($req);
		 }
	 }
	 
	 public function ajoutpanierSite($email){
		$req = "SELECT id,image, nom, ingredients, prix, id_commande, email_cli FROM commandes WHERE email_cli ='$email';";
		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
	
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}	 
	public function supprimerProduitPanier($unProduitsPanier)
	{
		$req = "delete from commandes where id = $unProduitsPanier";
		PdoAvofourshet::$monPdo->exec($req);

	}
	public function addqteandtaille($Qte,$taille,$idcommande)
	{
		$req = "UPDATE commandes SET Qte = '$Qte', Taille = '$taille' WHERE id_commande = '$idcommande';";
		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
	}
	public function recapcommande($email)
	{
		$req = "SELECT id,image, nom, ingredients, prix, id_commande, email_cli,qte,Taille FROM commandes WHERE email_cli ='$email';";
		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes; 

	}
	public function adresse($nom,$prenom,$habitation,$codep,$pays,$telephone,$email)
	{
		$req = "INSERT INTO adresse (nom,prenom,habitation,codeP,pays,tel,email) VALUES('$nom','$prenom','$habitation','$codep','$pays','$telephone','$email');";
		$res = PdoAvofourshet::$monPdo->prepare($req);
		$res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}                                                                    

	
}


	

?>
