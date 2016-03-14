<?php 
require_once ("../include/class.pdoamis.inc.php");
$pdo=new PdoGsb();

	

	if(empty($_POST['NOM_PERSONNE']))	//Si NOM_PERSONNE est vide, on arrive sur la page et on remplit la liste avec toute la table "amis"
	{
		$sql = "select NUMAMIS, NOMAMIS, PRENOMAMIS from amis ORDER by NOMAMIS";
	}
	else								//Sinon on selectionne les amis commencant par notre saisie
	{
		$sql = "select NUMAMIS, NOMAMIS, PRENOMAMIS from amis where NOMAMIS like '".$_POST['NOM_PERSONNE']."%'"." ORDER by NOMAMIS";
	}
	
	$req = PdoGsb::$monPdo->query($sql); // requ�te s�lectionnant les personnes dont le nom commence par les caract�res envoy�s par l�interm�diaire de la m�thode $.ajax
	$testfetch = $req->fetch();			
	if($testfetch){
		$resultat=$testfetch['NUMAMIS'].'*'.$testfetch['NOMAMIS'].'*'.$testfetch['PRENOMAMIS']; //On concat�ne nos r�sultat, par exemple $resultat = 1*Pasqualini*Claude
		
	}else{
		$resultat='';
	}

	
	while($pers=$req->fetch(PDO::FETCH_OBJ))
	{
		$resultat=$resultat.'/'.$pers->NUMAMIS.'*'.$pers->NOMAMIS.'*'.$pers->PRENOMAMIS; // le tableau r�sultat contiendra les occurrences r�sultat de la requ�tes s�par�es par un � / �.
	}																					// Donc par exemple : $resultat = 1*Pasqualini*Claude/2*Bogusz*Thierry/3*Bourgeois*Agnes
	
	echo $resultat; // le tableau r�sultat va �tre renvoy� en retour � la m�thode
?>