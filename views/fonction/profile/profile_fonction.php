<?php   

include("../../../config/dbConnect.php");

 function all_profile(){   

   
       $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from profile,profile where
                         id_pf=pf_id'); 
        $q->execute();
        $r=$q->fetchAll();
        $count=$q->rowCount();
       return array(
        'r'=>$r,
        'count'=>$count
       ); 
 
  }
  function ver_droit($id){ 

      $con=dbConnect();
       $tab=array();
       
         $res=$con->prepare("SELECT pg_nom,c,r,d,u from 
            parametre 
            INNER JOIN profile 
            ON profile.pf_id=parametre.id_pf
            INNER JOIN page 
            ON page.pg_id=parametre.id_pg  
            where id_pf='$id' ");
         $res->execute(array());
        while ($r=$res->fetch()) {
          $tab[]=$r;
        }

    return $tab;
}
 function insert_profile($data){   

            // $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            // $string=str_shuffle($string);
            // $c=substr($string,0,5);
            // $idd='A-'.$c;
            // $ac="";
           

       $con=dbConnect();
       $success=false;
        if(count($data)>0) {
             
         if($data['id'] > 0){

            
              
            
             $req=$con->prepare("UPDATE profile SET pf_nom=:pf_nom   
                               WHERE pf_id=:pf_id ");


               $success=$req->execute(array(
                  ':pf_id'=>$data['id'],
                  ':pf_nom'=>$data['nom']
                  
                   )) ;

         

         }
        else{
           
            
           $req=$con->prepare("insert into profile(pf_nom) 
                              values(:pf_nom)") ;

              $success=$req->execute(array(
                  ':pf_nom'=>$data['nom']
                 
                  
                   )) ;

             }

      }
     
  return $success;
  }
function delete_profile($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE profile SET pf_statut="inactif" where pf_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 


function update_profile($id){


        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from profile where pf_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}
function getpermission($id_p,$id_pg)
{
     $con = dbConnect() ;
     $req=$con->prepare("SELECT id_pf,id_pg FROM parametre  where 
                    id_pf='".$id_p."' and id_pg='".$id_pg."'
                  ");
    $req->execute();
   $t = array();
   if ($req->rowCount()>0) {
     while ($data = $req->fetch()) {
       $t[]=$data;
     }
   }
 return   $t;
}
function voir_permission($id_p,$id_pg)
{
     $con = dbConnect() ;
     $req=$con->prepare("SELECT c,r,u,d FROM parametre  where 
                    id_pf='$id_p' and id_pg='$id_pg'
                  ");
    $req->execute();
   $t = array();
   if ($req->rowCount()>0) {
     while ($data = $req->fetch()) {
       $t[]=$data;
     }
   }
  return   $t; 
}
