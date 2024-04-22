<?php
include("../../fonction/fonction_chambre.php");

$success=false;
if (isset($_POST['id'])) { 
	
		$data=array('id'=>$_POST['id'],
	                'nom'=>$_POST['nom'],
	                'ds'=>$_POST['ds'],
	                'nm'=>$_POST['nm'],
	                'px'=>$_POST['px'],
	                'tp'=>$_POST['tp'],
	                'hr'=>$_POST['hr']
	);
		$success=up_($data);
	
}
echo json_encode(array('success'=>$success));

