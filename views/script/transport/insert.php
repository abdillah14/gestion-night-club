<?php
include("../../fonction/fonction_transport.php");


$success=false;
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		 
		
		$data=array('id'=>$_POST['id'],
	                'nom'=>$_POST['nom'],
	                'px'=>$_POST['px'],
	                'tp'=>$_POST['tp'],
	                'pl'=>$_POST['pl'],
	                'nb'=>$_POST['nb']
	                

	);
		$success=insert($data);
	}
}

echo json_encode(array('success'=>$success));

