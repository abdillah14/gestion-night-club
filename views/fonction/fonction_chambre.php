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

            $req=$con->prepare("UPDATE chambre SET ch_nom=:ch_nom,ch_px=:ch_px   
                               WHERE ch_id=:ch_id ");

            $success=$req->execute(array(
                  ':ch_id'=>$data['id'],
                  ':ch_nom'=>$data['nom'],
                  ':ch_px'=>$data['px']
                  )) ;
          }
        else{
           $req=$con->prepare("insert into chambre(ch_nom,ch_px) 
                              values(:ch_nom,:ch_px)") ;

              $success=$req->execute(array(
                  ':ch_nom'=>$data['nom'],
                  ':ch_px'=>$data['px']
                   )) ;
              }

      }
     
  return $success;
  }
function delete($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE chambre SET ch_statut="inactif" where ch_id="'.$id.'" '); 
       
       return $q->execute();
} 

function vide($id){
        $con=dbConnect();
        $q=$con->prepare('UPDATE chambre_client SET cc_statut="inactif" where cc_id="'.$id.'" '); 
        return $q->execute();
}

function sup($id){
        $con=dbConnect();
        $q=$con->prepare('DELETE from chambre_client  where cc_id="'.$id.'" '); 
        return $q->execute();
}  

function up($id){
        $con=dbConnect();
        $q=$con->prepare('SELECT  * from chambre_client where cc_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}

function up_($data){

        $success=false; 
        $con=dbConnect();

         $req=$con->prepare("UPDATE chambre_client SET cc_nom=:cc_nom,cc_px=:cc_px,
                             cc_details=:cc_details,cc_num=:cc_num,
                             cc_type=:cc_type,cc_tmp=:cc_tmp   
                               WHERE cc_id=:cc_id ");


               $success=$req->execute(array(
                  ':cc_id'=>$data['id'],
                  ':cc_nom'=>$data['nom'],
                  ':cc_px'=>$data['px'],
                  ':cc_details'=>$data['ds'],
                  ':cc_num'=>$data['nm'],
                  ':cc_type'=>$data['tp'],
                  ':cc_tmp'=>$data['hr']
                  )) ;
       
     return $success;
}

function update($id){
        $con=dbConnect();
        $q=$con->prepare('SELECT  * from chambre where ch_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}