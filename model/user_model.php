<?php
include("config/dbConnect.php");
function all_user(){

    $con=dbConnect();

        $q=$con->query('SELECT * from user where user_statut= "actif" '); 

       return $q;
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
            where id_pf='$id' ORDER BY pg_id Asc ");
         $res->execute(array());
        while ($r=$res->fetch()) {
          $tab[]=$r;
        }

    return $tab;
}
