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
                                            <h5>Depense</h5>
                                            <span>la page permet de faire l’enregistrement de Depenses</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php?action=home"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">Depense</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Depense</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                          <?php
                         if($ver_P[19][0]=="depense" and  $ver_P[19][1]==1) {?>
                         <div class="row">
                         <div class="col-md-6 col-sm-6 col-6">
                             <div class="btn-group">
                                 <a href=""class="btn btn-dark" data-toggle="modal" data-toggle="modal" data-target="#ajouter"  id="ajout">
                                     Ajouter un depense <i class="fa fa-plus"></i>
                                 </a>
                             </div>
                         </div>
                    </div>
                    <?php }?>
                     </br>
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
                      </br>                 
                 
                   <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-default">
                                <div class="card-heading">
                                    
                                </div>
                                <!-- /.card-heading -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                         <div style="height: 400px;overflow: auto;">
                                        <table class="table  table-striped example table-bordered table-hover" id="example1">
                                            <thead>
                                                <tr> 
                                                    <th></th>
                                                    <th>Details</th>
                                                    <th>Montant</th>
                                                    <th>date</th>
                                                     <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php 
                                                $dat =(new DateTime())->format('Y-m-d H:i:s');
                                                $date=date('Y/m', strtotime($dat));
                                                $q=all_dp();
                                                $dp=all_vente();  
                                                 $ddd=0;
                                                  $dd=0;
                                                  $var=0; 
                                                  $som=0;
                                                  $tot=0;
                                                  if (!isset($_POST['dn1']) and empty($_POST['dn1'])) { 
                                                  ?>
 
                                                  <?php while ($data=$q->fetch()) {  ?>
                                                <tr class="odd gradeX">
                                                    <?php 
                                                    $ddd++;
                                                    $som += $data['montant'];
                                                  ?>
                                                    <td><?= $ddd ?> </td>
                                                    <td><?= $data['detail'] ?></td>
                                                    <td><?= $data['montant'] ?>fbu</td>
                                                    <td class="center"><?= $data['date_dp'] ?></td>
                                                    <td class="center">
                                                      <?php
                                                       if($ver_P[19][0]=="depense" and 
                                                           $ver_P[19][4]==1) {?>             
                                                     <a href="#" id="<?= $data['id'] ?>" class="btn btn-primary btn-xs update">
                                                     <i class="ik ik-edit-2"></i>
                                                      </a>
                                                       <?php }?>
                                                       <?php
                                                       if($ver_P[19][0]=="depense" and 
                                                           $ver_P[19][3]==1) {?>
                                                      <a href="#" id="<?= $data['id'] ?>" class="btn btn-pink btn-xs delete">
                                                      <i class="ik ik-trash-2"></i>
                                                      </a>
                                                      <?php }?>
                                                    </td>
                                                   
                                                </tr>
                                               <?php }  }
                                                 else
                                                 {
                                                  $q=all_dp2($_POST['dn1'],$_POST['dn2']);
                                                 while ($data=$q->fetch()) {  ?>
                                                <tr class="odd gradeX">
                                                    <?php 
                                                    $ddd++;
                                                    $som += $data['montant'];
                                                   ?>
                                                     
                                                    
                                                    <td><?= $ddd ?> </td>
                                                    <td><?= $data['detail'] ?></td>
                                                    <td><?= $data['montant'] ?>fbu</td>
                                                    <td class="center"><?= $data['date_dp'] ?></td>
                                                    <td class="center">
                                                                   
                                                     <?php
                                                       if($ver_P[19][0]=="depense" and 
                                                           $ver_P[19][4]==1) {?>             
                                                     <a href="#" id="<?= $data['id'] ?>" class="btn btn-primary btn-xs update">
                                                     <i class="ik ik-edit-2"></i>
                                                      </a>
                                                       <?php }?>
                                                       <?php
                                                       if($ver_P[19][0]=="depense" and 
                                                           $ver_P[19][3]==1) {?>
                                                      <a href="#" id="<?= $data['id'] ?>" class="btn btn-pink btn-xs delete">
                                                      <i class="ik ik-trash-2"></i>
                                                      </a>
                                                      <?php }?>
                                                    </td>
                                                   
                                                </tr>
                                                <?php 
                                                 }}  ?>
                                                 <tr class="odd gradeX">
                                                    <td></td>
                                                    <td>Total=</td>
                                                    <td><?= $som ?>fbu</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                     </div>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div> 
                                 <div class="well"><!-- target="_blank" -->
                                       
                                        
                                        <a class="btn btn-pink btn-lg btn-block"  href="#">DEPENSE =
                                        <?=$som; ?>fbu</a>
                                       
                                    </div>
                    
                </div>
            </div>

                        
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("views/modale/dp/dp_modale.php"); ?>
        <?php include("views/partials/pied.php"); ?>
         
      
     <!-- end js include path -->
<script src="public/views/script/croppie.js" ></script>  
    
<script type="text/javascript">  
 function refreshPage() { 
        location.reload(); 
    } 

 $(document).ready(function(){


  $(document).on('click','#ajout',function(event){
  

  $('#dp')[0].reset();
    $('.modal-title').text("Ajout depense");
    $('#save').val("Enregistrer");
  $("#ajouter").modal('show');
    $('#operation').val("add");
  $('#imge').html("");
   $('#imge1').html("");
 
 });

 $(document).on('submit','#dp',function(event){
       event.preventDefault();
     
      $.ajax({
        
         url:'views/script/dp/dp_insert.php',
         method:'POST',
         data:new FormData(this),
         contentType:false,
         processData:false,
         dataType:"json",
         success:function(data){
            if(data){
                Swal.fire(
                  'Reussi!',
                  '',
                  'success'
                )
                $('#ajouter').modal('hide');
              setInterval('refreshPage()', 1000);
            
            }else{
                 
                  Swal.fire({
                icon: 'error',
                title: '',
                text: 'verifiez vos informations',
                footer: ''
              })
            }
              
         }

    }); 


}); 
    

$(document).on('click','.delete',function(event){
    var id=$(this).attr("id");
    Dialogify.confirm('voulez-vous vraiment supprimer le produit?', {

    ok:function(){
      $.ajax({
      
       url:'views/script/dp/dp_delete.php',
       method:'POST',
       data:{id:id} ,
       dataType:"json",
       success:function(data){
        if(data.success==true){
            Swal.fire({
                icon: 'error',
                title: '',
                text: 'echouée',
                footer: ''
              })
       
            }else{
                   Swal.fire(
                  'Reussi!',
                  '',
                  'success'
                )
               
               
            }
        
       setInterval('refreshPage()', 1000);
       }

    });
  },

  cancel:function(){
    return false;
  }
});

});

 $(document).on('click','.update',function(event){
     
     
     var id=$(this).attr("id");
     
     $.ajax({
      
       url:'views/script/dp/dp_update',
       method:'POST',
       data:{id:id} ,
       dataType:"json",
       success:function(data){
            $('#dp')[0].reset();
          $('#ajouter').modal('show');

        
           $('#id').val(data.id);
          $('#mt').val(data.mt);
          $('#ds').val(data.ds);
          

          $('.modal-title').text("Modifier");
          $('#save').val("Modifier");
          $('#operation').val("edit");         
       datatable.ajax.reload();
       }

    }); 

});




  });
</script> 
   
       
</body>

<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_professors.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Apr 2018 12:37:30 GMT -->
</html>
