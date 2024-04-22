<?php
include("../../fonction/fonction_chambre.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['ch_id'];
			$tab['nom']=$row['ch_nom'];
			
	   }
	} 
    echo json_encode($tab);
}