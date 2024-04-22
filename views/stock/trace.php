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
                                            <span>la page permet d'avoir le rapport des boissons</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php?action=home"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">rapport boisson</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">rapport boisson</li>
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
                             <input type="date" id="dn2" name="dn2"  class="form-control dn2"  placeholder="prenom" value="<?php if (isset($_POST['dn2']) and !empty($_POST['dn2']))
                                             echo  $_POST['dn2'];
                                             else
                                              echo '';  
                              ?>" required>                                                     <button type="submit"  class="btn btn-info"    name="Recherche"  id="cherche"><i class="fa fa-search" title="Recherche"></i></button>
                           </div>
                            </form>

                   <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-default">
                                <div class="card-heading">
                                   
                                </div>
                                <!-- /.card-heading -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                         <div style="height: 400px;overflow: auto;">
                                        <table class="example table-striped table-bordered table-hover" >
                                             <thead>
                                                <tr>
                                                    <th>Code_Produit </th>
                                                    <th>Designation</th>
                                                    <th>Prix d'achat'</th>
                                                    <th>Prix de vente</th>
                                                    <th>Quantité</th>
                                                    <th>Date entree</th>
                                                    <th>Statut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php 
                                                $q=all_entree(); 
                                                 $d=0;
                                                    if (!isset($_POST['dn1']) and empty($_POST['dn1'])) {
                                                  while ($data=$q->fetch()) {  $d++; ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $data['code_pr'] ?> </td>
                                                    <td><?= $data['designation'] ?></td>
                                                    <td><?= $data['prix_a'] ?>fbu</td>
                                                    <td><?= $data['prix_v'] ?>fbu</td>
                                                    <td class="center"><?= $data['pr_q'] ?></td>
                                                    <td class="center"><?= $data['date_pr'] ?></td>
                                                    <td class="center"><?= $data['etat'] ?></td>
                                                </tr>
                                               <?php }  }
                                                 else
                                                 {
                                                    $q=all_entree2($_POST['dn1'],$_POST['dn2']);
                                                  while ($data=$q->fetch()) {  $d++; 
                                                   ?>
                                                   <tr class="odd gradeX">
                                                    <td><?= $data['code_pr'] ?> </td>
                                                    <td><?= $data['designation'] ?></td>
                                                    <td><?= $data['prix_a'] ?>fbu</td>
                                                    <td><?= $data['prix_v'] ?>fbu</td>
                                                    <td class="center"><?= $data['pr_q'] ?></td>
                                                    <td class="center"><?= $data['date_pr'] ?></td>
                                                    <td class="center"><?= $data['etat'] ?></td>
                                                </tr>
                                            <?php } } ?> 
                                              
                                            </tbody>
                                        </table>
                                      </div>
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


  

            });
        </script>  
<script type="text/javascript"></script>     
       
</body>

<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_professors.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Apr 2018 12:37:30 GMT -->
</html>
