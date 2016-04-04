<?php


//$uc = "c_AutoCompletAmis";
switch($uc){
	case "c_AutoCompletAmis" :
	
		include ('controleur/c_AutoCompletAmis.php');
		break;
	default:
		include("vue/test.php");
		
}
?>