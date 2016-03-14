
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
</head>
Veuillez saisir un nom:
<input type="text" id ="nomPers" name="NOM_PERSONNE" onkeyup="javascript:envoipersajax(this.value)">
</br></br>
<select id="listePers" size="15">

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
	url: "js/getpersonne.php", // url de la page à charger
	type:"POST",
	data:"NOM_PERSONNE=" + escape(nom),//les données à envoyer avec l’URL. (voir page suivante ce que fait la page getpersonne.php
	//cache: false, // pas de mise en cache
	success:function(){ // si la requête est un succès
		var selectPers=document.getElementById("listePers"); //initialisation de la liste déroulante
		if(requete.responseText=='') //normalement, requete.responseText contient le résultat renvoyé par l’URL, c’est à dire la liste des personnes séparées par des “/” et à l’intérieur de chaque ligne, les champs séparées par des “*”.
		{
			selectPers.length=0;
		}
		else
		{
			var personne,i,nb,pers;
			personne=requete.responseText.split('/'); // personne est un tableau contenant toutes les lignes renvoyées par la requête. La fonction split() permet de scinder une chaîne de caractères et de retourner les résultats dans un tableau
			
			nb=personne.length; // nb contient le nombre de lignes du tableau
			selectPers.length=nb; // ce sera donc le nombre d’éléments présents dans la liste.
			for (i=0; i<nb; i++) //boucle pour afficher tous les elements dans la liste
			{
				pers=personne[i].split('*'); //On sépare le code, le nom et le prénom
				selectPers.options[i].value=pers[0];//le code personne devient la valeur de la liste
				selectPers.options[i].text=pers[1]+ " " +pers[2];// le texte de la liste est composé de la concatenation du nom et du prénom
			}
			selectPers.options[0].selected='selected';
			
		}
	},
	error:function(){ //dans le cas d’échec, envoyer un message.
	alert('error');
	}
	});
	return;
}



</script>