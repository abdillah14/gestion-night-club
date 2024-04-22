<?php 
session_start();
include("../../../config/dbConnect.php");
$success=false;
 function up($px,$px2,$id){
        $con=dbConnect();
       
        $q=$con->prepare('UPDATE stock SET prix_v="'.$px.'",prix_vs="'.$px2.'" where pr_id="'.$id.'" '); 
       
       return $q->execute();
}  

 function up2($px,$px2,$id){
        $con=dbConnect();
       
        $q=$con->prepare('UPDATE stock_ SET prix_v="'.$px.'",prix_vs="'.$px2.'" where  pr_id="'.$id.'" '); 
       
       return $q->execute();
} 
function all_stock($cat){

    $con=dbConnect();

        $q=$con->query('SELECT * from stock where cat= "'.$cat.'" '); 

       return $q;
  }

if(isset($_POST["cd"]))
{

 $iddd=$_SESSION["id"];

 $cd = $_POST["cd"];
 $op = $_POST["op"];
 $att = $_POST["att"];
 
 $dp=all_stock($cd);
  while ($data=$dp->fetch()){ 
 $val = 0;
 $px = 0;
 $val1 = 0;
 $val3 = 0;
 $tot = 0;
 $tot1 = 0;

  $px=$att;
  $val=$px/100;
  $val1=$val*$data['prix_v']; 

  $val3=$val*$data['prix_vs']; 


 if ($op=='moins') {
   $tot=$data['prix_v']-$val1;
   $tot1=$data['prix_vs']-$val1;

   $res= up($tot,$tot1,$data['pr_id']);
         up2($tot,$tot1,$data['pr_id']);

 }
 else
    {
  
   $res=  up($data['prix_vv'],$data['prix_vvs'],$data['pr_id']);
          up2($data['prix_vv'],$data['prix_vvs'],$data['pr_id']);

 }


}
if (!empty($res)) {
    $success=true;
  }

 
 }
 echo json_encode(array('success'=>$success));
 
 

?>
