<?php
include("config/dbConnect.php");
function connexion($username,$pass){

    $password =sha1($pass);
    $con=dbConnect();
    $q=$con->query("SELECT * FROM user WHERE password='$password' and username='$username' 
                    AND user_statut='actif' ");
    $ad=$q->fetch();
    return $ad;
  }

?>