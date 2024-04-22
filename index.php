<?php  


require("controller/dp_controller.php");
require("controller/user_controller.php");
require("controller/boss_controller.php");
require("controller/driver_controller.php");
require("controller/page_controller.php");
require("controller/profile_controller.php");
require("controller/login_controller.php");
require("controller/rapport_controller.php");
require("controller/vente_controller.php");
require("controller/accueil_controller.php");
require("controller/stock_controller.php");


if (isset($_GET['action']) && !empty($_GET['action'])) { 


      if ($_GET['action'] == 'login') {

         login();
    }
     elseif ($_GET['action'] == 'user') {

         user();
    }
    elseif ($_GET['action'] == 'dp') {

         dp();
    }
    elseif ($_GET['action'] == 'dec') {

         dec();
    }
    elseif ($_GET['action'] == 'fourniture') {

         fourniture();
    }

      elseif ($_GET['action'] == 'home') {

         accueil();
    }
      elseif ($_GET['action'] == 'plat') {

      plat();
    }
    elseif ($_GET['action'] == 'nourriture') {

       nourriture();
    }
    elseif ($_GET['action'] == 'dette') {

      dette();
    }
    elseif ($_GET['action'] == 'dette_plat') {

       dette_plat();
    }




    elseif ($_GET['action'] == 'profile') {

       profile();
   }
    elseif ($_GET['action'] == 'page') {

       page();
   }
   elseif ($_GET['action'] == 'stock') {

       stock();
   }
   elseif ($_GET['action'] == 'stock_') {

       stock_();
   }
   elseif ($_GET['action'] == 'vente') {

       vente();
   }
   elseif ($_GET['action'] == 'vente_plat') {

       vente_plat();
   }
   elseif ($_GET['action'] == 'rapport_chambre') {
       rapport_chambre();
   }
   elseif ($_GET['action'] == 'rapport') {

       rapport();
   }
   elseif ($_GET['action'] == 'rapport_n') {

       rapport_n();
   }
   elseif ($_GET['action'] == 'trace') {

       trace();
   }
   elseif ($_GET['action'] == 'table') {
       table();
   }
   elseif ($_GET['action'] == 'jeu') {
       jeu();
   }
    elseif ($_GET['action'] == 'chicha') {
       chicha();
   }
   elseif ($_GET['action'] == 'rapport_jeu') {
       rapport_jeu();
   }
   elseif ($_GET['action'] == 'location') {
       location();
   }
   elseif ($_GET['action'] == 'jardin') {
       jardin();
   }
   elseif ($_GET['action'] == 'chambre') {
       chambre();
   }

   elseif ($_GET['action'] == 'sauna') {
       sauna();
   }

   elseif ($_GET['action'] == 'sport') {
       sport();
   }
   elseif ($_GET['action'] == 'transport') {
       transport();
   }
   elseif ($_GET['action'] == 'piscine') {
       piscine();
   }
   elseif ($_GET['action'] == 'billard') {
       billard();
   }
    
    
    //   if ($_GET['action'] == 'v_cours') {

    //      v_cours_v();
    //   }
    //   /*  ========================================== profile et page ============================================  */ 
    



  }

  else {

  	  login();
  }   


  