<?php
include("../../fonction/fonction_jeu.php");

$success=false;
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		 
		
		$data=array('id'=>$_POST['id'],
	                'nom'=>$_POST['nom'],
	                'px'=>$_POST['px'],
	                

	);
		$success=insert($data);
	}
}

echo json_encode(array('success'=>$success));

