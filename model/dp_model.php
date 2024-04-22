<?php
include("config/dbConnect.php");
function all_dp(){
    $dat = date('Y-m-d');
    $con=dbConnect();
    // SELECT * from depense where  date_dp LIKE "'.$dat.'%" and dp_statut="Actif"
    $q=$con->query('SELECT * from depense where   dp_statut="Actif" '); 

       return $q;
  }

  function all_dp2($d4,$d5){
   $con=dbConnect();
   $req='SELECT * FROM depense WHERE date_dp >= "'.$d4.'"
         and date_dp <= "'.$d5.'" and dp_statut= "Actif" ORDER BY id DESC  '; 
   $q=$con->query($req); 
   return $q;
  }
   
 function seach_etud($cond){
$con=dbConnect();

      $q=$con->prepare($cond);
      $q->execute(array($cond));
      return $q;
  }