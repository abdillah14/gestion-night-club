<?php  
require("../../fonction/user/user_fonction.php");

if (isset($_POST['id'])) {

	$idd=$_POST['id'];
	$res=update_user($idd);
	$tab=array();
	if (count($res)>0) {
		foreach ($res as $row) {
			$tab['id']=$row['user_id'];
			$tab['nom']=$row['user_nom'];
			$tab['prenom']=$row['user_prenom'];
			$tab['poste']=$row['user_poste'];
			$tab['user']=$row['username'];
			$tab['numero']=$row['user_tel'];
			$tab['sexe']=$row['user_sexe'];
			$tab['photo']=$row['user_photo'];
			$tab['pf']=$row['id_pf'];
			$tab['password']=$row['password'];
			$tab['pa']=$row['pass'];

		}
	} 
    echo json_encode($tab);
}