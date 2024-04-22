<?php
include("../../fonction/fonction_location.php");

$success=false;
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		 
		
		$data=array('id'=>$_POST['id'],
	                'nom'=>$_POST['nom'],
	                'px'=>$_POST['px'],
	                'din'=>$_POST['din'],
	                'den'=>$_POST['den'],
	                'dt'=>$_POST['dt'],
	                'tp'=>$_POST['tp'],
	                

	);
		$success=insert($data);
	}
}

echo json_encode(array('success'=>$success));

