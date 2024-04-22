<?php   

include("../../../config/dbConnect.php");

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


 function insert_boss($data){   

            // $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            // $string=str_shuffle($string);
            // $c=substr($string,0,5);
            // $idd='A-'.$c;
            // $ac="";
           

       $con=dbConnect();
       $success=false;
        if(count($data)>0) {
           
         if($data['id'] > 0){

            
              
            
             $req=$con->prepare("UPDATE client SET bs_nom=:bs_nom,bs_prenom=:bs_prenom,
                               bs_adresse=:bs_adresse,bs_tel=:bs_tel,bs_photo=:bs_photo,
                               bs_sexe=:bs_sexe   
                               WHERE bs_id=:bs_id ");


               $success=$req->execute(array(
                  ':bs_id'=>$data['id'],
                  ':bs_nom'=>$data['nom'],
                  ':bs_prenom'=>$data['prenom'],
                  ':bs_adresse'=>$data['adresse'],
                  ':bs_tel'=>$data['phone'],
                  ':bs_sexe'=>$data['sexe'],
                  ':bs_photo'=>$data['photo']
                  
                   )) ;

         

         }
        else{
           
            
           $req=$con->prepare("insert into client(bs_nom,bs_prenom,bs_tel,bs_adresse,bs_sexe,bs_photo) 
                       values(:bs_nom,:bs_prenom,:bs_tel,:bs_adresse,:bs_sexe,:bs_photo)") ;

              $success=$req->execute(array(
                  ':bs_nom'=>$data['nom'],
                  ':bs_prenom'=>$data['prenom'],
                  ':bs_adresse'=>$data['adresse'],
                  ':bs_tel'=>$data['phone'],
                  ':bs_sexe'=>$data['sexe'],
                  ':bs_photo'=>$data['photo']
                  
                   )) ;

             }

      }
     
  return $success;
  }
function delete_boss($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE  client SET bs_statut="inactif" where bs_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 
function restore_boss($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE client SET a_statut="actif" where a_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
}  

function update_boss($id){


        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from  client where bs_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}