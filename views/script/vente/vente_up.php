 <?php  
require("../../fonction/vente/vente_fonction.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update_vente($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['pr_id'];
			$tab['cd']=$row['code_pr'];
			$tab['ds']=$row['designation'];
			$tab['fs']=$row['fournisseur'];
			$tab['pa']=$row['prix_a'];
			$tab['pv']=$row['prix_v'];
			$tab['qt']=$row['pr_q'];
			
			

		}
	} 
    echo json_encode($tab);
}