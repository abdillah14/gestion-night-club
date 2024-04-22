<?php
include("../../fonction/fonction_piscine.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['p_id'];
			$tab['nom']=$row['p_nom'];
			$tab['px']=$row['p_px'];
	   }
	} 
    echo json_encode($tab);
}