<?php
	require_once ("./include/class.pdoamis.inc.php");
	$pdo=new PdoGsb();
	
	$action=$_REQUEST['action'];
	
	switch($action){
		case 'afficher':
			
			//$lesAmis=$pdo->getAllAmis();
			//$lesCommissins..
			include ('./vue/v_creation_action.php');
			break;
			
		case 'ajouter_action':
			echo "ajouter";
			break;
	}
		
		
?>