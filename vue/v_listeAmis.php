<form method='POST' action='index.php'>
<table class="listeAmis">
  	  
             <tr>
                <th >Nom</th>
                <th >Prenom</th>
                <th >Telephone fixe</th>  
				<th >Telephone portable</th>
                <th >Email</th>
                <th >Numero rue</th>
				<th >Rue</th>
                <th >Ville</th>
                <th >Code postale</th> 
				<th >date entree dans le club</th>
				<th >Modifier </th>
				<th >Supprimer</th>
             </tr>
        <?php      
          foreach ( $listeAmis as $unAmis ) 
		  {
			$nom = $unAmis['NOMAMIS'];
			$prenom = $unAmis['PRENOMAMIS'];
			$tel_fix = $unAmis['TELEPHONEFIXEAMIS'];
			$tel = $unAmis['TELEPHONEPORTAMIS'];
			$email = $unAmis['EMAILAMIS'];
			$rue = $unAmis['NUMRUEAMIS'];
			$adresse = $unAmis['ADRESSEAMIS'];
			$ville = $unAmis['VILLEAMIS'];
			$cp = $unAmis['CPAMIS'];
			$date_entree_club = $unAmis['DATEENTRECLUBAMIS'];
		?>
             <tr>
                <td><?php echo $nom ?></td>
                <td><?php echo $prenom ?></td>
                <td><?php echo $tel_fix?></td>
				<td><?php echo $tel ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $rue ?></td>
				<td><?php echo $adresse ?></td>
                <td><?php echo $ville ?></td>
                <td><?php echo $cp ?></td>
				<td><?php echo $date_entree_club ?></td>
				<td><a href="index.php?
					&NUMAMIS=<?php echo $NUMAMIS;?>">
					<img src="images/modif.png" width="30" height="30"/></a></td>
				<td><a href="index.php?
					&NUMAMIS=<?php echo $NUMAMIS;?>">
					<img src="images/supp.png" width="30" height="30"/></a></td>
            
             </tr>
        <?php 
          }
		?>
    </table>
</form>
