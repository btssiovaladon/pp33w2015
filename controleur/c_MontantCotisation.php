<?php 
	require_once ("include/class.pdoamis.inc.php");
	$pdo=new PdoGsb();
	$action = $_REQUEST['action'];
	
	switch($action){
		case 'saisie':
			include("vue/v_form_cotisation.php");
			break;
		case 'MAJ' :	
			$montant = $_POST['montant'];
			echo $montant;
			$pdo->majCotisation($montant);
		break;
		
		
	}
		
		

?>