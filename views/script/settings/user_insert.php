<?php
include("../../fonction/user/user_fonction.php");

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
				file_put_contents('C:/wamp64/www/sec/file/user/'.$imageName, $data);
				$image ="file/user/".$imageName;
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
	                'user'=>$_POST['user'],
	                'phone'=>$_POST['phone'],
	                'password'=>$_POST['password'],
	                'poste'=>$_POST['poste'],
	                'sexe'=>$_POST['sexe'],
	                'pf'=>$_POST['pf'],
	                'pa'=>$_POST['pa'],
	                'photo'=>$image,

	);
		$success=insert_user($data);
	}
}

echo json_encode(array('success'=>$success));

