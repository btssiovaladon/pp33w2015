<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application BDAMIS
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 
 * @package default
 * @author 	Lucas
 * @version 1.0
 * @link 	http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=BDAMIS';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * FONCTION PERMETTANT D'AJOUTER UNE LIGNE
 */

	/**
	 * Description de la fonction
	 
	 * @param $param1 
	 * @param $param2
	 * @param $param3
	*/
		public function pdo_cree($param1, $param2, $param3){
			$dateFr = dateFrancaisVersAnglais($date);
			$req = "insert into matable 
			values('$param1','$param2','$param3')";
			PdoGsb::$monPdo->exec($req);
		}

/**
 * FONCTION PERMETTANT DE METTRE A JOUR UNE LIGNE
 */

	/**
	 * Description de la fonction
	 
	 * @param $param1 
	 * @param $param2
	 * @param $param3
	 */
	 
		public function pdo_maj($param1,$param2){
			$req = "update matable set monchamps1 = '$param1', monchamps2 = param2 
			where monchamps3 ='$param3'";
			PdoGsb::$monPdo->exec($req);
		}
	}

/**
 * FONCTION PERMETTANT DE SUPPRIMER UNE LIGNE
 */

	/**
	 * Description de la fonction
	 
	 * @param $param1 
	*/
		public function pdo_sup($param1){
			$req = "delete from matable where monchamps1 =$param1 ";
			PdoGsb::$monPdo->exec($req);
		}

/**
 * FONCTION PERMETTANT DE RETOURNER UNE LIGNE
 */

	/**
	 * Description de la fonction
	 
	 * @param $param1 
	 * @param $param2
	 * @return un résultat 
	*/	
		public function pdo_get($param1,$param2)
		{
			$req = "select * from matable 
			where monchamps1 = '$param1' and monchamps2 = '$param2'";
			$res = PdoGsb::$monPdo->query($req);
			$laLigne = $res->fetch();
			return $laLigne;
		}

/**
 * AUTRE
 */
}
?>