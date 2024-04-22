
<?php
include("config/dbConnect.php");
// function all_vente(){

//     $con=dbConnect();

//         $q=$con->query('SELECT * from vente '); 

//        return $q;
//   }
  function all_vente(){

    $con=dbConnect();

        $q=$con->query('SELECT distinct v_code,nom,user_nom,user_prenom,id_t,t_nom,v_statut,v_date from vente,user,tab where
            v_statut !="payé" and id_t=t_id and id_user=user_id 
             and v_statut !="dette" '); 

       return $q;
  }
 function all_vente_plat(){

    $con=dbConnect();

        $q=$con->query('SELECT distinct v_code,nom,id_t,t_nom,user_nom,user_prenom,v_statut,v_date from vente_plat,user,tab where
            v_statut !="payé" and id_t=t_id and id_user=user_id 
            and v_statut !="dette" '); 

       return $q;
  }


function all_vente2(){
   $id=$_SESSION['id'];
    $con=dbConnect();

        $q=$con->query('SELECT distinct v_code,nom,user_nom,user_prenom,id_t,t_nom,v_statut,v_date from vente,user,tab where
            v_statut ="imprimer" and id_t=t_id and user_id="'.$id.'" and id_user="'.$id.'" 
            and v_statut !="dette" '); 

       return $q;
  }
 function all_vente_plat2(){
    $id=$_SESSION['id'];
    $con=dbConnect();

        $q=$con->query('SELECT distinct v_code,nom,id_t,t_nom,user_nom,user_prenom,v_statut,v_date from vente_plat,user,tab where
            v_statut !="payé" and id_t=t_id and user_id="'.$id.'" and id_user="'.$id.'"
             and v_statut !="dette" '); 

       return $q;
  }








  /// dette

    function all_dette(){

    $con=dbConnect();

        $q=$con->query('SELECT distinct v_code,nom,user_nom,user_prenom,id_t,t_nom,v_statut,v_date from vente,user,tab where
            v_statut !="payé" and id_t=t_id and id_user=user_id 
            and v_statut="dette" '); 

       return $q;
  }
 function all_dette_plat(){

    $con=dbConnect();

        $q=$con->query('SELECT distinct v_code,nom,id_t,t_nom,user_nom,user_prenom,v_statut,v_date from vente_plat,user,tab where
            v_statut !="payé" and id_t=t_id and id_user=user_id 
            and v_statut="dette" '); 

       return $q;
  }


function all_dette2(){
   $id=$_SESSION['id'];
    $con=dbConnect();

        $q=$con->query('SELECT distinct v_code,nom,user_nom,user_prenom,id_t,t_nom,v_statut,v_date from vente,user,tab where
            v_statut ="imprimer" and id_t=t_id and user_id="'.$id.'" and id_user="'.$id.'" 
            and v_statut="dette" '); 

       return $q;
  }
 function all_dette_plat2(){
    $id=$_SESSION['id'];
    $con=dbConnect();

        $q=$con->query('SELECT distinct v_code,nom,id_t,t_nom,user_nom,user_prenom,v_statut,v_date from vente_plat,user,tab where
            v_statut !="payé" and id_t=t_id and user_id="'.$id.'" and id_user="'.$id.'"
            and v_statut="dette" '); 

       return $q;
  }