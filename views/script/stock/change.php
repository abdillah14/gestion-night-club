<?php 
require("../../fonction/stock/stock_fonction.php");

$success=false;
if (isset($_POST['id'])) {
	$ch=$_POST['id'];
	$res=change();
	if (!empty($res)) {
		$success=true;
	}
}

echo json_encode(array('success'=>$success));