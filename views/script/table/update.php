<?php
include("../../fonction/fonction_table.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['t_id'];
			$tab['nom']=$row['t_nom'];
	   }
	} 
    echo json_encode($tab);
}