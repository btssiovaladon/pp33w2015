<center>
 
	<form name="form_saisie_action" action="index.php?uc=Tableau_des_actions&action=choixlist" method="post">
		<select name="list" onchange="this.form.submit()">
			<option value="">Choisir une actions...</option>
			<?php foreach ($listeAction as $ligne){ ?>
				<option value="<?php echo $ligne['NUMACTION'];?>"><?php echo $ligne['NOMACTION'];?></option>
			<?php } ?>	
		</select>
	
	</form> 
 
 
<?php if (isset($_POST['list'])){ ?>
 
<table border ="2" bordercolor = "black">
<tr>
	<th>Nom Activit�</th>
	<th>Ajouter un participant</th>
	<th>Consulter</th>
	<th>Modifier l'activit�</th>
	<th>Suprimer l'activit�</th>
	<th>Imprimer</th>
	<th>Imprimer �tiquettes</th>
</tr>
 
<tr>
	<td><center><?php echo $action['NOMACTION']; ?></center></td>
	<td><center><a href="?uc=&action=&id=<?php echo $_POST['list'];?>"><img src="image/add-icon.png" width="32" height="32"/></a></center></td>
	<td><center><a href=" "><img src="image/	icone_consulter.png" width="32" height="32" /></a></center></td>
	<td><center><a href=" "><img src="image/modifier.png" width="32" height="32" /></a></center></td>
	<td><center><a href=" "><img src="image/delete-icon.png" width="32" height="32" /></a></center></td>
	<td><center><a href=" "><img src="image/logo_imprimante.png" width="32" height="32" /></a></center></td>
	<td><center><a href=" "><img src="image/etiquette-icone.png" width="32" height="32" /></a></center></td>
</tr>
</table>
</center>
<?php } ?>