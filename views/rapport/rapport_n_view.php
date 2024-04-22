<?php

if (empty($_SESSION["nom"])) {
   $page="index.php?action=login";
   header('location:'.$page);

} 
  ?><?php include("views/partials/head_link.php"); ?>

  
       
       
     <div class="wrapper">
          
        <!-- start header -->
    <?php include("views/partials/tete.php"); ?>    

        <!-- end header -->
            <div class="page-wrap">
               <!-- start sidebar menu -->
        <?php include("views/partials/sidebar.php"); ?>
             <!-- end sidebar menu -->
            <!-- start page content -->
            
            <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-refresh-cw bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Rapport</h5>
                                            <span>la page permet d'avoir le rapport des plats vendus</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php?action=home"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">rapport plat</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">rapport plat</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                 
                    <br>
                   <form action="#" id="sh" method="post" class="form-horizontal">

                           <div class="form-control col-md-3 col-sm-3 col-lg-3">
                                   <input type="date" id="dn1" name="dn1"  class="form-control dn1"  placeholder="prenom" value="<?php if (isset($_POST['dn1']) and !empty($_POST['dn1']))
                                             echo  $_POST['dn1'];
                                             else
                                              echo '';  
                              ?>" required>

                               <input type="time" id="t1" name="t1"  class="form-control t1"  placeholder="prenom" value="<?php if (isset($_POST['t1']) and !empty($_POST['t1']))
                                             echo  $_POST['t1'];
                                             else
                                              echo '';  
                              ?>" required>

                             <input type="date" id="dn2" name="dn2"  class="form-control dn2"  placeholder="prenom" value="<?php if (isset($_POST['dn2']) and !empty($_POST['dn2']))
                                             echo  $_POST['dn2'];
                                             else
                                              echo '';  
                              ?>" required>
                                 <input type="time" id="t2" name="t2"  class="form-control t2"  placeholder="prenom" value="<?php if (isset($_POST['t2']) and !empty($_POST['t2']))
                                             echo  $_POST['t2'];
                                             else
                                              echo '';  
                              ?>" required>  
                          <select  name="user" id="user" class="form-control user" style="border-radius:20px;" >
                            <option ></option>
                             <?php 
                                 
                                   $con = dbConnect() ;
                                   $p=$con->prepare('select * from user where user_statut="actif" ');
                                                                                                                    
                                   $p->execute();
                                                                                                                    
                                 for ($d=0; $d<$p->rowcount(); $d++)
                                 {
                                    $m=$p->fetch(); ?>
                               <option id='rec' value="<?php echo $m['user_id']; ?>"
                                              <?php if (isset($_POST['user']) and !empty($_POST['user']) and $m['user_id']==$_POST['user']  )
                                                echo "selected";
                                               ?> >
                                              <?= $m['user_nom'] ?>&nbsp;<?= $m['user_prenom'] ?></option>
                                                                                                                            
                             <?php     }    ?> 
                           </select> 

                               <button type="submit"  class="btn btn-info"    name="Recherche"  id="cherche"><i class="fa fa-search" title="Recherche"></i></button>
                           </div>
                        
                            </form>
                      </br>
                        <input type="text" id="sp" name="sp"  class="form-control col-lg-6 col-md-6 sp"  placeholder="seach...." > 
                      </br>      

                   <div class="well"><!-- target="_blank" -->
                                       
                                        <a class="btn btn-default btn-lg btn-block"  href="#">JOURNAL DE SORTIE</a>
                                    </div>
                 
                   <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-default">
                                <div class="card-heading">
                                    
                                </div>
                                <!-- /.card-heading -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                         <div style="height: 400px;overflow: auto;">
                                        <table class="table example table-striped table-bordered table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Code_Produit </th>
                                                    <th>Nom </th>
                                                     <th>Tab</th>
                                                     <th>SV</th>
                                                    <th>Designation</th>
                                                    <th>Prix de vente</th>
                                                    <th>Quantité</th>
                                                    <th>Total</th>
                                                    <th>Date sortie</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php 
                                                $q=all_sortie2(); 
                                                 $d=0;
                                                 $t=0;
                                                 $tot=0;
                                                 $som=0;
                                               if (!isset($_POST['dn1']) and empty($_POST['dn1'])) {
                                                  while ($data=$q->fetch()) {  $d++; ?>
                                                <tr class="odd gradeX">
                                                    <?php
                                                     $som=$data['p_px'];  
                                                     $t= $som *  $data['v_q'];
                                                     $tot+= $t ;
                                                     ?> 
                                                    <td><?= $data['v_code'] ?> </td>
                                                    <td><?= $data['nom'] ?> </td>
                                                    <td id="nom"><?= $data['t_nom'] ?></td>
                                                     <td id="cd"><?= $data['user_nom'] ?> <?= $data['user_prenom'] ?></td>
                                                    <td><?= $data['p_nom'] ?></td>
                                                    <td><?= $data['p_px'] ?>fbu</td>
                                                    <td class="center"><?= $data['v_q'] ?></td>
                                                     <td class="center"><?= $t ?>fbu</td>
                                                    <td class="center"><?= $data['v_date'] ?></td>
                                                </tr>
                                               <?php }  }
                                               else
                                                 {

                                                  $q=all_sortie4($_POST['dn1'],$_POST['dn2'],$_POST['t1'],$_POST['t2']); 
                                                  if (isset($_POST['user']) and !empty($_POST['user'])) {
                                                      $q=all_sortie6($_POST['dn1'],$_POST['dn2'],$_POST['t1'],$_POST['t2'],$_POST['user']); 
                                                  }
                                                   while ($data=$q->fetch()) {  $d++; ?>
                                                <tr class="odd gradeX">
                                                    <?php
                                                     $som=$data['p_px'];  
                                                     $t= $som *  $data['v_q'];
                                                     $tot+= $t ;
                                                     ?> 
                                                    <td><?= $data['v_code'] ?> </td>
                                                    <td><?= $data['nom'] ?> </td>
                                                    <td id="nom"><?= $data['t_nom'] ?></td>
                                                     <td id="cd"><?= $data['user_nom'] ?> <?= $data['user_prenom'] ?></td>
                                                    <td><?= $data['p_nom'] ?></td>
                                                    <td><?= $data['p_px'] ?>fbu</td>
                                                    <td class="center"><?= $data['v_q'] ?></td>
                                                     <td class="center"><?= $t ?>fbu</td>
                                                    <td class="center"><?= $data['v_date'] ?></td>
                                                </tr>
                                              <?php }}
                                               ?>

                                              <tr class="odd gradeX">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"></td>
                                                     <td class="center">Total=<?= $tot ?>fbu</td>
                                                    <td class="center"></td>
                                                </tr>
                                              
                                            </tbody>
                                        </table>
                                     </div>
                                    </div>
                                    <div class="well"><!-- target="_blank" -->
                                       
                                        <a class="btn btn-default btn-lg btn-block"  href="#">Total=<?= $tot ?>fbu</a>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div> 
                    
                </div>
            </div>

                        
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
      
       <?php include("views/partials/pied.php"); ?>
         
      
     <!-- end js include path -->
       
  <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });

                $(".sp").on("keyup", function() {
                 
                var value = $(this).val().toLowerCase();
                $(".example tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });


            });
        </script>  
<script type="text/javascript"></script>     
       
</body>

<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_professors.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Apr 2018 12:37:30 GMT -->
</html>
