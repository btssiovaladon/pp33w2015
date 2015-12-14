<?php
<<<<<<< HEAD
	
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
=======

$uc=$_GET['uc'];

switch ($uc){
	case 'SuppAction':
		include_once("./controleur/c_SuppAction.php");
		break;
}
?>
>>>>>>> fb0f040065f1a361dbf33e4f284f958255ab8cf0
