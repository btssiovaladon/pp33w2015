<?php 
	require_once ("../include/class.pdoamis.inc.php");
	$pdo=new PdoGsb();
	$action = $_REQUEST['action'];
	
	switch($action){
		case 'validerMajMontantCotisation':
			$montant = $_REQUEST['montant'];
			$pdo->majCotisation($montant);
			include("vue/v_form_cotisation.php");
			break;
		
		case 'afficher':
			include ("vue/v_form_cotisation.php");
			break;
			
		case 'AfficherListeParticipant':	
			$lesVisiteurs=$pdo->pdo_getAmisAll();
			include ("../vue/v_selectionParticipant.php");
			break;
			
		case "editerPdfReleveAnnuel":
			$Visiteurs=$pdo->pdo_getAfficherReleveAnnuel($id);
			include ("vue/v_pdfReleveAmi.php");
			echo "choix=".$_POST['choixamis'];
			break;
	}
?>