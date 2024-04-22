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

 function all_page(){   

   
       $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from page where
                         id_pg=pg_id'); 
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

            $req=$con->prepare("UPDATE tab SET t_nom=:t_nom   
                               WHERE t_id=:t_id ");

            $success=$req->execute(array(
                  ':t_id'=>$data['id'],
                  ':t_nom'=>$data['nom']
                  
                   )) ;
          }
        else{
           $req=$con->prepare("insert into tab(t_nom) 
                              values(:t_nom)") ;

              $success=$req->execute(array(
                  ':t_nom'=>$data['nom']
                 
                  
                   )) ;
              }

      }
     
  return $success;
  }
function delete($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE tab SET t_statut="inactif" where t_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 
function restore($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE tab SET t_statut="Actif" where t_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
}  

function update($id){
        $con=dbConnect();
        $q=$con->prepare('SELECT  * from tab where t_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}