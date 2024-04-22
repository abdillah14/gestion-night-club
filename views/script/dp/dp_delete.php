<?php 
require("../../fonction/dp/dp_fonction.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$res=delete_dp($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$id));