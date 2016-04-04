<?php

require_once ("include/class.pdoamis.inc.php");



	if (isset($_REQUEST['uc'])) $uc=$_REQUEST['uc'];
	if (isset($_REQUEST['pdf'])) $uc=$_REQUEST['pdf'];
	switch($uc){
		case 'tableau_actions':
			include("controleur/c_Tableau_des_actions.php");
			break;
			
		case "liste_Amis":
			include("controleur/c_listeAmis.php");
			break;
			
		case "creation_action":
			include("controleur/c_creation_action.php");
			break;


		case "c_AutoCompletAmis" :
		include ('controleur/c_AutoCompletAmis.php');
		break;
		
			default:
				include("vue/test.php");
		
}

?>