<?php   

include("../../../config/dbConnect.php");
 
  function ver_droit($id){ 

      $con=dbConnect();
       $tab=array();
       
         $res=$con->prepare("SELECT pg_nom,c,r,d,u from 
            parametre 
            INNER JOIN page 
            ON page.pg_id=parametre.id_pg
            INNER JOIN page 
            ON page.pg_id=parametre.id_pg  
            where id_pg='$id' ");
         $res->execute(array());
        while ($r=$res->fetch()) {
          $tab[]=$r;
        }

    return $tab;
}
 function insert($data){   

            // $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            // $string=str_shuffle($string);
            // $c=substr($string,0,5);
            // $idd='A-'.$c;
            // $ac="";
       $con=dbConnect();
       $success=false;
        if(count($data)>0) {
             
         if($data['id'] > 0){

            $req=$con->prepare("UPDATE location SET l_nom=:l_nom,l_px=:l_px,
                                date_in=:date_in,date_end=:date_end,l_type=:l_type,
                                l_details=:l_details   
                               WHERE l_id=:l_id ");

            $success=$req->execute(array(
                  ':l_id'=>$data['id'],
                  ':l_nom'=>$data['nom'],
                  ':l_px'=>$data['px'],
                  ':date_in'=>$data['din'],
                  ':date_end'=>$data['den'],
                  ':l_type'=>$data['tp'],
                  ':l_details'=>$data['dt']
                  
                   )) ;
          }
        else{
           $req=$con->prepare("insert into location(l_nom,l_px,date_in,date_end,l_type,l_details) 
                              values(:l_nom,:l_px,:date_in,:date_end,:l_type,:l_details)") ;

              $success=$req->execute(array(
                  ':l_nom'=>$data['nom'],
                  ':l_px'=>$data['px'],
                  ':date_in'=>$data['din'],
                  ':date_end'=>$data['den'],
                  ':l_type'=>$data['tp'],
                  ':l_details'=>$data['dt']
                 
                  
                   )) ;
              }

      }
     
  return $success;
  }
function delete($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE location SET l_statut="inactif" where l_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 
function restore($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE location SET l_statut="Actif" where l_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
}  

function update($id){
        $con=dbConnect();
        $q=$con->prepare('SELECT  * from location where l_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}