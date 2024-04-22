<?php
include("../../fonction/fonction_transport.php");
if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['tr_id'];
			$tab['nom']=$row['tr_nom'];
			$tab['tp']=$row['tr_tp'];
			$tab['nb']=$row['tr_nb'];
			$tab['pl']=$row['tr_num'];
			$tab['px']=$row['tr_px'];
	   }
	} 
    echo json_encode($tab);
}