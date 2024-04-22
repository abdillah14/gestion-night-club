<?php
include("../../fonction/fonction_chambre.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$res=sup($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$id));