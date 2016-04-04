<?php

$action = $_REQUEST['action'];
switch($action){
		case 'Afficher':
			include 'include/class.pdoamis.inc.php';
			$pdo=new PdoGsb();
			$chef = $pdo->getChefAction(1);
			$listeParticipant= $pdo->getParticipantAction(1);
			
			include("vue/v_InscriptionAmisAction.php");
			break;
			
		case "Ajouter":
			include 'include/class.pdoamis.inc.php';
			$pdo=new PdoGsb();
		
			if(isset($_POST['ajouter'])){
				$participation = $pdo->getParticipation($_POST['numAction'],$_POST['listePers']);
				if($participation){
					echo utf8_decode('Cet ami participe déjà à l"action');
				}
				else{
					$pdo->insertParticipation($_POST['numAction'],$_POST['listePers']);
				}
			}

			// changer les '1' par $_POST['quelque chose'] voir avec nabil
			$chef = $pdo->getChefAction(1);
			$listeParticipant= $pdo->getParticipantAction(1);
			include("vue/v_InscriptionAmisAction.php");
			break;
	}
?>