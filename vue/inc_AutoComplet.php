<!-- Pour l'utiliser, il faut ajouter dans l'index :

$ajax = $_REQUEST["ajax"];
switch($ajax){
	default :
		include ('controleur/c_AutoCompletAmis.php');
		break;
}
 
Puis dans la page o� on souhaite afficher la liste :
		
	include ("vue/inc_AutoComplet.php");
	

 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
Veuillez saisir un nom:
<input type="text" id ="nomPers" name="NOM_PERSONNE" onkeyup="javascript:envoipersajax(this.value)">
</br></br>
<select id="listePers" name="listePers" size="15">

</select>

<script type="text/javascript" language="javascript">
$(document).ready(function() {	//Initialisation de la liste au demarrage	
	var nom;
	nom="";
	envoipersajax(nom);
});
	
function envoipersajax(nom)
{
	var requete= $.ajax({ // ajax :la variable requete envoie un objet XMLHttpRequest.
	url: "index.php?ajax=c_AutoCompletAmis&action=", // url de la page � charger
	type:"POST",
	data:"NOM_PERSONNE=" + escape(nom),//les donn�es � envoyer avec l�URL. (voir page suivante ce que fait la page getpersonne.php
	//cache: false, // pas de mise en cache
	success:function(){ // si la requ�te est un succ�s
		var selectPers=document.getElementById("listePers"); //initialisation de la liste d�roulante
		if(requete.responseText=='') //normalement, requete.responseText contient le r�sultat renvoy� par l�URL, c�est � dire la liste des personnes s�par�es par des �/� et � l�int�rieur de chaque ligne, les champs s�par�es par des �*�.
		{
			selectPers.length=0;
		}
		else
		{
			var personne,i,nb,pers;
			personne=requete.responseText.split('/'); // personne est un tableau contenant toutes les lignes renvoy�es par la requ�te. La fonction split() permet de scinder une cha�ne de caract�res et de retourner les r�sultats dans un tableau
			
			nb=personne.length; // nb contient le nombre de lignes du tableau
			selectPers.length=nb; // ce sera donc le nombre d��l�ments pr�sents dans la liste.
			for (i=0; i<nb; i++) //boucle pour afficher tous les elements dans la liste
			{
				pers=personne[i].split('*'); //On s�pare le code, le nom et le pr�nom
				selectPers.options[i].value=pers[0];//le code personne devient la valeur de la liste
				selectPers.options[i].text=pers[1]+ " " +pers[2];// le texte de la liste est compos� de la concatenation du nom et du pr�nom
			}
			selectPers.options[0].selected='selected';
			
		}
	},
	error:function(){ //dans le cas d��chec, envoyer un message.
	alert('error');
	}
	});
	return;
}
</script>