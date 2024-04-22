<?php
include("../../fonction/dp/dp_fonction.php");

$success=false;

  
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		     
		
		$data=array('id'=>$_POST['id'],
	                'ds'=>$_POST['ds'],
	                'mt'=>$_POST['mt'],
	                

	);
		$success=insert_dp($data);
	}
}

echo json_encode(array('success'=>$success));

