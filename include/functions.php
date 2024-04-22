<?php 

/*  =============================================================================  */

 function redirect($page){

    if (!empty($page)) {

       header('location:'.$page);

       exit();
    }
  }





?>