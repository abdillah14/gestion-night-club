<?php   

include("../../../config/dbConnect.php");


 function insert_dp($data){   

            // $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            // $string=str_shuffle($string);
            // $c=substr($string,0,5);
            // $idd='A-'.$c;
            // $ac="";
           

       $con=dbConnect();
       $success=false;
        if(count($data)>0) {
           
         if($data['id'] > 0){

            
              
            
             $req=$con->prepare("UPDATE depense SET detail=:detail,montant=:montant   
                               WHERE id=:id ");


               $success=$req->execute(array(
                  ':id'=>$data['id'],
                  ':detail'=>$data['ds'],
                  ':montant'=>$data['mt']
                  
                   )) ;

         

         }
        else{
           
            
           $req=$con->prepare("insert into depense(detail,montant) 
                       values(:detail,:montant)") ;

              $success=$req->execute(array(
                  ':detail'=>$data['ds'],
                  ':montant'=>$data['mt']
                  
                   )) ;

             }

      }
     
  return $success;
  }
function delete_dp($id){
  $con=dbConnect();
  $q=$con->prepare('UPDATE depense SET dp_statut="Actif" where id="'.$id.'"  '); 
       
  return $q->execute();
} 


function update_dp($id){
        $con=dbConnect();
       
        $q=$con->prepare('SELECT  * from  depense where id="'.$id.'" '); 
       
        $q->execute();
        $res=$q->fetchAll();

       return $res;           
}