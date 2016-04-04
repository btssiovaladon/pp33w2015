<h3>Modifier un AMIS</h3>
<form method='POST' action='index.php?uc=liste_Amis&action=modification'>
<input type= 'hidden' name='NUMAMIS' value='<?php echo $num; ?>'>
<p>Nom : <input type='text' name='NOMAMIS'  size='30' maxlength='45' value='<?php echo $nom; ?>' ></p>

<p>Prénom : <input type='text' name='PRENOMAMIS' size='30' maxlength='45' value='<?php echo $prenom; ?>' ></p>

<p>Téléphone fixe : <input type='text' name='TELEPHONEFIXEAMIS'  size='10' maxlength='45' value='<?php echo $tel_fix; ?>'></p>

<p>Téléphone portable : <input type='text' name='TELEPHONEPORTAMIS' size='30' maxlength='45' value='<?php echo $tel; ?>'></p>

<p>E-mail : <input type='text' name='EMAILAMIS' size='30' maxlength='45' value='<?php echo $email; ?>'></p>

<p>Numéro de rue : <input type='text' name='NUMRUEAMIS' size='30' maxlength='45' value='<?php echo $rue; ?>'></p>

<p>Rue : <input type='text' name='ADRESSEAMIS' size='30' maxlength='45' value='<?php echo $adresse; ?>'></p>

<p>Ville : <input type='text' name='VILLEAMIS' size='30' maxlength='45' value='<?php echo $ville; ?>'></p>

<p>Code postal : <input type='text' name='CPAMIS' size='30' maxlength='45' value='<?php echo $cp; ?>'></p>

<p>Date entrée dans le club : <input type='date' name='DATEENTREECLUBAMIS' value='<?php echo $date_entree_club; ?>'></p>

<input type='submit' value='Valider' name='valider' >

<input type='reset' value='Annuler' name='annuler' >

</form>
