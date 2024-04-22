<?php  
require("../../fonction/profile/profile_fonction.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update_profile($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['pf_id'];
			$tab['nom']=$row['pf_nom'];
	   }
	} 
    echo json_encode($tab);
}