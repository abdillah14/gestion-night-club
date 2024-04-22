<?php  
require("../../fonction/dp/dp_fonction.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update_dp($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['id'];
			$tab['ds']=$row['detail'];
			$tab['mt']=$row['montant'];
			

		}
	} 
    echo json_encode($tab);
}