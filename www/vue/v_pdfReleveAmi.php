<?php 
	ob_start();
?>
<?php 
	foreach( $amis as $unAmis){
		$id = $unAmis ['NUMAMIS'];
		$Visiteurs=$pdo->pdo_getMontant($id);
?>
<page>
<div>
	<p> Nom : <?php echo $unAmis ['NOMAMIS'].' '. $unAmis ['PRENOMAMIS'] ?></p>
	<p>Telephone fixe : <?php echo $unAmis ['TELEPHONEFIXEAMIS'] ?></p> 
	<p>Portable : <?php echo $unAmis ['TELEPHONEPORTAMIS'] ?></p>
	<p>Mail : <?php echo  $unAmis ['EMAILAMIS'] ?></p>
	<p>Adresse : <?php echo $unAmis ['ADRESSEAMIS'].' '.$unAmis ['CPAMIS'].' '.$unAmis ['VILLEAMIS']  ?> </p> 
	<p> Cotisation Annuelle : <?php echo $montantCotisationAnnuel ?> </p>
		<table border="1" >
			<tr>
				<td>Date</td>
				<td>Lieu</td>
				<td>Prix</td>
			</tr>
			<?php
				foreach ($Visiteurs as $unVisiteurS){
					$diner = $unVisiteurS ['DATEDINER'];
					$lieu = $unVisiteurS ['LIEUDINER'];
					$prix = $unVisiteurS ['montant'];
			?>
			<tr>
				<td><?php echo $diner?></td>
				<td><?php echo $lieu ?></td>
				<td><?php echo $prix ?></td>
			</tr>
			<?php
				}?>
		</table>		
</div>
</page>
<?php } ?>
<?php
	$content = ob_get_clean();
	require_once('html2pdf_v4.03/html2pdf.class.php');
	try{
		$html2pdf = new HTML2PDF('L','A4','fr');
		$html2pdf->WriteHTML($content);
		$html2pdf->Output('exemple.pdf');
	}catch(HTML2PDF_exception $e){
		die($e);
	}
?>