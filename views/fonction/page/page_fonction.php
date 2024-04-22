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
 function insert($data){   

       $con=dbConnect();
       $success=false;

        if(count($data)>0) {
         if(mb_strlen($data['id']) > 6){

           $pass=sha1($data['password']);
           $pa=$data['password'];

             //  if (mb_strlen($data['password']) > 25){ 
             //   $pass=$data['password'];
             //   $pa=$_SESSION['pass'];
             // }
            
            
           $req=$con->prepare("UPDATE page SET page_nom=:page_nom,page_prenom=:page_prenom,
                               pagename=:pagename,page_tel=:page_tel,page_poste=:page_poste,
                               password=:password,page_photo=:page_photo,pass=:pass,
                               page_sexe=:page_sexe,id_pg=:id_pg    
                               WHERE a_id=:a_id ");


               $success=$req->execute(array(
                  'a_id'=>$data['id'],
                  ':page_nom'=>$data['nom'],
                  ':page_prenom'=>$data['prenom'],
                  ':page_tel'=>$data['phone'],
                  ':page_poste'=>$data['poste'],
                  ':password'=>$pass,
                  ':pass'=>$pa,
                  ':id_pg'=>$pg,
                  ':page_sexe'=>$data['sexe'],
                  ':page_photo'=>$data['photo']
                  
                   )) ;

         }
        }
       return $success; 
}





 function upload_image()
{
  if(isset($_FILES["photo"]))
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
 function insert_page($data){   

            // $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            // $string=str_shuffle($string);
            // $c=substr($string,0,5);
            // $idd='A-'.$c;
            // $ac="";
           

       $con=dbConnect();
       $success=false;
        if(count($data)>0) {
             
         if($data['id'] > 0){

            
              
            
             $req=$con->prepare("UPDATE page SET pg_nom=:pg_nom   
                               WHERE pg_id=:pg_id ");


               $success=$req->execute(array(
                  ':pg_id'=>$data['id'],
                  ':pg_nom'=>$data['nom']
                  
                   )) ;

         

         }
        else{
           
            
           $req=$con->prepare("insert into page(pg_nom) 
                              values(:pg_nom)") ;

              $success=$req->execute(array(
                  ':pg_nom'=>$data['nom']
                 
                  
                   )) ;

             }

      }
     
  return $success;
  }
function delete_page($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE page SET pg_statut="inactif" where pg_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 
function restore_page($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE page SET a_statut="actif" where a_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
}  

function update_page($id){


        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from page where pg_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}