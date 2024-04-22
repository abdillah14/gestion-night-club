<?php
include("config/dbConnect.php");
function all_profile(){

    $con=dbConnect();

        $q=$con->query('SELECT * from profile where pf_statut= "actif" '); 

       return $q;
  }