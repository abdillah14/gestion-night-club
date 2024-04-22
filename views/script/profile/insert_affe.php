<?php
include("../../../config/dbConnect.php");
include("../../fonction/profile/profile_fonction.php");

$con=dbConnect();

 $id_pf= null;
 $id_pf=$_POST['id_p'];
 if ( $id_pf != null) {
   $success = false;
   $req = $con->prepare("SELECT pg_id FROM page ");
  $req->execute();
   $app = $req->fetchAll();
   foreach ($app as  $el) {
        $id = $el['pg_id'];
        if (isset($_POST['c'.$id])):
           $c=1;
       else:
          $c=0;
          endif; 
       if (isset($_POST['r'.$id])):
           $rd=1;
       else:
          $rd=0;
          endif; 
       if (isset($_POST['d'.$id])):
           $d=1;
       else:
          $d=0; 
          endif;   
       if (isset($_POST['u'.$id])):
           $u=1;
       else:
          $u=0;
          endif;    
        $verif_pf=getpermission($id_pf,$id);
       
        if(isset($verif_pf) and !empty($verif_pf)){
   
        $ki=$con->prepare("UPDATE  parametre SET c=?,r=?,u=?,d=?
                          where id_pf='$id_pf' and id_pg='$id' ");

        $success=(bool)$ki->execute(array($c,$rd,$u,$d));
       } 
       else{
        $ki=$con->prepare("INSERT INTO parametre SET c=?,r=?,u=?,d=?,id_pf=?,id_pg=?");
        $success=(bool)$ki->execute(array($c,$rd,$u,$d,$id_pf,$id));
      }
  
        
   }


 }

 echo json_encode(array('success'=>$success));
