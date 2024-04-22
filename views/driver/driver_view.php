
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
                                    		<div class="col-md-3 col-sm-3 col-6">
					                         <div class="btn-group">
					                             <button type="button" class="btn btn-dark" data-toggle="modal" data-toggle="modal" data-target="#ajouter"  id="ajout">
												 <i class="fa fa-plus"></i>
												</button>
					                         </div>
					                         </div>
                                    		 <form class="search-form-opened" action="#" method="GET">
							                    <div class="input-group">
							                        <input type="text" id="s" class="form-control" placeholder="Nom..." name="query" required>
                                                    <!--  <span class="input-group-btn">
							                          <a href="javascript:;" class="btn submit">
							                             <i class="icon-magnifier"></i>
							                           </a>
							                        </span> -->
							                    </div>
							                   </form>
							                   <form class="search-form-opened" action="#" method="GET">
							                    <div class="input-group">
							                        <input type="text" id="s1" class="form-control" placeholder="Prenom..." name="query" required>
							                       
							                    </div>
							                   </form>
							                   <button class="btn btn-circle s2"><i class="icon-magnifier"></i></button>
							                   
							              </div>

							              <div class="row vrow">
							              </div>
							              <div class="row " style="height: 500px;overflow: auto;">
					                    
                    					   <?php
                                                 $q=all_driver();

                                                  while ($data=$q->fetch()) : ?>
                    					
					                        <div class="col-md-3">
				                                <div class="stockd stockd-box">
				                                    <div class="stockd-body no-padding ">
				                                    	<div class="doctor-profile">
				                                                <img src="<?= $data['dr_photo'] ?>" class="doctor-pic" alt=""> 
					                                        <div class="profile-drtitle">
					                                            <div class="doctor-name"><?= $data['dr_nom'] ?>&nbsp;<?= $data['dr_prenom'] ?></div>
					                                            
					                                        </div>
				                                              
                                                       <p><?= $data['dr_adresse'] ?></p> 
                                                        <div><p><i class="fa fa-phone"></i>
                                                         <?= $data['dr_tel'] ?> </p> </div>
                                                     </div>
					                                        <div class="profile-userbuttons">
					                                             <a href="#" id="<?= $data['dr_id'] ?>" class="btn btn-info btn-xs voir">
                                                                 <i class="fa fa-eye"></i>
                                                                 </a>
                                                                 <a href="#" id="<?= $data['dr_id'] ?>" class="btn btn-primary btn-xs update">
                                                                 <i class="fa fa-pencil"></i>
                                                                  </a>
                                                                  <a href="#" id="<?= $data['dr_id'] ?>" class="btn btn-danger btn-xs delete">
                                                                  <i class="fa fa-trash-o "></i>
                                                                  </a>
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
           
                        <!-- End driver Chat --> 
 						<!-- Start Setting Panel --> 
 						
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("views/modale/driver/driver_modale.php"); ?>
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
        
         url:'views/script/driver/driver_insert.php',
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
              setInterval('refreshPage()', 1000);
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
  new Dialogify('views/script/driver/driver_view.php', options)
   .title('Utilisateur details')
   .showModal();

});    

$(document).on('click','.delete',function(event){
    var id=$(this).attr("id");
    Dialogify.confirm('voulez-vous vraiment supprimer cette personne?', {

    ok:function(){
      $.ajax({
      
       url:'views/script/driver/driver_delete.php',
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
      
       url:'views/script/driver/driver_update',
       method:'POST',
       data:{id:id} ,
       dataType:"json",
       success:function(data){
            $('#admin')[0].reset();
          $('#ajouter').modal('show');

          $('#id').val(data.id);
          $('#bs').val(data.bs);
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
      url:'views/script/driver_voir.php',
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