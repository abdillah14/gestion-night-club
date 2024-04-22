<?php

if (empty($_SESSION["nom"])) {
   $page="index.php?action=login";
   header('location:'.$page);

} 
  ?><?php include("views/partials/head_link.php"); ?>

    <div class="page-wrapper">
        <!-- start header -->
    <?php include("views/partials/tete.php"); ?>    

        <!-- end header -->
        <!-- start color quick setting -->
       
   <?php include("views/partials/color.php"); ?>
       
        <!-- end color quick setting -->
        <!-- start page container -->
        <div class="page-container">
            <!-- start sidebar menu -->
        <?php include("views/partials/sidebar.php"); ?> 
             <!-- end sidebar menu -->
            <!-- start page content -->
           <!-- start page content -->
           

        <div class="page-content-wrapper">
                <div class="page-content">
                     <div class="well"><!-- target="_blank" -->
                                       
                                        <a class="btn btn-default btn-lg btn-block"  href="#">DÎME MENSUEL </a>
                                    </div>
                 

                  
                
                 
                   <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                         <div style="height: 400px;overflow: auto;">
                                        <table class="table table-striped table-bordered table-hover" id="example1">
                                            <thead>
                                                <tr> 
                                                    <th>Code_Produit </th>
                                                    <th>Designation</th>
                                                    <th>Prix de vente</th>
                                                    <th>Quantité</th>
                                                    <th>Date sortie</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php 
                                                $dat =(new DateTime())->format('Y-m-d H:i:s');
                                                $date=date('Y/m', strtotime($dat));
                                                $q=all_sortie(); 
                                                 $d=0;
                                                  $dd=0;
                                                  $var=0;
 
                                                  while ($data=$q->fetch()) :  $d++; ?>
                                                <tr class="odd gradeX">
                                                    <?php $b=date('Y/m', strtotime($data['date_s'])); ?>
                                                     <?php if ($date==$b) {
                                                       $d = $data['prix_v'] - $data['prix_a'];
                                                       $var += $d * $data['pr_qs'];
                                                        
                                                   ?>
                                                    
                                                    <td><?= $data['code_pr'] ?> </td>
                                                    <td><?= $data['designation'] ?></td>
                                                    <td><?= $data['prix_v'] ?>$</td>
                                                    <td class="center"><?= $data['pr_qs'] ?></td>
                                                    <td class="center"><?= $data['date_s'] ?></td>
                                                   <?php  }  ?>
                                                </tr>
                                               <?php endwhile;   
                                                 $q->closeCursor(); 
                                                  $dd=$var*0.1;
                                                 ?> 
                                              
                                            </tbody>
                                        </table>
                                     </div>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div> 
                       <div class="well"><!-- target="_blank" -->
                                       
                                        <a class="btn btn-dark btn-lg btn-block"  href="#">MONTANT TOTAL =
                                        <?=$dd; ?> $</a>
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
