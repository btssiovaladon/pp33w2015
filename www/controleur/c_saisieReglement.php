<?php 
	require_once ("include/class.pdoamis.inc.php");
	$pdo=new PdoGsb();
	$action = $_REQUEST['action'];
	
	switch($action){
		case 'choix':
			include("js/listeAutoComplet.php");
			break;
		
		
	}
		
		

?>