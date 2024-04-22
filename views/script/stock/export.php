<?php 
session_start();
include("../../../config/dbConnect.php");
 
// $Row['Data'] ??= 'default value';
// return $Row['Data'];

function all_verif($id){
    

    $con=dbConnect();

        $q=$con->query('SELECT * from stock where pr_id="'.$id.'" '); 
        return $q;
  } 
function all_stock($id){   
        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from stock_ where pr_id="'.$id.'" '); 
        $q->execute();
        $res=$q->fetch();
        return $res;}
function all_stock2($id){   
        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from stock where pr_id="'.$id.'" '); 
        $q->execute();
        $res=$q->fetch();
        return $res;}        
function change_stock($id,$tot){
        $con=dbConnect();
        $q=$con->prepare('UPDATE stock_ SET pr_q="'.$tot.'" where pr_id="'.$id.'" '); 
        return $q->execute();
                
}        

if(isset($_POST["id"]))
{
$data=all_stock($_POST['id']);
$q=false;

 $item_ds = $data["designation"];

 $item_pa = $data["prix_a"];
 $item_pv = $data["prix_v"];
 $item_pvs = $data["prix_vs"];

 $item_fs = $data["fournisseur"];
 $code = $data["code_pr"];
 $alt = $data["alert"];
 $pr = $data["pr_id"];
 $cat = $data["cat"];
 $iddd =$_SESSION["id"];
 $qr = $_POST["att"];
 $qt =  $data["pr_q"];
 
 $q =   $data["pr_q"];
 $tot =  0;
 $tot1 =  0;
 $tot =  $qt-$qr;

 $success=false;
 $query = '';


   if ($tot >= 0 ) {
     $con=dbConnect();
    $vr=all_verif($_POST['id']);
    $count = $vr->rowCount();
    if ($count) {
      $vr2=all_stock2($_POST['id']);
      $vq=$vr2["pr_q"];
      $tot1 = $vq+$qr;
      $etat = 'bar';
      $req=$con->prepare("UPDATE stock SET prix_a=:prix_a,prix_v=:prix_v,fournisseur=:fournisseur,
                         cat=:cat,id_user=:id_user,pr_q=:pr_q,designation=:designation,code_pr=:code_pr,
                         prix_vv=:prix_vv,prix_vs=:prix_vs,prix_vvs=:prix_vvs,prix_x=:prix_x,etat=:etat    
                         WHERE pr_id=:pr_id ");

            $success=$req->execute(array(
                  ':pr_id'=>$pr,
                  ':prix_a'=>$item_pa,
                  ':prix_v'=>$item_pv,
                  ':fournisseur'=>$item_fs,
                  ':cat'=>$cat,
                  ':id_user'=>$iddd,
                  ':pr_q'=>$tot1,
                 ':designation'=>$item_ds,
                 ':code_pr'=>$code,
                 ':prix_vv'=>$item_pv,
                 ':prix_vs'=>$item_pvs,
                 ':prix_vvs'=>$item_pvs,
                 ':prix_x'=>$item_pv,
                 ':etat'=>$etat
                              
                  )) ;

 $rt=$con->prepare("insert into produit(                       
                               pr_id,fournisseur,designation,pr_q,prix_v,
                               prix_a,code_pr,cat) 
                              values(:pr_id,:fournisseur,:designation,:pr_q,:prix_v,:prix_a,:code_pr,:cat)") ;

              $suc=$rt->execute(array(
                 ':pr_id'=>$pr,
                 ':fournisseur'=>$item_fs,
                  ':designation'=>$item_ds,
                  ':pr_q'=>$qr,
                  ':prix_v'=>$item_pv,
                  ':prix_a'=>$item_pa,
                  ':code_pr'=>$code,
                  ':cat'=>$cat
                  
                 
                )) ;







    }
   else
    {
     $req=$con->prepare("insert into stock(pr_id,code_pr,designation,prix_a,prix_v,pr_q,fournisseur,id_user,cat,prix_vv,prix_vs,prix_vvs,prix_x) 

                      values(:pr_id,:code_pr,:designation,:prix_a,:prix_v,:pr_q,:fournisseur,:id_user,:cat,:prix_vv,:prix_vs,:prix_vvs,:prix_x)") ;
     $success=$req->execute(array(
                  ':pr_id'=>$pr,
                  ':code_pr'=>$code,
                  ':designation'=>$item_ds,
                  ':prix_a'=>$item_pa,
                  ':prix_v'=>$item_pv,
                  ':pr_q'=>$qr,
                  ':fournisseur'=>$item_fs,
                  ':id_user'=>$iddd,
                  ':cat'=>$cat,
                  ':prix_vv'=>$item_pv,
                  ':prix_vs'=>$item_pvs,
                  ':prix_vvs'=>$item_pvs,
                  ':prix_x'=>$item_pv,
                  )) ;


  $rt=$con->prepare("insert into produit(                       
                              pr_id,fournisseur,designation,pr_q,prix_v,
                               prix_a,code_pr,cat) 
                               values(:pr_id,:fournisseur,:designation,:pr_q,:prix_v,:prix_a,:code_pr,:cat)") ;

              $suc=$rt->execute(array(
                  ':pr_id'=>$pr,
                  ':fournisseur'=>$item_fs,
                  ':designation'=>$item_ds,
                  ':pr_q'=>$qr,
                  ':prix_v'=>$item_pv,
                  ':prix_a'=>$item_pa,
                  ':code_pr'=>$code,
                  ':cat'=>$cat
                  
                 
                )) ;

    }
   
        

 }


 if($success)
 {
  
    
   change_stock($_POST['id'],$tot);
   echo json_encode(array('success'=>$success));
  }
  else
  {
   echo 'saisisez bien vos donnees';
  }
 
 
}
?>
