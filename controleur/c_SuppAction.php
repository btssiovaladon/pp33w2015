<?php 
	require_once ("include/class.pdoamis.inc.php");
	$pdo=new PdoGsb();
	
	$action = $_REQUEST['action'];
	switch($action){
		case 'suppr':
			$id=$_GET['id'];
			$pdo->pdo_sup_action($id);
			
			$listeAction=$pdo->pdo_get_allAction();
			include("vue/v_supAction.php");
			break;
		
		case 'afficher':
		
			$listeAction=$pdo->pdo_get_allAction();
			include("vue/v_supAction.php");
	}
?>