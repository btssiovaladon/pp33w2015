<?php 
	$req=mysql_query("select * from amis where NOM_PERSONNE like '".$_POST['NOM_PERSONNE']."%'"." ORDER by NOM_PERSONNE"); // requête sélectionnant les personnes dont le nom commence par les caractères envoyés par l’intermédiaire de la méthode $.ajax
	$pers=mysql_fetch_assoc($req);
	if ($pers)
	{
		$resultat=$pers['CODE_PERSONNE'].'*'.$pers['NOM_PERSONNE'].'*'.$pers['PRENOM_PERSONNE']; // le tableau résultat contient la concaténation du code de la personne, de son nom et de son prénom séparés par des « * ».
		$pers=mysql_fetch_assoc($req);
	}
	else
	{
		$resultat='';
	}
	while($pers)
	{
		$resultat=$resultat.'/'.$pers['CODE_PERSONNE'].'*'.
		$pers['NOM_PERSONNE'].'*'.$pers['PRENOM_PERSONNE']; // le tableau résultat contiendra les occurrences résultat de la requêtes séparées par un « / ».
		$pers=mysql_fetch_assoc($req);
	}
	//mysql_close(
	echo $resultat; // le tableau résultat va être renvoyé en retour à la méthode
?>