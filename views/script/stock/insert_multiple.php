<?php 
session_start();
include("../../../config/dbConnect.php");
 

if(isset($_POST["ds"]))
{
            $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $string=str_shuffle($string);
            $c=substr($string,0,5);
            $idd='S-'.$c;
              $iddd=$_SESSION["id"];
// function r_p($id){


//         $con=dbConnect();
       
//         $q=$con->prepare('SELECT  pr_q from stock where code_pr="'.$id.'" '); 
       
//         $q->execute();
//         $res=$q->fetch();

//        return $res;           
// }

 
 
 $item_ds = $_POST["ds"];
 $item_qt = $_POST["qt"];
 $item_pa = $_POST["pa"];
 $item_pv = $_POST["pv"];
 $item_qr = $_POST["qt"];
 $item_cd = $_POST["cd"];
 $item_fs = $_POST["fs"];
 $iddd =$_SESSION["id"];


   $success=false;
 $query = '';

 for($count = 0; $count<count($item_ds); $count++)
 {
  $item_ds_clean =$item_ds[$count];
  $item_qt_clean = $item_qt[$count];
  $item_pa_clean = $item_pa[$count];
  $item_pv_clean = $item_pv[$count];
  $item_cd_clean = $item_cd[$count];
  $item_qr_clean = $item_qr[$count];
   $item_fs_clean = $item_fs[$count];
   if ($item_qt_clean >= $item_qr_clean && $item_qr_clean > 0 && $item_qr_clean != '' ) {
     // code...
   
 if($item_ds_clean != '' && $item_qt_clean != '' && $item_qr_clean != '' && $item_cd_clean != '' &&  $item_pa_clean != '' && $item_pv_clean != '')
   {
     $con=dbConnect();
   $req=$con->prepare("insert into stock(code_pr,designation,prix_a,prix_v,pr_q,fournisseur,id_user) 

                      values(:code_pr,:designation,:prix_a,:prix_v,:pr_q,:fournisseur,:id_user)") ;
     $success=$req->execute(array(
                  
                  ':code_pr'=>$item_cd_clean,
                  ':designation'=>$item_ds_clean,
                  ':prix_a'=>$item_pa_clean,
                  ':prix_v'=>$item_pv_clean,
                  ':pr_q'=>$item_qt_clean,
                  ':fournisseur'=>$item_fs_clean,
                  ':id_user'=>$iddd
                  
                  )) ;

        

 }
 }
 }
 if($success)
 {
  
    
   echo 'Operation reussie';
  }
  else
  {
   echo 'saisisez bien vos donnees';
  }
 
 
}
?>
