<?php 
require("../fonctions/fonction.php");
$success="faux";


if (isset($_POST['operation'])) {
  $op=$_POST['operation'];
  if ($op == 'add' || $op == 'edit' ) {
    
    $data=array('id'=>$_POST['id'],
                 'd'=>$_POST['d'],

  );
    $success=affe($data);
  }
}

echo json_encode(array('success'=>$success));

