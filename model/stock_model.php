
<?php
include("config/dbConnect.php");
function all_stock(){

    $con=dbConnect();

        $q=$con->query('SELECT * from stock where statut= "actif" '); 

       return $q;
  }

  function all_stock1(){

    $con=dbConnect();

        $q=$con->query('SELECT * from stock_ where statut= "actif" '); 

       return $q;
  }