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

            $req=$con->prepare("UPDATE piscine SET p_nom=:p_nom,p_px=:p_px   
                               WHERE p_id=:p_id ");

            $success=$req->execute(array(
                  ':p_id'=>$data['id'],
                  ':p_nom'=>$data['nom'],
                  ':p_px'=>$data['px']
                  )) ;
          }
        else{
           $req=$con->prepare("insert into piscine(p_nom,p_px) 
                              values(:p_nom,:p_px)") ;

              $success=$req->execute(array(
                  ':p_nom'=>$data['nom'],
                  ':p_px'=>$data['px']
                   )) ;
              }

      }
     
  return $success;
  }
function delete($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE piscine SET p_statut="inactif" where p_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 
  

function update($id){
        $con=dbConnect();
        $q=$con->prepare('SELECT  * from piscine where p_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}