<?php 
	
	$pdo=new PdoGsb();
	
	$action = $_REQUEST['action'];
	switch($action){
	case 'listeAmis':{
		$lesAmis=$pdo->pdo_getListeAmis();
		
		include("vue/v_listeAmis.php");
		
	break;
	}
	case 'informations':{
		$num=$_GET['NUMAMIS'];
		$nom=$_GET['NOMAMIS'];
		$prenom=$_GET['PRENOMAMIS'];
		$tel_fix = $_GET['TELEPHONEFIXEAMIS'];
		$tel = $_GET['TELEPHONEPORTAMIS'];
		$email = $_GET['EMAILAMIS'];
		$rue = $_GET['NUMRUEAMIS'];
		$adresse = $_GET['ADRESSEAMIS'];
		$ville = $_GET['VILLEAMIS'];
		$cp = $_GET['CPAMIS'];
		$date_entree_club = $_GET['DATEENTREECLUBAMIS'];
		
		include("vue/v_modification_amis.php");
		
	break;
	}
	case 'suppression':{
		
		$num=$_GET['NUMAMIS'];
		$Amis=$pdo->pdo_suppr_amis($num);
		//echo 'suppresion effectué';
		$lesAmis=$pdo->pdo_getListeAmis();
		
		include("vue/v_listeAmis.php");
		
	break;
	}
	case 'modification':{
		$num=$_POST['NUMAMIS'];
		$nom=$_POST['NOMAMIS'];
		$prenom=$_POST['PRENOMAMIS'];
		$tel_fix = $_POST['TELEPHONEFIXEAMIS'];
		$tel = $_POST['TELEPHONEPORTAMIS'];
		$email = $_POST['EMAILAMIS'];
		$rue = $_POST['NUMRUEAMIS'];
		$adresse = $_POST['ADRESSEAMIS'];
		$ville = $_POST['VILLEAMIS'];
		$cp = $_POST['CPAMIS'];
		$date_entree_club = $_POST['DATEENTREECLUBAMIS'];
		$maj=$pdo->pdo_maj_amis($num,$nom,$prenom,$tel_fix,$tel,$email,$rue,$adresse,$ville,$cp,$date_entree_club);
		$lesAmis=$pdo->pdo_getListeAmis();
		
		include("vue/v_listeAmis.php");
		
	break;
	}
	case 'etiquette':{
		$numAction=$_REQUEST['NUMACTION'];
		$lesParticipants=$pdo->pdo_get_etiquette_participant($numAction);
		
		if ($lesParticipants == ''){
			print ("Aucun participant trouvé dans la base");
		}
		
		include("vue/v_etiquette_pdf.php");
		
	break;
	}
}
?>