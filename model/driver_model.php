
<?php
include("config/dbConnect.php");
function all_driver(){

    $con=dbConnect();

        $q=$con->query('SELECT * from driver where dr_statut= "actif" '); 

       return $q;
  }