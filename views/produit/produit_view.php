<?php

if (empty( $_SESSION['photo'])) {
   $page="index.php?action=login";
   header('location:'.$page);

} 
  ?>
<?php include("views/partials/head_link.php"); ?>

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
            
            <div class="page-content-wrapper">
            
                <div class="page-content">
                  
                    <div class="row">
                        <div class="col-md-12">

                            <div class="tabbable-line">
                             
                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                       

                                          <div class="row">
                                             <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-6">
                                                                <div class="btn-group">
                                                                    <a href=""
                                                                    class="btn btn-dark" data-toggle="modal" data-toggle="modal" data-target="#ajouter"  id="ajout">
                                                                        Ajouter <i class="fa fa-plus"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                          </div>
                                          <div class="table-scrollable">
                                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                            <thead>
                                                               
                                                                <tr>
                                                                    <th>
                                                                    

                                                                    </th>
                                                                    <th>Nom</th>
                                                                    <th>Prenom</th>
                                                                    <th>Adresse</th>
                                                                    <th>Tel
                                                                    </th>
                                                                    
                                                                    <th> Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <?php
                                                 $q=all_boss();

                                                  while ($data=$q->fetch()) : ?>
                                                                <tr class="odd gradeX">
                                                                    <td class="patient-img">
                                                                    <img src="<?= $data['bs_photo'] ?>" class="doctor-pic" alt="">     
                                                                    </td>
                                                                    <td><?= $data['bs_nom'] ?>
                                                                        
                                                                    </td>
                                                                    <td class="left"><?= $data['bs_prenom'] ?></td>
                                                                    <td class="left"><?= $data['bs_adresse'] ?></td>
                                                                    
                                                                    <td class="left"><?= $data['bs_tel'] ?>  Mobile </td>
                                                                      
                                                                     <td>

                                                                      <a href="#" id="<?= $data['bs_id'] ?>" class="btn btn-dark btn-xs voir">
                                                                 <i class="fa fa-eye"></i>
                                                                 </a>
                                                                 <a href="#" id="<?= $data['bs_id'] ?>" class="btn btn-primary btn-xs update">
                                                                 <i class="fa fa-pencil"></i>
                                                                  </a>
                                                                  <a href="#" id="<?= $data['bs_id'] ?>" class="btn btn-pink btn-xs delete">
                                                                  <i class="fa fa-trash-o "></i>
                                                                  </a>
                                                                    </td>
                                                                </tr>
                                                             <?php endwhile;   
                                                              $q->closeCursor();

                                                              ?>
                                                            </tbody>
                                                        </table>
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
           
                        <!-- End boss Chat --> 
                        <!-- Start Setting Panel --> 
                        
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("views/modale/boss/boss_modale.php"); ?>
       <?php include("views/partials/pied.php"); ?>
      
     <!-- end js include path -->
<script src="public/views/script/croppie.js" ></script>     
<script type="text/javascript">  
 function refreshPage() { 
        location.reload(); 
    }  
 $(document).ready(function(){
  
   $("#ajout").on('click', function(){

  $('#admin')[0].reset();
    $('.modal-title').text("Ajouter Utilisateur");
    $('#save').val("Enregistrer");
  $("#ajouter").modal('show');
    $('#operation').val("add");
  $('#imge').html("");
   $('#imge1').html("");
 
 });
// $("#er").on('click', function(){
//     var ph=$('#voir_photo').val();

//    $('#imge1').html("<img src='"+ph+"' 'class="'img-responsive img-thumbnail'" width='120px' />");
 
//  });

 $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }    
  });
   $('#voir_photo').on('change', function(){
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
 
 $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $("#photo").val(response);
      $('#insertimageModal').modal('hide');

  });
});     

 $(document).on('submit','#admin',function(event){
       event.preventDefault();
     

      $.ajax({
        
         url:'views/script/boss/boss_insert.php',
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

$(document).on('click','.voir',function(){
     
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
  new Dialogify('views/script/boss/boss_view.php', options)
   .title('Utilisateur details')
   .showModal();

});    

$(document).on('click','.delete',function(event){
    var id=$(this).attr("id");
    Dialogify.confirm('voulez-vous vraiment supprimer cette personne?', {

    ok:function(){
      $.ajax({
      
       url:'views/script/boss/boss_delete.php',
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
      
       url:'views/script/boss/boss_update',
       method:'POST',
       data:{id:id} ,
       dataType:"json",
       success:function(data){
            $('#admin')[0].reset();
          $('#ajouter').modal('show');

          $('#id').val(data.id);
          $('#nom').val(data.nom);
          $('#prenom').val(data.prenom);
          $('#adresse').val(data.adresse);
          $('#phone').val(data.numero);
          $('#sexe').val(data.sexe);
          $('#imge1').html(data.photo1);
          $('#imge').hide();
          $('#photo_hidden').val(data.photo);

          $('.modal-title').text("Modifier Utilisateur");
          $('#save').val("Modifier");
          $('#operation').val("edit");         
       datatable.ajax.reload();
       }

    }); 

});


// $("#s").on("keyup", function() {
    $(".s2").on("click", function() {
    var val = $("#s").val();
    var val2  = $("#s1").val().toLowerCase();
    if (val !="") {
     if(val){
      $.ajax({
      type:'POST',
      url:'views/script/boss_voir.php',
      data:{val:val,val2:val2 },
      success:function(data){
        if (data) {$('.vrow').html(data);}
        else{
            alert('verifiez vos parametre');}
             
      }
      });
    }
    else{
      alert('verifiez votre orthographe');
      
      
    }
     }
  });


  });
</script>       
</body>

<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_professors.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Apr 2018 12:37:30 GMT -->
</html>