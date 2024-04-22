<?php 
session_start();
include("../../../config/dbConnect.php");
 

if(isset($_POST["item_ds"]))
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

$nom = $_POST["nom"]; 
$item_ds = $_POST["item_ds"];
 $item_qt = $_POST["item_qt"];
 $tb = $_POST["tb"];
 $item_pv = $_POST["item_pv"];
 $item_pr = $_POST["item_pr"];
 $code = $_POST["id"];
 $success=false;
 $query = '';
 $stat = 'imprimer';
 for($count = 0; $count<count($item_ds); $count++)
 {
  $item_ds_clean =$item_ds[$count];
  $item_qt_clean = $item_qt[$count];
  $item_pv_clean = $item_pv[$count];
  $item_pr_clean = $item_pr[$count];
   if ($item_qt_clean > 0) {
     // code...
   
  // if($item_ds_clean != '' && $item_qt_clean != '' && $item_qr_clean != '' && $item_cd_clean != '' &&  $item_pa_clean != '' && $item_pv_clean != '')
  // {
     $con=dbConnect();
   $req=$con->prepare("insert into vente_plat(id_s,v_code,id_t,v_statut,v_q,v_px,id_user,nom) 

                      values(:id_s,:v_code,:id_t,:v_statut,:v_q,:v_px,:id_user,:nom)") ;
     $success=$req->execute(array(
                  ':id_s'=>$item_pr_clean,
                  ':v_code'=>$code,
                  ':id_t'=>$tb,
                  ':v_statut'=>$stat,
                  ':v_q'=>$item_qt_clean,
                  ':v_px'=>$item_pv_clean,
                  ':id_user'=>$iddd,
                  ':nom'=>$nom
                   )) ;

          

  // }
 }
 }
 if($success)
 {
  
    
   echo $success;
  }
  else
  {
   echo 'saisisez bien vos donnes';
  }
 
 
}
?>
