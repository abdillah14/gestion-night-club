
<?php
include("config/dbConnect.php");
function all_sortie(){
    $dat = date('Y-m-d');
    $con=dbConnect();
         // v_date LIKE "'.$dat.'%"
        $q=$con->query('SELECT * from vente,stock,tab,user where id_s=pr_id and id_t=t_id and vente.id_user=user_id
                        and v_statut !="Dette" '); 

       return $q;
  }

  function all_sortie3($d4,$d5,$h1,$h2){

    $con=dbConnect();
    $req='SELECT * FROM vente,stock,tab,user WHERE v_date >= "'.$d4.' '.$h1.'"
                         and v_date <= "'.$d5.' '.$h2.'" and id_s=pr_id and id_t=t_id and vente.id_user=user_id
                         and v_statut !="Dette" ORDER BY v_id DESC 
                  ';
   $q=$con->query($req); 
   return $q;
  }
    function all_sortie5($d4,$d5,$h1,$h2,$us){

    $con=dbConnect();
    $req='SELECT * FROM vente,stock,tab,user WHERE v_date >= "'.$d4.' '.$h1.'"
                         and v_date <= "'.$d5.' '.$h2.'" and vente.id_user="'.$us.'" and id_s=pr_id and id_t=t_id 
                         and  vente.id_user=user_id
                         and v_statut !="Dette"  ORDER BY v_id DESC 
                  ';
                                                          

        $q=$con->query($req); 

       return $q;
  }

  function all_sortie4($d4,$d5,$h1,$h2){

    $con=dbConnect();
    $req='SELECT * FROM vente_plat,plat,tab,user WHERE v_date >= "'.$d4.' '.$h1.'"
                         and v_date <= "'.$d5.' '.$h2.'" and id_s=p_id and id_t=t_id and vente_plat.id_user=user_id
                         and v_statut !="Dette"  ORDER BY v_id DESC 
                  ';
                                                          

        $q=$con->query($req); 

       return $q;
  }
  function all_sortie6($d4,$d5,$h1,$h2,$us){

    $con=dbConnect();
    $req='SELECT * FROM vente_plat,plat,tab,user WHERE v_date >= "'.$d4.' '.$h1.'"
                         and v_date <= "'.$d5.' '.$h2.'" and id_user="'.$us.'" and id_s=p_id and id_t=t_id and vente_plat.id_user=user_id
                         and v_statut !="Dette"  ORDER BY v_id DESC 
                  ';
                                                          

        $q=$con->query($req); 

       return $q;
  }

function all_sortie2(){
   $dat = date('Y-m-d');
    $con=dbConnect();

        $q=$con->query('SELECT * from vente_plat,plat,tab,user where id_s=p_id and id_t=t_id and vente_plat.id_user=user_id
                        and v_statut !="Dette"

                        '); 

       return $q;
  }  
  function all_entree(){

    $con=dbConnect();

        $q=$con->query('SELECT * from entree  '); 

       return $q;
  }
  function all_entree2($d4,$d5){

    $con=dbConnect();
    $req='SELECT * FROM entree WHERE date_pr >= "'.$d4.'"
                         and date_pr <= "'.$d5.'"  ORDER BY pr_id DESC 
                  ';
                                                          

        $q=$con->query($req); 

       return $q;
  }

    function all_produit(){

    $con=dbConnect();

        $q=$con->query('SELECT * from produit  '); 

       return $q;
  }