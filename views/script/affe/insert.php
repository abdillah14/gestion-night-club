<?php
include("../../fonction/fonction_affe.php");

$success=false;
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		 
		
		$data=array('id'=>$_POST['id'],
	                'nom'=>$_POST['nom'],
	                'noms'=>$_POST['noms'],
	                

	);
		$success=insert($data);
	}
}

echo json_encode(array('success'=>$success));

