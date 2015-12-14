<?php 
	$sql = "select * from amis where NOMAMIS like 'tuv' ORDER by NOMAMIS";
	echo $sql;
	$req=mysql_query($sql); // requête sélectionnant les personnes dont le nom commence par les caractères envoyés par l’intermédiaire de la méthode $.ajax
	
	$pers=mysql_fetch_assoc($req);
	if ($pers)
	{
		$resultat=$pers['NUMAMIS'].'*'.$pers['NOMAMIS'].'*'.$pers['PRENOMAMIS']; // le tableau résultat contient la concaténation du code de la personne, de son nom et de son prénom séparés par des « * ».
		$pers=mysql_fetch_assoc($req);
	}
	else
	{
		$resultat='';
	}
	while($pers)
	{
		$resultat=$resultat.'/'.$pers['NUMAMIS'].'*'.
		$pers['NOMAMIS'].'*'.$pers['PRENOMAMIS']; // le tableau résultat contiendra les occurrences résultat de la requêtes séparées par un « / ».
		$pers=mysql_fetch_assoc($req);
	}
	//mysql_close(
	echo $resultat; // le tableau résultat va être renvoyé en retour à la méthode
?>