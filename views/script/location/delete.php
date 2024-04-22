<?php
include("../../fonction/fonction_location.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$res=delete($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$id));