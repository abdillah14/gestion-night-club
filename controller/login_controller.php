<?php 
session_start();

 require("model/login_model.php");  
function remenber($username,$pass){
  //Si la case est cochée
       if(!empty($_POST['item_rm']) and isset($_POST['item_rm'])) {
            //On set 2 cookies un pour l'utilisateur et un pour le mot de passe

        //le nom du cookie "remembermeu" la valeur "$username" et la durée "time() + 31536000"
        setcookie('ru', $username, time() + 31536000);

        //le nom du cookie "remembermep" la valeur "$password" et la durée "time() + 31536000"
        setcookie('rp', $pass, time() + 31536000);

      }
      //Si la case est décochée
    if(empty($_POST['item_rm']) and !isset($_POST['item_rm'])) {

      //On cherche pour nos 2 cookies
          if (isset($_COOKIE['ru'], $_COOKIE['rp'])) {
        //Nous les plaçons comme si ils avaient expirés
       $l="ru";
       $p="rp";
       $gone="gone";
    
        $past = time() - 100;
        setcookie($l, $gone, $past);
        setcookie($p, $gone, $past);
      }
    }

}



function login(){


if (isset($_POST["log"])) { 
      extract($_POST); 
       
 
     $a=connexion($username,$pass);
   
    
      if($a){
         remenber($username,$pass); 
          $_SESSION["id"]=$a["user_id"];
          $_SESSION["nom"]=$a["user_nom"];
          $_SESSION["prenom"]=$a["user_prenom"];
          $_SESSION["photo"]=$a["user_photo"];
          $_SESSION["password"]=$a["password"];
          $_SESSION["statut"]=$a["user_statut"];
          $_SESSION["tel"]=$a["user_tel"];
          $_SESSION["profile"]=$a["id_pf"];
          $_SESSION["sexe"]=$a["user_sexe"];
          $_SESSION["pass"]=$a["pass"];
          $_SESSION["username"]=$a["username"];
         
          
           $page="index.php?action=home";
           header('location:'.$page);
          } 
        
        
        
       else
        { ?>

             <script type="text/javascript">
               
               alert("verifier vos parametres");
             </script>


              <?php
               
             }
     
      }

require("views/login/login_view.php");
}   



// include("views/boss/modale/add_boss.php");
// include("views/boss/modale/add_img.php");  
// require("views/boss/script/voir_boss.php");
// require("views/boss/script/m_boss.php");

