<?php
include("../../fonction/fonction_sport.php");
if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['sp_id'];
			$tab['nom']=$row['sp_nom'];
			$tab['nb']=$row['sp_nb'];
			$tab['px']=$row['sp_px'];
	   }
	} 
    echo json_encode($tab);
}