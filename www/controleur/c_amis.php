<?php
$action = $_REQUEST['action'];
switch($action){
	case 'ajouteramis':{
		$nomAmis = $_REQUEST['NOMAMIS'];
		$prenomAmis = $_REQUEST['PRENOMAMIS'];
		$telephoneFixeAmis = $_REQUEST['TELEPHONEFIXEAMIS'];
		$telephonePortAmis = $_REQUEST['TELEPHONEPORTAMIS'];
		$emailAmis = $_REQUEST['EMAILAMIS'];
		$numRueAmis = $_REQUEST['NUMRUEAMIS'];
		$adresseAmis = $_REQUEST['ADRESSEAMIS'];
		$villeAmis = $_REQUEST['VILLEAMIS'];
		$CPAmis = $_REQUEST['CPAMIS'];
		$DateEntreClubAmis = $_REQUEST['DATEENTRECLUBAMIS'];
		amis_cree($nomAmis, $prenomAmis, $telephoneFixeAmis, $telephonePortAmis, $emailAmis, $numRueAmis, $adresseAmis, $adresseAmis, $villeAmis, $CPAmis, $DateEntreClubAmis);
		break;
		}
	}


	?>