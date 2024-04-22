<?php

if (empty( $_SESSION['nom'])) {
   $page="index.php?action=login";
   header('location:'.$page);

} 
  ?>
   <style> 
        input.largerCheckbox { 
            width: 40px; 
            height: 40px; 
        } 
    </style>  
<?php include("views/partials/head_link.php"); ?>

  
       
       
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
                                            <h5>Plat</h5>
                                            <span>la page permet de faire l’enregistrement de Plats</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php?action=home"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">Plat</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Plat</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div><br>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-6">
                                             <div class="btn-group">
                                                 <?php
                                                   if($ver_P[4][0]=="plat" and  $ver_P[4][1]==1) {?>
                                                 <button type="button" class="btn btn-dark" data-toggle="modal" data-toggle="modal" data-target="#ajouter"  id="ajout">
                                                 <i class="fa fa-plus"></i>Ajouter un Plat
                                                </button>
                                                 <?php }?>
                                             </div>
                                             </div>
                                             <div class="form-group col-md-4">
                                             <input type="text" style="color:green; font-weight:bold; border-radius: 20px;" id="s" class="form-control sh" placeholder="Seach..." name="query" required>
                                             </div>
                                            <!--  <form  class="search-form-opened" action="#" method="GET">
                                                <div class="input-group" style="color:black; font-weight:bold;">
                                                    <input type="text" id="s" class="form-control" placeholder="Profile..." name="query" required>
                                              <span class="input-group-btn">
                                                      <a href="javascript:;" class="btn submit">
                                                         <i class="icon-magnifier"></i>
                                                       </a>
                                                    </span> 
                                                </div>
                                               </form> -->
                                              
                                               
                                          </div>
                                         <br>
                                          <div class="row vrow">
                                          </div>
                                          <div class="row " style="height: 500px;overflow: auto;">
                                        
                                           <?php
                                                 $q=all_plat();

                                                  while ($data=$q->fetch()) : ?>
                                        
                                            <div id="fs" class="col-md-3">
                                                <div  class="card card-box">
                                                    <div  class="card-body no-padding ">
                                                        <div  class="doctor-profile">
                                                          
                                                              <img src="<?= $data['p_img'] ?>" class="img-responsive img-thumbnail" />
                                                            <div class="profile-bstitle">
                                                              <div  class="doctor-name">
                                                            <!-- <font size="4"> -->
                                                            <?= $data['p_nom'] ?>--<?= $data['p_px'] ?>fbu
                                                            <!-- </font> --></div>
                                                                
                                                                <div class="name-center">

                                                        <?= $data['p_date'] ?></div>
                                                            </div>
                                                              
                                                     </div>
                                                            <div class="profile-userbuttons">
                                                                
                                                                   <?php
                                                                  if($ver_P[4][0]=="plat" and 
                                                                     $ver_P[4][4]==1) {?>
                                                                 <a href="#" id="<?= $data['p_id'] ?>" class="btn btn-primary btn-xs update">
                                                                 <i class="ik ik-edit-2"></i>
                                                                  </a>
                                                                    <?php }?>
                                                                     <?php
                                                                  if($ver_P[4][0]=="plat" and 
                                                                     $ver_P[4][3]==1) {?>
                                                                  <a href="#" id="<?= $data['p_id'] ?>" class="btn btn-danger btn-xs delete">
                                                                  <i class="ik ik-trash-2"></i>
                                                                  </a>
                                                                  <?php }?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endwhile;

                                                              $q->closeCursor();

                                                              ?>
                                            </div>
                                        
                                         
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
           
                        <!-- End user Chat --> 
                        <!-- Start Setting Panel --> 
                        
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("views/modale/page/plat_modale.php"); ?>
       
         
       
       <?php include("views/partials/pied.php"); ?>
       <script src="public/crop/croppie.js" ></script>
       <script src="public/dialog/js/dialogify.min.js"></script> 
     <!-- end js include path -->

<script type="text/javascript">  
 function refreshPage() { 
        location.reload(); 
    }  
 $(document).ready(function(){
   

    $(".sh").on("keyup", function() {

    var value = $(this).val().toLowerCase();
    $("#fs div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  
   $('.img').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#insertimageModal').modal('show');
  });

   

  
   $("#ajout").on('click', function(){

  $('#admin')[0].reset();
    $('.modal-title').text("Ajouter Profile");
    $('#save').val("Enregistrer");
  $("#ajouter").modal('show');
    $('#operation').val("add");
  $('#imge').html("");
   $('#imge1').html("");
 
 });


 $(document).on('submit','#stock',function(event){
       event.preventDefault();
     

      $.ajax({
        
         url:'views/script/plat/insert.php',
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

 

$(document).on('click','.delete',function(event){
    var id=$(this).attr("id");
    Dialogify.confirm('voulez-vous vraiment supprimer le plat?', {

    ok:function(){
      $.ajax({
      
       url:'views/script/plat/delete.php',
       method:'POST',
       data:{id:id} ,
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
      
       url:'views/script/plat/update.php',
       method:'POST',
       data:{id:id} ,
       dataType:"json",
       success:function(data){
            $('#stock')[0].reset();
          $('#ajouter').modal('show');

          $('#id').val(data.id);
          $('.pa').val(data.pa);
          $('.ds').val(data.ds);
          $('.im').html(data.ds);
          $('.photo_hidden').val(data.img);

          $('.modal-title').text("Modifier le plat");
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