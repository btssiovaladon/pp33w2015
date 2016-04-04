<?php 
	require_once ("include/class.pdoamis.inc.php");
	$pdo=new PdoGsb();
	$action = $_REQUEST['action'];
	
	switch($action){
		case "editerPdfReleveAnnuel":
			$amis=$pdo->pdo_getListeAmis();
			$montantCotisationAnnuel = $pdo->pdo_getMontantCotisation();
			include ("vue/v_pdfReleveAmi.php");
			break;
	
	$action = $_REQUEST['action'];
	switch($action){
		case 'validerMajMontantCotisation':
			$montant = $_REQUEST['montant'];
			$pdo->majCotisation($montant);
			include("vue/v_form_cotisation.php");
			break;
		
		case 'afficher':
			include ("vue/v_form_cotisation.php");
	}
?>