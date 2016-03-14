<?php
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