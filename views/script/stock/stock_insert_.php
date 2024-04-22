<?php
include("../../fonction/stock/stock_fonction.php");

$success=true;
$data=array();
  
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		
		$data=array('id'=>$_POST['id'],
	              'ds'=>$_POST['ds'],
                  'fs'=>$_POST['fs'],
                  'pv'=>$_POST['pv'],
                  'pvs'=>$_POST['pvs'],
                  'pa'=>$_POST['pa'],
                  'qt'=>$_POST['qt'],
                  'cd'=>$_POST['cd']
               

	);
		$success=update_stock4($data);
	}
}

echo json_encode(array('success'=>$success));

