<?php
require('../../config/dbConnect.php');
if (isset($_POST['val'])) {
  
    $val=(String) trim($_POST['val']);
    $val2=(String) trim($_POST['val2']);
    $db=dbConnect();

    // $req=$db->prepare("SELECT * FROM user WHERE CONCAT(user_nom,user_prenom) LIKE ? LIMIT 100");
  $req=$db->prepare("SELECT * FROM boss WHERE bs_nom=? and bs_prenom=? ");
    $req->execute(array($val,$val2));

    $req=$req->fetchALL();

    foreach ($req as $data) { ?>
        <div class="col-md-3">
                                        <div class="stockd stockd-box">
                                            <div class="stockd-body no-padding ">
                                              <div class="doctor-profile">
                                                        <img src="<?= $data['bs_photo'] ?>" class="doctor-pic" alt=""> 
                                                  <div class="profile-bstitle">
                                                      <div class="doctor-name"><?= $data['bs_nom'] ?>&nbsp;<?= $data['bs_prenom'] ?></div>
                                                      <div class="name-center"><?= $data['bs_poste'] ?></div>
                                                  </div>
                                                      
                                                       <p><?= $data['bs_adresse'] ?></p> 
                                                        <div><p><i class="fa fa-phone"></i>
                                                         <?= $data['bs_tel'] ?> </p> </div>
                                                     </div>
                                                  <div class="profile-userbuttons">
                                                       <a href="#" id="<?= $data['bs_id'] ?>" class="btn btn-info btn-xs voir">
                                                                 <i class="fa fa-eye"></i>
                                                                 </a>
                                                                 <a href="#" id="<?= $data['bs_id'] ?>" class="btn btn-primary btn-xs update">
                                                                 <i class="fa fa-pencil"></i>
                                                                  </a>
                                                                  <a href="#" id="<?= $data['bs_id'] ?>" class="btn btn-danger btn-xs delete">
                                                                  <i class="fa fa-trash-o "></i>
                                                                  </a>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
      <?php
  }
}
    