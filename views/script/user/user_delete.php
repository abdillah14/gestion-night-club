<?php 
require("../../fonction/user/user_fonction.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$res=delete_user($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$id));