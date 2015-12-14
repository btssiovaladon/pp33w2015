<table border=1>
<tr>
<td> ID Action </td>
<td> Nom Action </td>
<td> Suppression </td>
<td> Modification </td>
</tr>
<?php
 foreach  ($listeAction as $data) {
?>   
<tr>
<td> <?php echo $data['NUMACTION'] ?> </td>
<td> <?php echo $data['NOMACTION'] ?> </td>
<td> <a href="index.php?uc=SuppAction&action=suppr&id=<?php echo $data['NUMACTION'] ?>"/> Suppression </td>
<td> <a href="index.php?uc=SuppAction&action=modif&id=<?php echo $data['NUMACTION'] ?>"/> Modification </td>
<?php
    } 
?>