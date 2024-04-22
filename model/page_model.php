
<?php
include("config/dbConnect.php");
function all_page(){

    $con=dbConnect();

        $q=$con->query('SELECT * from page where pg_statut= "actif" '); 

       return $q;
  }

  function all_table(){
       $con=dbConnect();
       $q=$con->query('SELECT * from tab where t_statut= "Actif" '); 
       return $q;
  }

   function all_nourriture(){
       $con=dbConnect();
       $q=$con->query('SELECT * from nourriture where n_statut= "Actif" '); 
       return $q;
  }

  function all_plat(){
       $con=dbConnect();
       $q=$con->query('SELECT * from plat where p_statut= "Actif" '); 
       return $q;
  }

  function all_fourniture(){
       $con=dbConnect();
       $q=$con->query('SELECT * from fourniture where f_statut= "Actif" '); 
       return $q;
  }

   function all_chambre(){
       $con=dbConnect();
       $q=$con->query('SELECT * from chambre where ch_statut= "Actif" '); 
       return $q;
  }
  function all_chambre1(){
       $con=dbConnect();
       $q=$con->query('SELECT * from chambre_client,chambre where cc_statut= "inactif" and 
                       id_ch=ch_id '); 
       return $q;
  }
  function all_chambre2($d4,$d5){
       $con=dbConnect();
       $req='SELECT * FROM chambre_client,chambre WHERE cc_date >= "'.$d4.'"
                         and cc_date <= "'.$d5.'" and cc_statut= "inactif" and 
                         id_ch=ch_id ORDER BY cc_id DESC 
                  ';
   $q=$con->query($req); 
   return $q;
  }
 
 function chambre_client($id){
       $con=dbConnect();
       $q=$con->prepare('SELECT * from chambre_client where  cc_statut= "Occupée" and id_ch="'.$id.'" '); 
        $q->execute();
        $res=$q->fetch();
        return $res;
  }



  function all_affe(){
       $con=dbConnect();
       $q=$con->query('SELECT * from affectation,jeu where af_statut= "Actif" and j_id=id_j '); 
       return $q;
  }
   function all_jeu(){
       $con=dbConnect();
       $q=$con->query('SELECT * from jeu where j_statut= "Actif"  '); 
       return $q;
  }
  function all_jeu2($d4,$d5){

    $con=dbConnect();
    $req='SELECT * FROM jeu WHERE j_date >= "'.$d4.'"
                         and j_date <= "'.$d5.'" and j_statut= "Actif" ORDER BY j_id DESC 
                  ';
   $q=$con->query($req); 
   return $q;
  }
   function all_location(){
       $con=dbConnect();
       $q=$con->query('SELECT * from location where l_statut= "Actif" '); 
       return $q;
  }
   function all_location2($d4,$d5){

    $con=dbConnect();
    $req='SELECT * FROM location WHERE l_date >= "'.$d4.'"
                         and l_date <= "'.$d5.'" and l_statut= "Actif" ORDER BY l_id DESC 
                  ';
   $q=$con->query($req); 
   return $q;
  }
  function all_billard(){
       $con=dbConnect();
       $q=$con->query('SELECT * from billard where b_statut= "Actif" '); 
       return $q;
  }
  function all_billard2($d4,$d5){

    $con=dbConnect();
    $req='SELECT * FROM billard WHERE b_date >= "'.$d4.'"
                         and b_date <= "'.$d5.'" and b_statut= "Actif"  ORDER BY b_id DESC 
                  ';
   $q=$con->query($req); 
   return $q;
  }

  function all_piscine(){
       $con=dbConnect();
       $q=$con->query('SELECT * from piscine where p_statut= "Actif" '); 
       return $q;
  }
   function all_piscine2($d4,$d5){

    $con=dbConnect();
    $req='SELECT * FROM piscine WHERE p_date >= "'.$d4.'"
                         and p_date <= "'.$d5.'" and p_statut= "Actif"  ORDER BY p_id DESC 
                  ';
   $q=$con->query($req); 
   return $q;
  }

  function all_sport(){
       $con=dbConnect();
       $q=$con->query('SELECT * from sport where sp_statut= "Actif" '); 
       return $q;
  }
  function all_transport(){
       $con=dbConnect();
       $q=$con->query('SELECT * from transport where tr_statut= "Actif" '); 
       return $q;
  }
  function all_transport2($d4,$d5){

    $con=dbConnect();
    $req='SELECT * FROM transport WHERE tr_date >= "'.$d4.'"
                         and tr_date <= "'.$d5.'" and tr_statut= "Actif"  ORDER BY tr_id DESC 
                  ';
   $q=$con->query($req); 
   return $q;
  }

   function all_sauna(){
       $con=dbConnect();
       $q=$con->query('SELECT * from sauna where sa_statut= "Actif" '); 
       return $q;
  }

  function all_sauna2($d4,$d5){

    $con=dbConnect();
    $req='SELECT * FROM sauna WHERE sa_date >= "'.$d4.'"
                         and sa_date <= "'.$d5.'" and sa_statut= "Actif"  ORDER BY sa_id DESC 
                  ';
   $q=$con->query($req); 
   return $q;
  }