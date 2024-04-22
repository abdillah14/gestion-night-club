<?php

/* Database Connection */

if (!function_exists('dbConnect')) {
  
  function dbConnect(){

    try{

      $db=new PDO("mysql:host=localhost;dbname=disko_db;charset=utf8","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));   

    }
    catch(Exception $e){

      die('Erreur:'.$e->getMessage());  
      
    }

    return $db;

  }
}
