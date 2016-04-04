<h1>Liste des participants a l'activité</h1>
<table>
	<tr>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Rôle</th>
	</tr>
	<tr>
		<td><?php echo utf8_decode($chef['NOMAMIS']); ?></td>
		<td><?php echo utf8_decode($chef['PRENOMAMIS']); ?></td>
		<td>Chef</td>
	</tr>
	<?php 
	foreach ($listeParticipant as $par){
		?>
		<tr>
			<td><?php echo utf8_decode($par['NOMAMIS']); ?></td>
			<td><?php echo utf8_decode($par['PRENOMAMIS']); ?></td>
			<td>Participant</td>
		</tr>
		<?php
	}
	
	?>
</table>
<h1>Liste des amis</h1>
<form method='post' action='index.php?uc=ajoutParticipant&action=Ajouter&id=<?php echo $_GET['id']?>'>
	<input type='hidden' name='numAction' value='<?php echo $_GET['id']?>'></input>
	<p>
		<?php 
		include 'vue/inc_AutoComplet.php';
		?>
	</p>
	<input type="submit" name="ajouter" value="Ajouter"></input>
</form>