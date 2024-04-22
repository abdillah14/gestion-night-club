<?php 
require("../../fonction/user/user_fonction.php");
$success=false;

  
if (isset($_POST['operation'])) {                                                  
	$op=$_POST['operation'];              
	if ($op == 'add' || $op == 'edit' ) {
		     $image = '';
		     ///htdocs/file/user/    $var="C:/wamp64/www/stock/".$_POST["photo_hidden"];
			if(isset($_POST["photo"]) and !empty($_POST["photo"])) 
			{
				$data = $_POST["photo"];     
				list($type, $data) = explode(';', $data);
				list(, $data)      = explode(',', $data);
				$data = base64_decode($data);
				$imageName = time().'.png';
				file_put_contents('/public_html/file/user/'.$imageName, $data);
				$image ="file/user/".$imageName;
				// unlink($var);
			}
			elseif(isset($_POST["photo_hidden"]) and !empty($_POST["photo_hidden"])) 
		     {
			  $image = $_POST["photo_hidden"];
		     }
		     else {
			  $image ="file/user/img.png";
		     }
		
		$data=array('id'=>$_POST['id'],
	                'nom'=>$_POST['nom'],
	                'prenom'=>$_POST['prenom'],
	                'user'=>$_POST['user'],
	                'phone'=>$_POST['phone'],
	                'password'=>$_POST['password'],
	                'photo'=>$image,                                                                                                
                                            
	);
		$success=insert($data);
	}
}

echo json_encode(array('success'=>$success));

