<div id="contenu">
	<h3>Sélection d'un participant</h3>
		<form method="POST" action="../index.php?uc=cotisation&action=choixParticipant">
			<div class="">
				<fieldset>
					<label>Participant :</label>
					<select name="choixamis" onchange="submit()">
						<option value="-1">Choisir</option>

						<?php
							foreach ($lesVisiteurs as $unVisiteur)
							{
								$id = $lesVisiteurs['NUMAMIS'];
								$nom = $unVisiteur['NOMAMIS'];
								$prenom = $unVisiteur['PRENOMAMIS'];
						?>
						<option value="<?php echo $id ?>">
						<?php echo  $prenom." ".$nom  ?></option>
						
						<?php
							}
						?>
						
					</select>
				</fieldset>
			</div>
		</form>
</div>