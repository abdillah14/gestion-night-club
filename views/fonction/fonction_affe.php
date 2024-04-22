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

            $req=$con->prepare("UPDATE affectation SET id_j=:id_j,af_nom=:af_nom   
                               WHERE af_id=:af_id ");

            $success=$req->execute(array(
                  ':af_id'=>$data['id'],
                  ':af_nom'=>$data['nom'],
                  ':id_j'=>$data['noms']
                  )) ;
          }
        else{
           $req=$con->prepare("insert into affectation(id_j,af_nom) 
                              values(:id_j,:af_nom)") ;

              $success=$req->execute(array(
                  ':id_j'=>$data['noms'],
                  ':af_nom'=>$data['nom']
                   )) ;
              }

      }
     
  return $success;
  }
function delete($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE affectation SET af_statut="inactif" where af_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 
  

function update($id){
        $con=dbConnect();
        $q=$con->prepare('SELECT  * from affectation where af_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}