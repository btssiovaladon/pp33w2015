<?php
require_once ("include/class.pdoamis.inc.php");
if(!isset($_REQUEST['uc'])){
     $_REQUEST['uc'] = 'liste_Amis';
}
	$uc = $_REQUEST['uc'];
	switch($uc){
	case 'liste_Amis':{
		include("controleur/c_listeAmis.php");break;
	}
	}
?>
