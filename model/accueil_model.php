<?php
include("config/dbConnect.php");
function home(){   
  $con=dbConnect();
  $q=$con->query('SELECT count(*) as nombre from user where user_statut="actif" '); 
  return $q; 
 
  }

function pro(){   
  $con=dbConnect();
  $q=$con->query('SELECT count(*) as nombre from stock where statut="actif" '); 
  return $q; 
 
  }
  function ent(){   
  $con=dbConnect();
  $q=$con->query('SELECT count(*) as nombre from entree  '); 
  return $q; 
 
  }
  function vent(){  
  $dat = date('Y-m-d');
  $con=dbConnect();
  $q=$con->query('SELECT count(*) as nombre from vente where  v_date LIKE "'.$dat.'%" and v_statut="payé"  '); 
  return $q; 
   }
   function st(){  
  $dat = date('Y-m-d');
  $con=dbConnect();
  $q=$con->query('SELECT count(*) as nombre from stock_ where  statut="actif" and pr_q >0 '); 
  return $q; 
   }

  function ven(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
 $q=$con->query('SELECT count(*) as nombre from vente_plat where  v_date LIKE "'.$dat.'%" and v_statut="payé" '); 
  return $q; 
 
  } 

   function dep_accueil(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
   $q=$con->query('SELECT count(*) as nombre from depense where  date_dp LIKE "'.$dat.'%" '); 
  return $q; 
 
  }  

  function jus(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
 $q=$con->query('SELECT count(*) as nombre from stock,vente where  id_s=pr_id and cat="Jus" and v_date LIKE "'.$dat.'%" and v_statut="payé" '); 
  return $q; 
 
  } 

  function sucre(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
 $q=$con->query('SELECT count(*) as nombre from stock,vente where  id_s=pr_id and cat="Sucre" and v_date LIKE "'.$dat.'%" and v_statut="payé" '); 
  return $q; 
 
  } 

 function Whisky(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
 $q=$con->query('SELECT count(*) as nombre from stock,vente where  id_s=pr_id and cat="Whisky" and v_date LIKE "'.$dat.'%"
  and v_statut="payé" '); 
  return $q; 
 
  }  

 function Vin(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
 $q=$con->query('SELECT count(*) as nombre from stock,vente where  id_s=pr_id and cat="Vin" and v_date LIKE "'.$dat.'%"
  and v_statut="payé" '); 
  return $q; 
 
  }  

  function Eau(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
 $q=$con->query('SELECT count(*) as nombre from stock,vente where  id_s=pr_id and cat="Eau" and v_date LIKE "'.$dat.'%" 
                and v_statut="payé" '); 
  return $q; 
 
  } 
 function Biere(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
 $q=$con->query('SELECT count(*) as nombre from stock,vente where  id_s=pr_id and cat="Biere" and v_date LIKE "'.$dat.'%"
                and v_statut="payé" '); 
  return $q; 
 
  }  

 function billard_accueil(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
 $q=$con->query('SELECT count(*) as nombre from billard where  b_date LIKE "'.$dat.'%" '); 
  return $q; 
   }

 function sauna_accueil(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
 $q=$con->query('SELECT count(*) as nombre from sauna where  sa_date LIKE "'.$dat.'%" '); 
  return $q; 
   }    

    function jeu_accueil(){ 
  $dat = date('Y-m-d');  
  $con=dbConnect();
 $q=$con->query('SELECT count(*) as nombre from jeu where  j_date LIKE "'.$dat.'%" '); 
  return $q; 
 
  } 