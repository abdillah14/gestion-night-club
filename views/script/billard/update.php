<?php
include("../../fonction/fonction_billard.php");
if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['b_id'];
			$tab['nom']=$row['b_nom'];
			$tab['nb']=$row['b_nb'];
			$tab['px']=$row['b_px'];
	   }
	} 
    echo json_encode($tab);
}