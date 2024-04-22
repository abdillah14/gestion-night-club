<?php 
require("../../fonction/page/page_fonction.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$res=delete_page($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$id));