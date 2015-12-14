<?php

 if(isset($_REQUEST['action'])){
	$action = $_REQUEST['action'];
	switch($action){
		case 'ajouteramis':
			include("controleur/c_amis.php");
			break;
	}
 }
?>

<a href="vue/v_ajout_amis.php">Ajout amis</a>


include ('js/listeAutoComplet.php');

?>

