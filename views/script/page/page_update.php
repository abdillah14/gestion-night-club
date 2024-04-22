<?php  
require("../../fonction/page/page_fonction.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update_page($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['pg_id'];
			$tab['nom']=$row['pg_nom'];
	   }
	} 
    echo json_encode($tab);
}