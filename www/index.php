<?php
	include("vue/v_form_cotisation.php");
	$action = $_REQUEST['action'];
	switch($action){
		case 'ajouteramis':
			include("controleur/c_amis.php");
			break;
	}
?>

<a href="vue/v_ajout_amis.php">Ajout amis</a>