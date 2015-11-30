<?php 
	$action = $_REQUEST['action'];
	switch($action){
		case 'validerMajMontantCotisation':{
			$montant = $_REQUEST['montant'];
			majCotisation($montant);
			include("vue/v_form_cotisation.php");
			break;
		}
	}
?>