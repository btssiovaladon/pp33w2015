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
	}
?>