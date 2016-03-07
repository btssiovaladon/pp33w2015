<?php
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