<?php
include("../../fonction/stock/stock_fonction.php");

$success=false;
$data=array();
  
if (isset($_POST['id'])) { 
	
		
		$data=array('id'=>$_POST['id'],
	              'pv'=>$_POST['pv'],
	              'pvs'=>$_POST['pvs'],
                  'pa'=>$_POST['pa'],
                  'qt'=>$_POST['qt']
                  
               

	);
		$success=update_up($data);
	}


echo json_encode(array('success'=>$success));

