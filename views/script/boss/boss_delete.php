<?php 
require("../../fonction/boss/boss_fonction.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$res=delete_boss($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$id));