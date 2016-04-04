<?php
<<<<<<< HEAD


//$uc = "c_AutoCompletAmis";
switch($uc){
	case "c_AutoCompletAmis" :
	
		include ('controleur/c_AutoCompletAmis.php');
		break;
	default:
		include("vue/test.php");
		
}
=======
	$uc = $_REQUEST['uc'];
	include('controleur/c_'.$uc.'.php');
>>>>>>> 207a9b1a4436ffb9f56726d973e61b39e554b17f
?>