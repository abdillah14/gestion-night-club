<?php 
require("../../fonction/fonction_vente_plat.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$res=delete_vente($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$success));