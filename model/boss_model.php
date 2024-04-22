
<?php
include("config/dbConnect.php");
function all_boss(){

    $con=dbConnect();

        $q=$con->query('SELECT * from client where bs_statut= "actif" '); 

       return $q;
  }