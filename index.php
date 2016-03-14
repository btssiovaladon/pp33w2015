<?php

require_once ("include/class.pdoamis.inc.php");
if(!isset($_REQUEST['uc'])){
     $_REQUEST['uc'] = 'liste_Amis';
}

	$uc = $_REQUEST['uc'];
	switch($uc){
		case 'Tableau_des_actions':
			include("controleur/c_Tableau_des_actions.php");
			break;
			
		case "creation_action":
			include("controleur/c_creation_action.php");
			break;
	
	}

?>

