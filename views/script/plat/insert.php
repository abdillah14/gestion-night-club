<?php
include("../../fonction/fonction_plat.php");

$success=false;
if (isset($_POST['operation'])) { 
	$op=$_POST['operation'];
	if ($op == 'add' || $op == 'edit' ) {
		  $image = '';
		     
			if(isset($_POST["photo"]) and !empty($_POST["photo"])) 
			{
				$data = $_POST["photo"];
				list($type, $data) = explode(';', $data);
				list(, $data)      = explode(',', $data);
				$data = base64_decode($data);
				$imageName = time().'.png';
				file_put_contents('/public_html/file/plat/'.$imageName, $data);
				$image ="file/plat/".$imageName;
				// unlink($var);
			}
			elseif($_POST["photo_hidden"] != '') 
		     {
			  $image = $_POST["photo_hidden"];
		     }
		     else {
			  $image ="file/plat/plat.jpg";
		     }
		
		$data=array('id'=>$_POST['id'],
	                'img'=>$image,
	                'ds'=>$_POST['ds'],
	                'pa'=>$_POST['pa']
	                

	);
		$success=insert($data);
	}
}

echo json_encode(array('success'=>$success));

