 
<?php
include("config/dbConnect.php");
function all_dime(){
    

    $con=dbConnect();

        $q=$con->query('SELECT * from vente '); 

       return $q;
  }