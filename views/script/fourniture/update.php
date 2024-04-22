<?php
include("../../fonction/fonction_fourniture.php");
if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['f_id'];
			$tab['ds']=$row['f_nom'];
			$tab['qt']=$row['f_q'];
			$tab['pa']=$row['f_px'];
	   }
	} 
    echo json_encode($tab);
}