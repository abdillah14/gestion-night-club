<?php 
require("../../fonction/profile/profile_fonction.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$res=delete_profile($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$id));