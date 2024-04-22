<?php
include("../../fonction/fonction_nourriture.php");

$success=false;
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		 
		
		$data=array('id'=>$_POST['id'],
	                'qt'=>$_POST['qt'],
	                'ds'=>$_POST['ds'],
	                'pa'=>$_POST['pa']
	                

	);
		$success=insert($data);
	}
}

echo json_encode(array('success'=>$success));

