<?php  
require("../../fonction/stock/stock_fonction.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update_stock($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['pr_id'];
			$tab['ds']=$row['designation'];
			$tab['fs']=$row['fournisseur'];
			$tab['pa']=$row['prix_a'];
			$tab['pv']=$row['prix_v'];
			$tab['pvs']=$row['prix_vs'];
			$tab['qt']=$row['pr_q'];
			$tab['cd']=$row['cat'];
			
			

		}
	} 
    echo json_encode($tab);
}