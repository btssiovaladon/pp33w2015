<?php 
	$req=mysql_query("select * from amis where NOM_PERSONNE like '".$_POST['NOM_PERSONNE']."%'"." ORDER by NOM_PERSONNE"); // requ�te s�lectionnant les personnes dont le nom commence par les caract�res envoy�s par l�interm�diaire de la m�thode $.ajax
	$pers=mysql_fetch_assoc($req);
	if ($pers)
	{
		$resultat=$pers['CODE_PERSONNE'].'*'.$pers['NOM_PERSONNE'].'*'.$pers['PRENOM_PERSONNE']; // le tableau r�sultat contient la concat�nation du code de la personne, de son nom et de son pr�nom s�par�s par des � * �.
		$pers=mysql_fetch_assoc($req);
	}
	else
	{
		$resultat='';
	}
	while($pers)
	{
		$resultat=$resultat.'/'.$pers['CODE_PERSONNE'].'*'.
		$pers['NOM_PERSONNE'].'*'.$pers['PRENOM_PERSONNE']; // le tableau r�sultat contiendra les occurrences r�sultat de la requ�tes s�par�es par un � / �.
		$pers=mysql_fetch_assoc($req);
	}
	//mysql_close(
	echo $resultat; // le tableau r�sultat va �tre renvoy� en retour � la m�thode
?>