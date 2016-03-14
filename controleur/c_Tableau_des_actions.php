<?php 
	require_once ("include/class.pdoamis.inc.php");
	$pdo=new PdoGsb();
	
	$action = $_REQUEST['action'];
	switch($action){
		case 'validerMajMontantCotisation':
			$montant = $_REQUEST['montant'];
			$pdo->majCotisation($montant);
			include("vue/v_form_cotisation.php");
			break;		
		case 'afficher':
			$listeAction=$pdo->getAllAction();
			include ("vue/v_Tableau_des_actions.php");
			break;
		case 'choixlist':
			$idAction=$_POST['list'];
			$action=$pdo->getAction($idAction);
			$listeAction=$pdo->getAllAction();
			include("vue/v_Tableau_des_actions.php");
			break;			
	}
?>