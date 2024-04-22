<?php   
session_start();
include("../../../config/dbConnect.php");

 function all_stock($id){   
        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from stock_ where pr_id="'.$id.'" '); 
        $q->execute();
        $res=$q->fetch();
        return $res;}
function all_stock4(){

    $con=dbConnect();
    $q=$con->query('SELECT * from stock where statut= "actif" '); 
    return $q;
    }
 function update_up($data){ 
      $con=dbConnect();
      $rp=all_stock($data['id']);
        
       $pa=$rp['prix_a'];
       $pv=$rp['prix_v'];
       $pvs=$rp['prix_vs'];
       $qt=$rp['pr_q'];
       $fs=$rp['fournisseur'];
       $ds=$rp['designation'];
       $code=$rp['code_pr'];
       $paa=$data['pa'];
       $pvv=$data['pv'];
       $pvvs=$data['pvs'];
       $cat=$rp['cat'];
       $qtt=$data['qt']+  $qt;

        if (empty(($data['pa']))) {
             $paa= $pa;
         } 
         if (empty(($data['pv']))) {
             $pvv= $pv;
         }
         if  (empty(($data['qt']))) {
            $qtt=$qt;
         }
         if  (empty(($data['qt']))) {
            $qtt=$qt;
         }
         if  (empty(($data['pvs']))) {
            $pvvs=$pvs;
         }
           
      if (!empty($data['pa']) or !empty($data['pv'])  or !empty($data['qt']) ) {



         $req=$con->prepare("UPDATE stock_ SET pr_q=:pr_q,prix_v=:prix_v,
                                prix_a=:prix_a,prix_vs=:prix_vs
                               WHERE pr_id=:pr_id ");


               $success=$req->execute(array(
                  ':pr_id'=>$data['id'],
                  ':pr_q'=>$qtt,
                  ':prix_v'=>$pvv,
                  ':prix_a'=>$paa,
                  ':prix_vs'=>$pvvs
                  
                   )) ;

               $ett="Modifier";
               $rt=$con->prepare("insert into entree(                       
                               fournisseur,designation,pr_q,prix_v,
                               prix_a,code_pr,etat,cat) 
                              values(:fournisseur,:designation,:pr_q,:prix_v,:prix_a,:code_pr,:etat,:cat)") ;

              $suc=$rt->execute(array(
                 ':fournisseur'=>$fs,
                  ':designation'=>$ds,
                  ':pr_q'=>$qtt,
                  ':prix_v'=>$pvv,
                  ':prix_a'=>$paa,
                  ':code_pr'=>$code,
                  ':etat'=>$ett,
                  ':cat'=>$cat
                  
                 
                )) ;

     }

        
 
  }







  
  function r_p($id){
       $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from stock_ where pr_id="'.$id.'" '); 
        $q->execute();
        $res=$q->fetch();
        return $res;           
}
 function insert_stock($data){   

            $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $string=str_shuffle($string);
            $c=substr($string,0,7);
            $idd='BS-'.$c;
            $iddd=$_SESSION["id"];
            
       $con=dbConnect();
       $success=true;
        if(count($data)>0) {
           
         if($data['id'] > 0){

            $rpp=r_p($data['id']);
            $code=$rpp['code_pr'];

              
            
             $req=$con->prepare("UPDATE stock_ SET fournisseur=:fournisseur,
                                designation=:designation,pr_q=:pr_q,prix_v=:prix_v,
                                prix_a=:prix_a,id_user=:id_user,cat=:cat,prix_vv=:prix_vv,prix_vs=:prix_vs,prix_vvs=:prix_vvs
                               WHERE pr_id=:pr_id ");


               $success=$req->execute(array(
                  ':pr_id'=>$data['id'],
                  ':fournisseur'=>$data['fs'],
                  ':designation'=>$data['ds'],
                  ':pr_q'=>$data['qt'],
                  ':prix_v'=>$data['pv'],
                  ':prix_a'=>$data['pa'],
                  ':id_user'=>$iddd,
                  ':cat'=>$data['cd'],
                  ':prix_vv'=>$data['pv'],
                  ':prix_vs'=>$data['pvs'],
                  ':prix_vvs'=>$data['pvs']

                 
                  
                   )) ;

               $ett="Modifier";
               $rt=$con->prepare("insert into entree(                       
                               fournisseur,designation,pr_q,prix_v,
                               prix_a,code_pr,etat,cat) 
                              values(:fournisseur,:designation,:pr_q,:prix_v,:prix_a,:code_pr,:etat,:cat)") ;

              $suc=$rt->execute(array(
                 ':fournisseur'=>$data['fs'],
                  ':designation'=>$data['ds'],
                  ':pr_q'=>$data['qt'],
                  ':prix_v'=>$data['pv'],
                  ':prix_a'=>$data['pa'],
                  ':code_pr'=>$code,
                  ':etat'=>$ett,
                  ':cat'=>$data['cd']

                  
                 
                )) ;
             
         

         }
        else{
           
            
           $req=$con->prepare("insert into stock_(                       
                               fournisseur,designation,pr_q,prix_v,
                               prix_a,code_pr,id_user,cat,prix_vv,prix_vs,prix_vvs) 
                              values(:fournisseur,:designation,:pr_q,:prix_v,:prix_a,:code_pr,:id_user,:cat,:prix_vv,:prix_vs,:prix_vvs)") ;

              $success=$req->execute(array(
                 ':fournisseur'=>$data['fs'],
                  ':designation'=>$data['ds'],
                  ':pr_q'=>$data['qt'],
                  ':prix_v'=>$data['pv'],
                  ':prix_a'=>$data['pa'],
                  ':code_pr'=>$idd,
                   ':id_user'=>$iddd,
                  ':cat'=>$data['cd'],
                  ':prix_vv'=>$data['pv'],
                  ':prix_vs'=>$data['pvs'],
                  ':prix_vvs'=>$data['pvs']
                 
                )) ;
               
              $req4=$con->prepare("insert into entree(                       
                               fournisseur,designation,pr_q,prix_v,
                               prix_a,code_pr,cat) 
                              values(:fournisseur,:designation,:pr_q,:prix_v,:prix_a,:code_pr,:cat)") ;

              $succ=$req4->execute(array(
                 ':fournisseur'=>$data['fs'],
                  ':designation'=>$data['ds'],
                  ':pr_q'=>$data['qt'],
                  ':prix_v'=>$data['pv'],
                  ':prix_a'=>$data['pa'],
                  ':code_pr'=>$idd,
                  ':cat'=>$data['cd']
                  
                 
                )) ;


             }

       

      }
     
  return $success;
  }
function delete_stock($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE stock_ SET statut="delete" where pr_id="'.$id.'" '); 
       
       return $q->execute();
} 
function restore_user($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE user SET a_statut="actif" where a_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
}  








function update_stock($id){


        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from stock_ where pr_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}
function update_stock_($id){


        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from stock where id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}

function change(){


     $con=dbConnect();
        
     $etat=" " ;

    $q=all_stock4();
     while ($data=$q->fetch()){
      

     $etat="bar";
     $req=$con->prepare('UPDATE stock SET prix_x="'.$data['prix_v'].'",etat="'.$etat.'" where pr_id="'.$data['pr_id'].'" ');
     $req->execute();
 
    
  }

   $req4=$con->prepare(' ALTER TABLE `stock` CHANGE `etat` `etat` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT "'.$etat.'" ');

     $req4->execute();
     return $req;           
}

function change2(){


     $con=dbConnect();
        
     $etat=" " ;

    $q=all_stock4();
     while ($data=$q->fetch()){
      
 
     $etat="boite";
     $req=$con->prepare('UPDATE stock SET prix_x="'.$data['prix_vs'].'",etat="'.$etat.'" where pr_id="'.$data['pr_id'].'" ');
     $req->execute();
 
 
    
  }

   $req4=$con->prepare(' ALTER TABLE `stock` CHANGE `etat` `etat` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT "'.$etat.'" ');

     $req4->execute();
     return $req;           
}



function update_alert($id){


     $con=dbConnect();
        
     $req=$con->prepare('UPDATE stock_ SET alert="'.$id.'" where pr_id=pr_id ');

     $req->execute();
     $req4=$con->prepare(' ALTER TABLE `stock_` CHANGE `alert` `alert` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT "'.$id.'" ');

     $req4->execute();
     return $req;           
}


function update_stock4($data){   

            $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $string=str_shuffle($string);
            $c=substr($string,0,7);
            $idd='BS-'.$c;
            $iddd=$_SESSION["id"];
            
       $con=dbConnect();
       $success=true;
        if(count($data)>0) {
            
         if($data['id'] > 0){

            $rpp=r_p($data['id']);
            $code=$rpp['code_pr'];

              
            
             $req=$con->prepare("UPDATE stock SET fournisseur=:fournisseur,
                                designation=:designation,pr_q=:pr_q,prix_v=:prix_v,
                                prix_a=:prix_a,id_user=:id_user,cat=:cat,prix_vv=:prix_vv,prix_vs=:prix_vs,prix_vvs=:prix_vvs
                                ,prix_x=:prix_x
                               WHERE id=:id ");


               $success=$req->execute(array(
                  ':id'=>$data['id'],
                  ':fournisseur'=>$data['fs'],
                  ':designation'=>$data['ds'],
                  ':pr_q'=>$data['qt'],
                  ':prix_v'=>$data['pv'],
                  ':prix_a'=>$data['pa'],
                  ':id_user'=>$iddd,
                  ':cat'=>$data['cd'],
                  ':prix_vv'=>$data['pv'],
                  ':prix_vs'=>$data['pvs'],
                  ':prix_vvs'=>$data['pvs'],
                  ':prix_x'=>$data['pv']

                 
                  
                   )) ;

        }
         

      }
     
  return $success;

}