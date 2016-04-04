<?php

require_once ("include/class.pdoamis.inc.php");


	$uc = $_REQUEST['uc'];
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

//$uc = "c_AutoCompletAmis";
switch($uc){
	case "c_AutoCompletAmis" :

		include ('controleur/c_AutoCompletAmis.php');
		break;
	default:
		include("vue/test.php");
		
}

	$uc = $_REQUEST['uc'];
	include('controleur/c_'.$uc.'.php');

?>