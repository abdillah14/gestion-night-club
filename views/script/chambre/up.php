<?php
include("../../fonction/fonction_chambre.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=up($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['cc_id'];
			$tab['nom']=$row['cc_nom'];
			$tab['px']=$row['cc_px'];
			$tab['ds']=$row['cc_details'];
			$tab['nm']=$row['cc_num'];
			$tab['tp']=$row['cc_type'];
			$tab['hr']=$row['cc_tmp'];
			
			
	   }
	} 
    echo json_encode($tab);
}