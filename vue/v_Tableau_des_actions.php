<center>
 
<<<<<<< HEAD
	<form name="form_saisie_action" action="index.php?uc=tableau_actions&action=choixlist" method="post">
		<select name="list" onchange="submit()">
=======
	<form name="form_saisie_action" action="index.php?uc=Tableau_des_actions&action=choixlist" method="post">
		<select name="list" onchange="this.form.submit()">
			<option value="">Choisir une action...</option>
>>>>>>> bc63ca7e29d7797889cef39009fb586518d47f68
			<?php foreach ($listeAction as $ligne){ ?>
				<option value="<?php echo $ligne['NUMACTION'];?>"><?php echo $ligne['NOMACTION'];?></option>
			<?php } ?>	
		</select>
	
	</form> 
 
 
<?php if (isset($_POST['list'])){ 

echo $_POST['list']
?>
 
<table border ="2" bordercolor = "black">
<tr>
	<th>Nom Activité</th>
	<th>Ajouter un participant</th>
	<th>Consulter</th>
	<th>Modifier l'activité</th>
	<th>Suprimer l'activité</th>
	<th>Imprimer</th>
	<th>Imprimer étiquettes</th>
</tr>
 
<tr>
	<td><center><?php echo $action['NOMACTION']; ?></center></td>
<<<<<<< HEAD
	<td><center><a href="?page=&id=<?php echo $_POST['list'];?>"><img src="./image/Img_tableau_des_actions/add-icon.png" width="32" height="32"/></a></center></td>
	<td><center><a href=" "><img src="./image/Img_tableau_des_actions/icone_consulter.png" width="32" height="32" /></a></center></td>
	<td><center><a href=" "><img src="./image/Img_tableau_des_actions/modifier.png" width="32" height="32" /></a></center></td>
	<td><center><a href=" "><img src="./image/Img_tableau_des_actions/delete-icon.png" width="32" height="32" /></a></center></td>
	<td><center><a href=" "><img src="./image/Img_tableau_des_actions/logo_imprimante.png" width="32" height="32" /></a></center></td>
	<td><center><a href="index.php?uc=liste_Amis&action=etiquette&NUMACTION=<?php echo $_POST['list'];?>"><img src="./image/Img_tableau_des_actions/etiquette-icone.png" width="32" height="32" /></a></center></td>
=======
	<td><center><a href="?uc=ajoutParticipant&action=Afficher&id=<?php echo $_POST['list'];?>"><img src="image/add-icon.png" width="32" height="32"/></a></center></td>
	<td><center><a href=" "><img src="image/	icone_consulter.png" width="32" height="32" /></a></center></td>
	<td><center><a href=" "><img src="image/modifier.png" width="32" height="32" /></a></center></td>
	<td><center><a href=" "><img src="image/delete-icon.png" width="32" height="32" /></a></center></td>
	<td><center><a href="./vue/v_impressionListeAmis_fonction.php"><img src="image/logo_imprimante.png" width="32" height="32" /></a></center></td>
	<td><center><a href=" "><img src="image/etiquette-icone.png" width="32" height="32" /></a></center></td>
>>>>>>> bc63ca7e29d7797889cef39009fb586518d47f68
</tr>
</table>
</center>
<?php } ?>