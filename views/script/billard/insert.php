<?php
include("../../fonction/fonction_billard.php");

$success=false;
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		 
		
		$data=array('id'=>$_POST['id'],
	                'nb'=>$_POST['nb'],
	                'nom'=>$_POST['nom'],
	                'px'=>$_POST['px']
	                

	);
		$success=insert($data);
	}
}

echo json_encode(array('success'=>$success));
