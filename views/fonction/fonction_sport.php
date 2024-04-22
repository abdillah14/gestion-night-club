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

            $req=$con->prepare("UPDATE sport SET sp_nom=:sp_nom,sp_px=:sp_px,sp_nb=:sp_nb   
                               WHERE sp_id=:sp_id ");

            $success=$req->execute(array(
                  ':sp_id'=>$data['id'],
                  ':sp_nom'=>$data['nom'],
                  ':sp_px'=>$data['px'],
                  ':sp_nb'=>$data['nb']
                  
                   )) ;
          }
        else{
           $req=$con->prepare("insert into sport(sp_nom,sp_px,sp_nb) 
                              values(:sp_nom,:sp_px,:sp_nb)") ;

              $success=$req->execute(array(
                  ':sp_nom'=>$data['nom'],
                  ':sp_px'=>$data['px'],
                  ':sp_nb'=>$data['nb']
                 
                  
                   )) ;
              }

      }
     
  return $success;
  }
function delete($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE sport SET sp_statut="inactif" where sp_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 
function restore($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE sport SET sp_statut="Actif" where sp_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
}  

function update($id){
        $con=dbConnect();
        $q=$con->prepare('SELECT  * from sport where sp_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}