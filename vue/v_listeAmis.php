<form method='POST' action='index.php?uc=liste_Amis&action=listeAmis'>
<?php
//if(isset($_GET['action']) && ($_GET['action']="suppression"))

?>
<table>
  	  
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
		
          foreach ( $lesAmis as $unAmis ) 
		  {
	     //tant qu'il y a un amis, on affiche la variable "lesAmis"
	     
			$num= $unAmis['NUMAMIS'];
			$nom = $unAmis['NOMAMIS'];
			$prenom = $unAmis['PRENOMAMIS'];
			$tel_fix = $unAmis['TELEPHONEFIXEAMIS'];
			$tel = $unAmis['TELEPHONEPORTAMIS'];
			$email = $unAmis['EMAILAMIS'];
			$rue = $unAmis['NUMRUEAMIS'];
			$adresse = $unAmis['ADRESSEAMIS'];
			$ville = $unAmis['VILLEAMIS'];
			$cp = $unAmis['CPAMIS'];
			$date_entree_club = $unAmis['DATEENTREECLUBAMIS'];
	
		?>
             <tr>
			  <td><?php echo $nom ?></td>
			  <td><?php echo $prenom ?></td>
			  <td><?php echo $tel_fix ?></td>
			  <td><?php echo $tel ?></td>
			  <td><?php echo $email ?></td>
			  <td><?php echo $rue ?></td>
			  <td><?php echo $adresse ?></td>
			  <td><?php echo $ville ?></td>
			  <td><?php echo $cp ?></td>
			  <td><?php echo $date_entree_club ?></td>
			  <td><a href="index.php?uc=liste_Amis&NUMAMIS=<?php echo $num;?>&NOMAMIS=<?php echo $nom; ?>
								 & PRENOMAMIS=<?php echo $prenom; ?>
								 & TELEPHONEFIXEAMIS=<?php echo $tel_fix; ?>
								 & TELEPHONEPORTAMIS=<?php echo $tel; ?>
								 & EMAILAMIS=<?php echo $email; ?>
								 & NUMRUEAMIS=<?php echo $rue; ?>
								 & ADRESSEAMIS=<?php echo $adresse; ?>
								 & VILLEAMIS=<?php echo $ville; ?>
								 & CPAMIS=<?php echo $cp; ?>
								 & DATEENTREECLUBAMIS=<?php echo $date_entree_club; ?>
								 
								 
									      &action=informations"><img src="images/modif.png" width="30" height="30"/></a></td>
			  <td> <a onclick="return(confirm('Etes vous sur de vouloir supprimer cette personne ?'))" href="index.php?uc=liste_Amis&NUMAMIS=<?php echo $num;?>&action=suppression"> Suprimer </a> </td> 
			 
             </tr>
        <?php 
          }
	  //dès qu'il n'y a plus d'amis, on ferme la variable lesAmis 
		?>
    </table>
</form>
