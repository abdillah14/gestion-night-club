<?php
include("../../fonction/fonction_affe.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['af_id'];
			$tab['nom']=$row['af_nom'];
			$tab['noms']=$row['id_j'];
	   }
	} 
    echo json_encode($tab);
}