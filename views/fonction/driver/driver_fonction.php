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


 function insert_driver($data){   

            // $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            // $string=str_shuffle($string);
            // $c=substr($string,0,5);
            // $idd='A-'.$c;
            // $ac="";
           

       $con=dbConnect();
       $success=false;
        if(count($data)>0) {
           
         if($data['id'] > 0){

            
              
            
             $req=$con->prepare("UPDATE driver SET dr_nom=:dr_nom,dr_prenom=:dr_prenom,
                               dr_adresse=:dr_adresse,dr_tel=:dr_tel,dr_photo=:dr_photo,
                               dr_sexe=:dr_sexe,id_bs=:id_bs      
                               WHERE dr_id=:dr_id ");


               $success=$req->execute(array(
                  ':dr_id'=>$data['id'],
                  ':id_bs'=>$data['bs'],
                  ':dr_nom'=>$data['nom'],
                  ':dr_prenom'=>$data['prenom'],
                  ':dr_adresse'=>$data['adresse'],
                  ':dr_tel'=>$data['phone'],
                  ':dr_sexe'=>$data['sexe'],
                  ':dr_photo'=>$data['photo']
                  
                    )) ;

         

         }
        else{
           
            
           $req=$con->prepare("insert into driver(id_bs,dr_nom,dr_prenom,dr_tel,dr_adresse,dr_sexe,dr_photo) 
                       values(:id_bs,:dr_nom,:dr_prenom,:dr_tel,:dr_adresse,:dr_sexe,:dr_photo)") ;

              $success=$req->execute(array(
                  ':id_bs'=>$data['bs'], 
                  ':dr_nom'=>$data['nom'],
                  ':dr_prenom'=>$data['prenom'],
                  ':dr_adresse'=>$data['adresse'],
                  ':dr_tel'=>$data['phone'],
                  ':dr_sexe'=>$data['sexe'],
                  ':dr_photo'=>$data['photo']
                  
                   )) ;

             }

      }
     
  return $success;
  }
function delete_driver($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE driver SET dr_statut="inactif" where dr_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
} 
function restore_driver($id){


        $con=dbConnect();
       
        $q=$con->prepare('UPDATE driver SET a_statut="actif" where a_id="'.$id.'" '); 
       
       return $q->execute();
       

                 
}  

function update_driver($id){


        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from driver where dr_id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}