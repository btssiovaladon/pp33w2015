<?php

//include(style/style_etiquette.css);

   ob_start(); 
   
$write = "";


/*$write = " <style> table{width:100%; height:100%; border:0px;  } 
					td {width:300px;}
			</style>";

/*
$write .= "<body style='text-align:center;'>";

$write .= "<h2 style='text-decoration:underline;'>Participants:</h2>";
*/

/*
	$write .= "<tr>";
		
		$write .= "<td class='id'>Nom</td>";
		$write .= "<td class='id'>Prenom</td>";
		$write .= "<td class='id'>Adresse</td>";
		$write .= "<td class='id'>Code postal</td>";
		$write .= "<td class='id'>Ville</td>";
	$write .= "</tr>";
	
}*/

$LF="<br>";
$write = " <style> table{width:800px; height:100%; border:0px;  } 
					td {width:200px;height:100px;margin-top=10px}
			</style>";

$write .= "<table style=''>";

for($pi=0;$pi<count($lesParticipants);$pi++){
	
	$write .= "<tr>";
	for($col=0;$col<3;$col++){
			$p=$lesParticipants[$pi];
			
			$write .= "<td>"
			.$p["NOMAMIS"]." ".$p["PRENOMAMIS"].$LF;
			$write .= $p["ADRESSEAMIS"].$LF;
			$write .= $p["CPAMIS"]." ".$p["VILLEAMIS"].$LF;
			$write .="</td>";
		
			$pi++;
			if($pi>=count($lesParticipants)) break;
	}
	$pi--; //recalage indice amis
	
	$write .= "</tr>";
}
$write .= "</table>";

//echo $write;

	echo utf8_encode($write);
	$content = ob_get_clean(); 
    require_once("./include".'/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('etiquette_particpants.pdf');
?>
