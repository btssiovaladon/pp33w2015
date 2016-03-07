<div id="contenu">
	<h3>Saisie cotisation annuelle</h3>
		<form method="POST" action="../index.php?uc=cotisation&action=validerMajMontantCotisation">
			<div class="">
			
				<fieldset>
					<label>Montant de la cotisation :</label>
					<input name="montant" id="montant" type="text"/>
				</fieldset>
				<div class="piedForm">
					<input id="ok" type="submit" value="Valider" />
					<input id="annuler" type="reset" value="Effacer" />
				</div>
			</div>
		</form>