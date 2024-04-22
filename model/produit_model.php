
<?php
include("config/dbConnect.php");
function all_produit(){

    $con=dbConnect();

        $q=$con->query('SELECT * from produit where pr_statut= "actif" '); 

       return $q;
  }