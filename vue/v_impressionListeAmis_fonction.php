<?php 
        ob_start(); 
   ?>
   
<page>
	<?php 
		include("v_listeAmis.php");
	?>
</page>

<?php
	$content = ob_get_clean();
	require_once('../html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','fr');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('listeAmis.pdf');
?>