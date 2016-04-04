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
 * @author 	LucasTg
 * @version 1.0
 * @link 	http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=bdamis';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		static $monPdo;
		static $monPdoGsb=null;
		
		
	
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	public function __construct(){
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

		public function amis_cree($nomAmis, $prenomAmis, $telephoneFixeAmis, $telephonePortAmis, $emailAmis, $numRueAmis, $adresseAmis, $villeAmis, $CPAmis, $DateEntreClubAmis){
			//$dateFr = convdate($DateEntreClubAmis);
			$dateEng = $DateEntreClubAmis;
			$dateEng = implode('-',array_reverse (explode('/',$dateEng)));
			$req = "insert into amis(NOMAMIS, PRENOMAMIS, TELEPHONEFIXEAMIS, TELEPHONEPORTAMIS, EMAILAMIS, NUMRUEAMIS, ADRESSEAMIS, VILLEAMIS, CPAMIS, DATEENTREECLUBAMIS) values('$nomAmis', '$prenomAmis', '$telephoneFixeAmis', '$telephonePortAmis', '$emailAmis', '$numRueAmis', '$adresseAmis', '$villeAmis', '$CPAmis', '$dateEng')";
			PdoGsb::$monPdo->exec($req);
		}
			
		public function action_cree($numAmis, $selectCommissions, $nomAction, $dateDebut, $duree, $fonds){
			//$dateFr = convdate($DateEntreClubAmis);;
			$req = "insert into action(`NUMAMIS`, `NUMCOMMISSION`, `NOMACTION`, `DATEDEBUTACTION`, `DUREEACTION`, `FONDCOLLECTEACTION`) values('$numAmis', '$selectCommissions', '$nomAction', '$dateDebut', '$duree', '$fonds')";
			
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
		
		public function majCotisation($montant){
			$req = "update parametre set MONTANTCOTISATIONANNUELLE = '$montant' where NUMPARAMETRE='1'";
			PdoGsb::$monPdo->exec($req);
		}
		public function pdo_maj_amis($num,$nom,$prenom,$tel_fix,$tel,$email,$rue,$adresse,$ville,$cp,$date_entree_club){
			$req = "update amis set NOMAMIS = '$nom', PRENOMAMIS= '$prenom', TELEPHONEFIXEAMIS = '$tel_fix', TELEPHONEPORTAMIS= '$tel',
						EMAILAMIS = '$email', NUMRUEAMIS= '$rue', ADRESSEAMIS = '$adresse', VILLEAMIS= '$ville',
						CPAMIS = '$cp', DATEENTREECLUBAMIS= '$date_entree_club'
				where NUMAMIS ='$num'";
			PdoGsb::$monPdo->exec($req);
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

		
		public function pdo_suppr_amis ($num) {
			$req="DELETE FROM amis WHERE NUMAMIS = '$num'";
			PdoGsb::$monPdo->exec($req);
		}

		
	/**
	 * Suppression d'une action
	 
	 * @param $id identifiant action 
	*/
		public function pdo_sup_action($id){
			$req = "delete from action where NUMACTION =$id";
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
		
		
		public function getAction($idAction)
		{
			$sql='SELECT NUMACTION,NOMACTION FROM ACTION WHERE NUMACTION='.$idAction;
			$res=PdoGsb::$monPdo->query($sql);
			return $res->fetch();
		}
		
		
		public function pdo_getAmisAll()
		{
			$req = "select NUMAMIS, NOMAMIS, PRENOMAMIS from amis";
			$res = PdoGsb::$monPdo->query($req);
			return $res;
		}
		
		
		public function pdo_getMontant($id)
		{
			$req = 'SELECT PRENOMAMIS, NOMAMIS, NBPARTICIPANT, DATEDINER, PRIXDINER, LIEUDINER,  NBPARTICIPANT*PRIXDINER AS montant FROM `amis` a INNER JOIN `manger` m ON a.NUMAMIS=m.NUMAMIS INNER JOIN `diner` d ON m.NUMDINER=d.NUMDINER WHERE a.NUMAMIS='.$id;
			
			$res = PdoGsb::$monPdo->query($req);
			return $res;
		}
		
		public function pdo_getMontantCotisation()
		{
			$req = 'SELECT MONTANTCOTISATIONANNUELLE FROM `parametre` ';
			$res = PdoGsb::$monPdo->query($req);
			$laLigne = $res->fetch();
			return $laLigne['MONTANTCOTISATIONANNUELLE'];
		}
		
		
		
/**
 * AUTRE
 */

/**
 * FONCTION PERMETTANT LE CHOIX DES ACTIONS
 */

		public function pdo_getListeAmis()
		{
			$req = "select * from amis ";
			$res = PdoGsb::$monPdo->query($req);
			$laLigne = $res->fetchAll();
			return $laLigne;
		}
		/**
		 *
		 */
		public function pdo_get_etiquette_participant($numAction)
		{
			$req = "SELECT NOMAMIS, PRENOMAMIS, NUMRUEAMIS, ADRESSEAMIS, VILLEAMIS, CPAMIS
					FROM amis
					INNER JOIN participant ON participant.NUMAMIS = amis.NUMAMIS
					WHERE participant.NUMACTION =$numAction";
			$res = PdoGsb::$monPdo->query($req);
			$laLigne = $res->fetchAll();
			return $laLigne;
		}


	/**
	 * Description de la fonction
	 
	*/	
		public function getAllAction()
		{
			$sql='SELECT NUMACTION,NOMACTION FROM ACTION';
			$res=PdoGsb::$monPdo->query($sql);
			
			return $res->fetchAll();
		}
		
	/* Xavier - 
	*/
		function pdo_getAllAction()
		{
			

			$requete_selection ='SELECT * FROM `action`';


			$resultat=PdoGsb::$monPdo-> prepare($requete_selection);
			
			$resultat->execute(array());
			
			return $resultat;
		}
		
		/* Nabil - 
	*/
		function pdo_getAllAmis()
		{
			

			$requete_selection ='SELECT * FROM `amis`';


			$resultat=PdoGsb::$monPdo-> prepare($requete_selection);
			
			$resultat->execute(array());
			
			return $resultat->fetchAll();
		}
				
		function pdo_getAllCommission()
		{
			

			$requete_selection ='SELECT * FROM `commission`';


			$resultat=PdoGsb::$monPdo-> prepare($requete_selection);
			
			$resultat->execute(array());
			
			return $resultat->fetchAll();
		}
		
/**
 * AUTRE
 */


	
 

 

 /**
	 * Description de la fonction
	 
	 * @param aucun 
	*/	
		public function pdo_get_allAction()
		{
			$req = "select * from action";
			
			$res = PdoGsb::$monPdo->query($req);
			
			return $res->fetchAll();
		}



		
		/* Jérémy */
		
		public function getChefAction($numAction){
			$req="select NUMAMIS from action where NUMACTION=?";
			$res = PdoGsb::$monPdo->prepare($req);
			$res->bindParam(1, $numAction);
			$res->execute();
			$numAmis = $res->fetch();
			
			$req2="select NOMAMIS, PRENOMAMIS from amis where NUMAMIS=?";
			$res2 = PdoGsb::$monPdo->prepare($req2);
			$res2->bindParam(1, $numAmis['NUMAMIS']);
			$res2->execute();
			$chef=$res2->fetch();
			return $chef;
		}
		
		public function getParticipantAction($numAction){
			$req="select NOMAMIS,PRENOMAMIS from participant inner join amis on participant.NUMAMIS=amis.NUMAMIS where NUMACTION=?";
			$res = PdoGsb::$monPdo->prepare($req);
			$res->bindParam(1, $numAction);
			$res->execute();
			$listeAmis= $res->fetchAll();
			return $listeAmis;
		}
		
		public function getParticipation($numAction,$numParticipant){
			$req="select NUMACTION from participant where NUMACTION=? and NUMAMIS=?";
			$res = PdoGsb::$monPdo->prepare($req);
			$res->bindParam(1, $numAction);
			$res->bindParam(2, $numParticipant);
			$res->execute();
			$Participation= $res->fetch();
			return $Participation;
		}
		
		public function insertParticipation($numAction,$numParticipant){
			$req="insert into participant values (?,?)";
			$res = PdoGsb::$monPdo->prepare($req);
			$res->bindParam(1, $numAction);
			$res->bindParam(2, $numParticipant);
			$res->execute();
		}

}
?>