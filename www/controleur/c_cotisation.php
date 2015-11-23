<?php
	$action = $_REQUEST['action'];
	switch($action){
		case 'validerMajMontantCotisation':{
			include("vue/v_form.cotisation.php");
			break;
		}
?>