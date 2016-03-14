<table border=1>
<tr>
<td> ID Action </td>
<td> Nom Action </td>
<td> Suppression </td>
<td> Modification </td>
</tr>
<?php
$resultat=$pdo->pdo_getAllAction();




while ($row=$resultat->fetch(PDO::FETCH_OBJ)) { 

?>   
<tr>
<td> <?php echo $row->NUMACTION;?> </td>
<td> <?php echo $row->NOMACTION;?> </td>
<td> <a href="index.php?uc=SuppAction&action=suppr&id=<?php echo $row->NUMACTION ;?>"/> Suppression </td>
<td> <a href="index.php?uc=SuppAction&action=modif&id=<?php echo $row->NUMACTION ;?>"/> Modification </td>
<?php
    } 
?>
</table>

<?php 

?>