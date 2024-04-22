<?php 
require("../../fonction/driver/driver_fonction.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$res=delete_driver($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$id));