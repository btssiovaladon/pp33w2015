<div>
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
					$prix = $unVisiteurS ['PRIXDINER'];
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