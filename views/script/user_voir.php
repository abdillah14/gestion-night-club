<?php
session_start();
require('../../config/dbConnect.php');
 function ver_droit($id){ 

      $con=dbConnect();
       $tab=array();
       
         $res=$con->prepare("SELECT pg_nom,c,r,d,u from 
            parametre 
            INNER JOIN profile 
            ON profile.pf_id=parametre.id_pf
            INNER JOIN page 
            ON page.pg_id=parametre.id_pg  
            where id_pf='$id' ");
         $res->execute(array());
        while ($r=$res->fetch()) {
          $tab[]=$r;
        }

    return $tab;
}

     $idd_p=$_SESSION["profile"];
     $ver_P=ver_droit($_SESSION["profile"]);
     



if (isset($_POST['val'])) {
  
    $val=(String) trim($_POST['val']);
    $val2=(String) trim($_POST['val2']);
    $db=dbConnect();

    // $req=$db->prepare("SELECT * FROM user WHERE CONCAT(user_nom,user_prenom) LIKE ? LIMIT 100");
  $req=$db->prepare("SELECT * FROM user WHERE user_nom=? and user_prenom=? ");
    $req->execute(array($val,$val2));

    $req=$req->fetchALL();

    foreach ($req as $data) { ?>
        <div class="col-md-3">
        <div class="stockd stockd-box">
        <div class="stockd-body no-padding ">
        <div class="doctor-profile">
        <img src="<?= $data['user_photo'] ?>" class="doctor-pic" alt=""> 
        <div class="profile-usertitle">
        <div class="doctor-name"><?= $data['user_nom'] ?>&nbsp;<?= $data['user_prenom'] ?></div>
        
          </div>
            <?= $data['user_tel'] ?> </div>
            <div class="profile-userbuttons">
             <?php
                 if($ver_P[0][0]=="personnel" and 
                                $ver_P[0][2]==1) {?>
                  <a href="#" id="<?= $data['user_id'] ?>" class="btn btn-default btn-xs voir_user">
                    <i class="fa fa-eye"></i>
                     </a>
                       <?php }?>
                      <?php
                       if($ver_P[0][0]=="personnel" and 
                           $ver_P[0][4]==1) {?>
                          <a href="#" id="<?= $data['user_id'] ?>" class="btn btn-success btn-xs update">
                       <i class="fa fa-pencil"></i>
                           </a>
                          <?php }?>
                             <?php
                           if($ver_P[0][0]=="personnel" and 
                              $ver_P[0][3]==1) {?>
                             <a href="#" id="<?= $data['user_id'] ?>" class="btn btn-pink btn-xs delete">
                        <i class="fa fa-trash-o "></i>
                             </a>
                               <?php }?>
           </div>
          </div>
          </div>
          </div> 
      <?php
  }
}
    