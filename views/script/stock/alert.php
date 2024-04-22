<?php 
require("../../fonction/stock/stock_fonction.php");

$success=false;
if (isset($_POST['id'])) {
	$id=$_POST['att'];
	$res=update_alert($id);
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$success));