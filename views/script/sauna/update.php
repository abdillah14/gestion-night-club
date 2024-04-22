<?php
include("../../fonction/fonction_sauna.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['sa_id'];
			$tab['nom']=$row['sa_nom'];
			$tab['px']=$row['sa_px'];
	   }
	} 
    echo json_encode($tab);
}