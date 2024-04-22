<?php
include("../../fonction/fonction_jeu.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['j_id'];
			$tab['nom']=$row['j_nom'];
			$tab['px']=$row['j_px'];
	   }
	} 
    echo json_encode($tab);
}