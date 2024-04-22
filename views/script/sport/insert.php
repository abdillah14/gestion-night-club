<?php
include("../../fonction/fonction_sport.php");

$success=false;
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		 
		
		$data=array('id'=>$_POST['id'],
	                'px'=>$_POST['px'],
	                'nom'=>$_POST['nom'],
	                'nb'=>$_POST['nb']
	                

	);
		$success=insert($data);
	}
}

echo json_encode(array('success'=>$success));

