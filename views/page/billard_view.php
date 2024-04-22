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
                                            <h5>Billard</h5>
                                            <span>la page permet de faire l’enregistrement de 
                                            payements des jeux du Billard</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php?action=home"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">Billard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Billard</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                   <br>
                   <?php
                                  if($ver_P[17][0]=="billard" and  $ver_P[17][1]==1) {?>
                      <div class="row">
                         <div class="col-md-4 col-sm-4 col-4">
                             <div class="btn-group">
                                              
                                     <button type="button" class="btn " style="background-color:#587187;" data-toggle="modal" data-toggle="modal" data-target="#ajouter" title="ajouter un batteau" id="ajout">
                                         <i class="fa fa-plus"></i>
                                        Ajouter un jouère</button>&nbsp;
                                           
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
                            <div class="panel panel-default">
                               
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                         <div style="height: 400px;overflow: auto;">
                                        <table  class="table example table-striped table-bordered table-hover" id="example1">
                                            <thead style="background-color:#587187;">
                                               <tr>
                                                    <th>N</th>
                                                    <th>Noms</th>
                                                    <th>Nombre</th>
                                                    <th>prix</th>
                                                    <th>Statut</th>
                                                    <th>Date</th>
                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php 
                                             
                                                $dp=all_billard();  
                                                $i=0;
                                                $tot=0;    
                                                if (!isset($_POST['dn1']) and empty($_POST['dn1'])) { 
                                                  while ($data=$dp->fetch()){ 
                                                  $i=$i+1;
                                                  $tot+=$data['b_px'];
                                                   ?>
                                                      <tr class="odd gradeX">
                                                    <td id="cd"><?= $i ?></td>
                                                    <td id="cd"><?= $data['b_nom'] ?></td>
                                                    <td id="nom"><?= $data['b_nb'] ?></td>
                                                    <td id="nom"><?= $data['b_px'] ?>fbu</td>
                                                    <td id="pt"><?= $data['b_statut'] ?></td>
                                                    <td id="pn"><?= $data['b_date'] ?></td>
                                                     <td id="ds" class="center">
                                                      <?php
                                                          if($ver_P[17][0]=="billard" and 
                                                           $ver_P[17][4]==1) {?>
                                                     <a href="#" id="<?= $data['b_id'] ?>" class="btn btn-warning btn-xs update">
                                                        <i class="ik ik-edit-2"></i>
                                                      </a>
                                                      <?php }?>
                                                      <?php
                                                          if($ver_P[17][0]=="billard" and 
                                                           $ver_P[17][3]==1) {?>
                                                     <a href="#" id="<?= $data['b_id'] ?>" class="btn btn-pink btn-xs delete">
                                                      <i class="ik ik-trash-2"></i>
                                                     </a>
                                                     <?php }?>
                                                     <?php
                                                          if($ver_P[17][0]=="billard" and 
                                                           $ver_P[17][1]==1) {?>
                                                      <a href="#" id="<?= $data['b_id'] ?>" class="btn btn-info btn-xs print">
                                                        <i class="ik ik-printer"></i>
                                                      </a>             
                                                     <?php }?> 
                                                    </td>
                                                   
                                                     </tr>
                                               <?php }  }
                                                 else
                                                 {
                                                  $dp=all_billard2($_POST['dn1'],$_POST['dn2']); 
                                                 while ($data=$dp->fetch()){ 
                                                  $i=$i+1;
                                                  $tot+=$data['b_px'];
                                                   ?>
                                                      <tr class="odd gradeX">
                                                    <td id="cd"><?= $i ?></td>
                                                    <td id="cd"><?= $data['b_nom'] ?></td>
                                                    <td id="nom"><?= $data['b_nb'] ?></td>
                                                    <td id="nom"><?= $data['b_px'] ?>fbu</td>
                                                    <td id="pt"><?= $data['b_statut'] ?></td>
                                                    <td id="pn"><?= $data['b_date'] ?></td>
                                                        <td id="ds" class="center">
                                                     <?php
                                                          if($ver_P[17][0]=="billard" and 
                                                           $ver_P[17][4]==1) {?>
                                                     <a href="#" id="<?= $data['b_id'] ?>" class="btn btn-warning btn-xs update">
                                                        <i class="ik ik-edit-2"></i>
                                                      </a>
                                                      <?php }?>
                                                      <?php
                                                          if($ver_P[17][0]=="billard" and 
                                                           $ver_P[17][3]==1) {?>
                                                     <a href="#" id="<?= $data['b_id'] ?>" class="btn btn-pink btn-xs delete">
                                                      <i class="ik ik-trash-2"></i>
                                                     </a>
                                                     <?php }?>
                                                     <?php
                                                          if($ver_P[17][0]=="billard" and 
                                                           $ver_P[17][1]==1) {?>
                                                      <a href="#" id="<?= $data['b_id'] ?>" class="btn btn-info btn-xs print">
                                                        <i class="ik ik-printer"></i>
                                                      </a>             
                                                     <?php }?>               
                                                      
                                                    </td>
                                                   
                                                     </tr>
                                                     <?php 
                                                 }}  ?>
                                                 <tr class="odd gradeX">
                                                    <td id="cd">Total</td>
                                                    <td id="cd"></td>
                                                    <td id="nom"></td>
                                                    <td id="nom"><?= $tot ?>fbu</td>
                                                    <td id="pt"></td>
                                                    <td id="pn"></td>
                                                    <td id="ds" class="center"> </td>
                                                   </tr>
                                            </tbody>
                                        </table>
                                     </div>
                                    </div>
                                  
                                    
                                </div>
                              
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div> 
                                 
                    
                </div>
            </div>

                        
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
         <?php include("views/modale/page/billard_modale.php"); ?>
         <?php include("views/modale/page/print_modale.php"); ?>
        <?php include("views/partials/pied.php"); ?>
      
         
      
     <!-- end js include path -->
<script src="public/js/tableHTMLExport.js"></script>

  <script src="public/js/jspdf.min.js"></script>
  <script src="public/js/jspdf.plugin.autotable.min.js"></script>
 <script src="public/js/pdfmake.min.js"></script>
<script src="public/js/html2canvas.min.js"></script>
<script src="public/dialog/js/dialogify.min.js"></script>   
  <script src="public/views/script/croppie.js" ></script>

<script type="text/javascript">  
 function refreshPage() { 
        location.reload(); 
    }  
 $(document).ready(function(){
  
   $(document).on('click','#ajout', function(){

  $('#stock')[0].reset();
    $('.modal-title').text("Ajouter");
    $('#save').val("Enregistrer");
     $("#ajouter").modal('show');
    $('#operation').val("add");
 
 
 });

 

$(document).on('submit','#stock',function(event){
       event.preventDefault();
     

      $.ajax({
        
         url:'views/script/billard/insert.php',
         method:'POST',
         data:new FormData(this),
         contentType:false,
         processData:false,
         dataType:"json",
         success:function(data){
            if(data.success==true){
                Swal.fire(
                  'Reussi!',
                  '',
                  'success'
                )
            
            }else{
                 
                  Swal.fire({
                icon: 'error',
                title: '',
                text: 'echouée',
                footer: ''
              })
            }
              $('#ajouter').modal('hide');
              setInterval('refreshPage()', 2000);
         }

    }); 
 

}); 

$(document).on('click','.voir_user',function(){
     
  var id = $(this).attr('id');
 
  var options = {
   ajaxPrefix: '',
   ajaxData: {id:id},
   ajaxComplete: function(){
    this.buttons([{
     type: Dialogify.BUTTON_PRIMARY
    }]);
   }
  };
  new Dialogify('views/script/user/user_view.php', options)
   .title('Utilisateur details')
   .showModal();

}); 

$(document).on('click','.pt',function(event){

             var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
       
 });  

$(document).on('click','.print',function(event){
    var id=$(this).attr("id");
      $.ajax({
       
       url:'views/script/billard/print.php',
       method:'POST',
       data:{id:id} ,
      
       success:function(data){
          
        
         
         $('#print').modal('show');
         $('#getA').html(data);         
          //datatable.ajax.reload();
       }

    });
 
 });  

$(document).on('click','.delete',function(event){
    var id=$(this).attr("id");
    Dialogify.confirm('voulez-vous vraiment supprimer?', {

    ok:function(){
      $.ajax({
      
       url:'views/script/billard/delete.php',
       method:'POST',
       data:{id:id} ,
       dataType:"json",
       success:function(data){
        if(data){
             Swal.fire(
                  'Reussi!',
                  '',
                  'success'
                )  
            }else{
              Swal.fire(
                  'Reussi!',
                  '',
                  'success'
                )
            }
        
       setInterval('refreshPage()', 2000);
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
      
       url:'views/script/billard/update.php',
       method:'POST',
       data:{id:id} ,
       dataType:"json",
       success:function(data){
            $('#stock')[0].reset();
             $('#save').val("modifier");
          $('#ajouter').modal('show');

          $('.id').val(data.id);
          $('.nom').val(data.nom);
          $('.px').val(data.px);
          $('.nb').val(data.nb);
                  
       datatable.ajax.reload();
       }

    }); 

});
$('.nom').blur(function(){

     var sg = $(this).val();

     $.ajax({
      url:'views/script/check/check.php',
      method:"POST",
      data:{sg:sg},
      success:function(data)
      {
       if(data != '0')
       {
        $('#num').html('<span class="btn btn-xs btn-danger">le nom existe</span>');
        $('#save').attr("disabled", true);
       }
       else
       {
        $('#num').html('<span class="btn btn-xs btn-success">nom correct</span>');
        $('#save').attr("disabled", false);
       }
      }
     });

  });

// $("#s").on("keyup", function() {
 


  });
</script>       
   
       
</body>

</html>
