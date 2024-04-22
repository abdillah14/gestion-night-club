<?php
include("../../fonction/fonction_table.php");

$success=false;
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		 
		
		$data=array('id'=>$_POST['id'],
	                'nom'=>$_POST['nom'],
	                

	);
		$success=insert($data);
	}
}

echo json_encode(array('success'=>$success));

