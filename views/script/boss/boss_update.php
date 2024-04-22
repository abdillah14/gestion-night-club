<?php  
require("../../fonction/boss/boss_fonction.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update_boss($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['bs_id'];
			$tab['nom']=$row['bs_nom'];
			$tab['prenom']=$row['bs_prenom'];
			$tab['adresse']=$row['bs_adresse'];
			$tab['numero']=$row['bs_tel'];
			$tab['sexe']=$row['bs_sexe'];
			$tab['photo']=$row['bs_photo'];
			$tab['photo1']="<img src='".$row['bs_photo']."' width='120px' class='img-responsive 
			               img-thumbnail' />";
			

		}
	} 
    echo json_encode($tab);
}