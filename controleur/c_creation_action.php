<?php
	require_once ("./include/class.pdoamis.inc.php");
	$pdo=new PdoGsb();
	
	$action=$_REQUEST['action'];
	
	switch($action){
		case 'afficher':			
			$lesAmis=$pdo->pdo_getAllAmis();
			$lesCommisions=$pdo->pdo_getAllCommission();
			include ('./vue/v_creation_action.php');
			break;
			
		case 'ajouter_action':
		
		$ajouter=$pdo->action_cree($_POST['listePers'], $_POST['selectCommissions'], $_POST['NOMACTION'] , $_POST['DATEDEBUT'], $_POST['DUREE'], $_POST['FONDS']);
			break;
	}
?>