<?php   

include("../../../config/dbConnect.php");

 function upload_image_page()
{ 
  if(isset($_POST["photo"]))
  {
    $extension = explode('.', $_FILES['photo']['name']);
    $new_name = rand() . '.' . $extension[1];
    $destination = 'C:/wamp64/www/memoire/file/page/' . $new_name;
    move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
   
    return $new_name;
  }
}  

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

            $req=$con->prepare("UPDATE transport SET tr_nom=:tr_nom,tr_px=:tr_px,tr_nb=:tr_nb,  
                               tr_num=:tr_num,tr_tp=:tr_tp     
                               WHERE tr_id=:tr_id ");

            $success=$req->execute(array(
                  ':tr_id'=>$data['id'],
                  ':tr_nom'=>$data['nom'],
                  ':tr_px'=>$data['px'],
                  ':tr_nb'=>$data['nb'],
                  ':tr_num'=>$data['pl'],
                  ':tr_tp'=>$data['tp'],
                  
                   )) ;
          }
        else{
           $req=$con->prepare("insert into transport(tr_nom,tr_px,tr_nb,tr_num,tr_tp) 
                              values(:tr_nom,:tr_px,:tr_nb,:tr_num,:tr_tp)") ;

              $success=$req->execute(array(
                  ':tr_nom'=>$data['nom'],
                  ':tr_px'=>$data['px'],
                  ':tr_nb'=>$data['nb'],
                  ':tr_num'=>$data['pl'],
                  ':tr_tp'=>$data['tp']
                 
                  
                   )) ;
              }

      }
     
  return $success;
  }
function delete($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE transport SET tr_statut="inactif" where tr_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 
function restore($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE transport SET tr_statut="Actif" where tr_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
}  

function update($id){
        $con=dbConnect();
        $q=$con->prepare('SELECT  * from transport where tr_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}