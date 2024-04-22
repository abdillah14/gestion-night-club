<?php  
require("../../fonction/driver/driver_fonction.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update_driver($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['dr_id'];
			$tab['bs']=$row['id_bs'];
			$tab['nom']=$row['dr_nom'];
			$tab['prenom']=$row['dr_prenom'];
			$tab['adresse']=$row['dr_adresse'];
			$tab['numero']=$row['dr_tel'];
			$tab['sexe']=$row['dr_sexe'];
			$tab['photo']=$row['dr_photo'];
			$tab['photo1']="<img src='".$row['dr_photo']."' width='120px' class='img-responsive 
			               img-thumbnail' />";
			

		}
	} 
    echo json_encode($tab);
}