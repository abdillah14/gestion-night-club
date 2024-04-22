<?php
include("../../fonction/driver/driver_fonction.php");

$success=false;

  
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		     $image = '';
		     $var="C:/wamp64/www/sec/".$_POST["photo_hidden"];
			if(isset($_POST["photo"]) and !empty($_POST["photo"])) 
			{
				$data = $_POST["photo"];
				list($type, $data) = explode(';', $data);
				list(, $data)      = explode(',', $data);
				$data = base64_decode($data);
				$imageName = time().'.png';
				file_put_contents('C:/wamp64/www/sec/file/driver/'.$imageName, $data);
				$image ="file/driver/".$imageName;
				// unlink($var);
			}
			elseif($_POST["photo_hidden"] != '') 
		      {
			  $image = $_POST["photo_hidden"];
		     }
		     else {
			  $image ="img.png";
		     }
		
		$data=array('id'=>$_POST['id'],
	                'nom'=>$_POST['nom'],
	                'prenom'=>$_POST['prenom'],
	                'adresse'=>$_POST['adresse'],
	                'phone'=>$_POST['phone'],
	                'sexe'=>$_POST['sexe'],
	                'bs'=>$_POST['bs'],
	                'photo'=>$image,

	);
		$success=insert_driver($data);
	}
}

echo json_encode(array('success'=>$success));

