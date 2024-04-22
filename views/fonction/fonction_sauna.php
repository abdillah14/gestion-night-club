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

            $req=$con->prepare("UPDATE sauna SET sa_nom=:sa_nom,sa_px=:sa_px   
                               WHERE sa_id=:sa_id ");

            $success=$req->execute(array(
                  ':sa_id'=>$data['id'],
                  ':sa_nom'=>$data['nom'],
                  ':sa_px'=>$data['px']
                  )) ;
          }
        else{
           $req=$con->prepare("insert into sauna(sa_nom,sa_px) 
                              values(:sa_nom,:sa_px)") ;

              $success=$req->execute(array(
                  ':sa_nom'=>$data['nom'],
                  ':sa_px'=>$data['px']
                   )) ;
              }

      }
     
  return $success;
  }
function delete($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE sauna SET sa_statut="inactif" where sa_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 
  

function update($id){
        $con=dbConnect();
        $q=$con->prepare('SELECT  * from sauna where sa_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}