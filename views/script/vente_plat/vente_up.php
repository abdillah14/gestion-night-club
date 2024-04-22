 <?php  
require("../../fonction/fonction_vente_plat.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update_vente($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['p_id'];
			$tab['ds']=$row['p_nom'];
			$tab['pa']=$row['p_px'];

		}
	} 
    echo json_encode($tab);
}