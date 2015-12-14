<?php
	

	$uc = $_REQUEST['uc'];
	switch($uc){
	case 'Tableau_des_actions':{
		include("controleur/c_Tableau_des_actions.php");break;
	}
	}
?>