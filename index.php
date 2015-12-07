<?php

$uc=$_GET['uc'];

switch ($uc){
	case 'SuppAction':
		include_once("./controleur/c_SuppAction.php");
		break;
}
?>
