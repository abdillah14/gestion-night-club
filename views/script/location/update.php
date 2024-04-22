<?php
include("../../fonction/fonction_location.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['l_id'];
			$tab['nom']=$row['l_nom'];
			$tab['px']=$row['l_px'];
			$tab['den']=$row['date_end'];
			$tab['din']=$row['date_in'];
			$tab['px']=$row['l_px'];
			$tab['tp']=$row['l_type'];
			$tab['dt']=$row['l_details'];
		
	   }
	} 
    echo json_encode($tab);
}