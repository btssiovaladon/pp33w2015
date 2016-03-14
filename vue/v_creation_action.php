<h3>Ajouter une ACTION</h3>
<form method='POST' action='index.php?uc=creation_action&action=ajouter_action'>
<?php
include ('js/listeAutoComplet.php');
?>
<p>Commisssion : <select  name='selectCommissions'>
	  <?php
		foreach($lesCommisions as $uneCommisions){
			echo "<option value='$uneCommisions[NUMCOMMISIONS]'>$uneCommisions[NOMCOMMISSION]</option>";
		}
	  ?>
	  </select>
	  </p>

<p>Nom de l'action : <input type='text' name='NOMACTION'  size='30' maxlength='45'></p>

<p>Date de début: <input type='date' name='DATEDEBUT' size='30' maxlength='45'></p>

<p>Durée : <input type='text' name='DUREE' size='30' maxlength='45'></p>

<p>Fonds collectés : <input type='text' name='FONDS' size='30' maxlength='45'></p>

<input type='submit' value='Valider' name='valider'>

<input type='reset' value='Annuler' name='annuler'>

</form>