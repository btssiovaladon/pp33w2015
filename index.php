<?php
<<<<<<< HEAD
$uc = $_REQUEST["uc"];
switch($uc){
	case "vue" :
		include ("vue/inc_AutoComplet.php");
		break;
	default :
		include ('controleur/c_AutoCompletAmis.php');
		break;
}




?>
=======

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

>>>>>>> 1aec327e286722d046c74f09e3b7f705e04bc1a3
