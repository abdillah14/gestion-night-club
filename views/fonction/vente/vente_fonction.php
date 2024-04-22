<?php   

include("../../../config/dbConnect.php");

 function upload_image_user()
{ 
  if(isset($_POST["photo"]))
  {
    $extension = explode('.', $_FILES['photo']['name']);
    $new_name = rand() . '.' . $extension[1];
    $destination = 'C:/wamp64/www/memoire/file/user/' . $new_name;
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
            
            
           $req=$con->prepare("UPDATE user SET user_nom=:user_nom,user_prenom=:user_prenom,
                               username=:username,user_tel=:user_tel,user_poste=:user_poste,
                               password=:password,user_photo=:user_photo,pass=:pass,
                               user_sexe=:user_sexe,id_pf=:id_pf    
                               WHERE a_id=:a_id ");


               $success=$req->execute(array(
                  'a_id'=>$data['id'],
                  ':user_nom'=>$data['nom'],
                  ':user_prenom'=>$data['prenom'],
                  ':user_tel'=>$data['phone'],
                  ':user_poste'=>$data['poste'],
                  ':password'=>$pass,
                  ':pass'=>$pa,
                  ':id_pf'=>$pf,
                  ':user_sexe'=>$data['sexe'],
                  ':user_photo'=>$data['photo']
                  
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
    $destination = 'C:/wamp64/www/memoire/file/user/' . $new_name;
    move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
    return $new_name;
  }
}  





 function all_user(){   

   
       $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from user,profile where
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
 function insert_user($data){   

            // $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            // $string=str_shuffle($string);
            // $c=substr($string,0,5);
            // $idd='A-'.$c;
            // $ac="";
           

       $con=dbConnect();
       $success=false;
        if(count($data)>0) {
             $pass=sha1($data['password']);
              $paa=$data['password'];
             if (mb_strlen($data['password']) > 25){ 
                $pass=$data['password'];
                $paa=$data['pa'];
                   }
         if(mb_strlen($data['id']) > 0){

            
              
            
             $req=$con->prepare("UPDATE user SET user_nom=:user_nom,user_prenom=:user_prenom,
                               username=:username,user_tel=:user_tel,user_poste=:user_poste,
                               password=:password,user_photo=:user_photo,pass=:pass,
                               user_sexe=:user_sexe,id_pf=:id_pf    
                               WHERE user_id=:user_id ");


               $success=$req->execute(array(
                  ':user_id'=>$data['id'],
                  ':user_nom'=>$data['nom'],
                  ':user_prenom'=>$data['prenom'],
                  ':username'=>$data['user'],
                  ':user_tel'=>$data['phone'],
                  ':user_poste'=>$data['poste'],
                  ':password'=>$pass,
                  ':pass'=>$paa,
                  ':id_pf'=>$data['pf'],
                  ':user_sexe'=>$data['sexe'],
                  ':user_photo'=>$data['photo']
                  
                   )) ;

         

         }
        else{
           
            
           $req=$con->prepare("insert into user(user_nom,user_prenom,user_poste,user_tel,password,username,user_sexe,user_photo,id_pf,pass) 
             values(:user_nom,:user_prenom,:user_poste,:user_tel,:password,:username,:user_sexe,:user_photo,:id_pf,:pass)") ;

              $success=$req->execute(array(
                  ':user_nom'=>$data['nom'],
                  ':user_prenom'=>$data['prenom'],
                  ':user_tel'=>$data['phone'],
                  ':user_poste'=>$data['poste'],
                  ':password'=>$pass,
                  ':pass'=>$paa,
                  ':id_pf'=>$data['pf'],
                  ':username'=>$data['user'],
                  ':user_sexe'=>$data['sexe'],
                  ':user_photo'=>$data['photo']
                  
                   )) ;

             }

      }
     
  return $success;
  }

function verf($id){
       $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from vente where v_code="'.$id.'" '); 
        $q->execute();
        $res=$q->fetch();
        return $res;           
}
function verf2($id){
       $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from stock where pr_id="'.$id.'" '); 
        $q->execute();
        $res=$q->fetch();
        return $res;           
}

function delete_vente($id){
        $con=dbConnect();
        $var=verf($id);
       

        $qt=$var['v_q'];
        $sp=$var['id_s']; 

        
         $var2=verf2($sp);
         $qt2=$var2['pr_q'];
         $qtt=$qt+ $qt2;

        $q=$con->prepare('DELETE from vente  where v_code="'.$id.'" '); 
        $q->execute();
       
        if ($q) {
         $req=$con->query("UPDATE stock SET pr_q='".$qtt."' WHERE pr_id='".$sp."' LIMIT 1");
        }

  return $q;
} 
function paye($id){
        $con=dbConnect();
        $q=$con->prepare('UPDATE vente SET v_statut="payé" where v_code="'.$id.'" '); 
       
       return $q->execute();
}  

function update_vente($id){


        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from stock_ where pr_id="'.$id.'"  '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}