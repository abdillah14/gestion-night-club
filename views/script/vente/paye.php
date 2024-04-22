<?php 
require("../../fonction/vente/vente_fonction.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$res=paye($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$success));