<?php
include("../../fonction/fonction_nourriture.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['n_id'];
			$tab['ds']=$row['n_nom'];
			$tab['qt']=$row['n_q'];
			$tab['pa']=$row['n_px'];
	   }
	} 
    echo json_encode($tab);
}