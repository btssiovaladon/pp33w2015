<?php
function convdate ($dates)
{
$nombres = explode('/',$dates);
	$jour = $nombres[0]; 
	$mois = $nombres[1]; 
	$an =  $nombres[2] ;
	$dat = $an .'-'.$mois.'-'.$jour;
	return($dat);
}
function invdate ($dates)
{
if ($dates=='0000-00-00')
	{
	$dates = "";
	}
else
	{
	$nombres = explode('-',$dates);
	$jour = $nombres[2]; 
	$mois = $nombres[1]; 
	$an =  $nombres[0] ;
	$dat = $jour.'/'.$mois.'/'.$an;
	return($dat);
	}
}
