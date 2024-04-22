
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
                                    		 <form  class="search-form-opened" action="#" method="GET">
							                    <div class="input-group" style="color:black; font-weight:bold;">
							                        <input type="text" id="s" class="form-control" placeholder="page..." name="query" required>
                                              <span class="input-group-btn">
							                          <a href="javascript:;" class="btn submit">
							                             <i class="icon-magnifier"></i>
							                           </a>
							                        </span> 
							                    </div>
							                   </form>
							                  
							                   
							              </div>

							              <div class="row vrow">
							              </div>
							              <div class="row " style="height: 400px;overflow: auto;">
					                    
                    					   <?php
                                                 $q=all_page();

                                                  while ($data=$q->fetch()) : ?>
                    					
					                        <div class="col-md-3">
				                                <div class="stockd stockd-box">
				                                    <div class="stockd-body no-padding ">
				                                    	<div class="doctor-profile">
				                                                 <i class="material-icons">description</i>
					                                        <div class="profile-bstitle">
					                                            <div class="doctor-name"><?= $data['pg_nom'] ?></div>
					                                            <div class="name-center">

                                                        <?= $data['pg_date'] ?></div>
					                                        </div>
				                                              
                                                     </div>
					                                        <div class="profile-userbuttons">
					                                             <a href="#" id="<?= $data['pg_id'] ?>" class="btn btn-info btn-xs voir">
                                                                 <i class="fa fa-eye"></i>
                                                                 </a>
                                                                 <a href="#" id="<?= $data['pg_id'] ?>" class="btn btn-primary btn-xs update">
                                                                 <i class="fa fa-pencil"></i>
                                                                  </a>
                                                                  <a href="#" id="<?= $data['pg_id'] ?>" class="btn btn-danger btn-xs delete">
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
           
                        <!-- End user Chat --> 
 						<!-- Start Setting Panel --> 
 						
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("views/modale/page/page_modale.php"); ?>
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
    $('.modal-title').text("Ajouter page");
    $('#save').val("Enregistrer");
  $("#ajouter").modal('show');
    $('#operation').val("add");
  $('#imge').html("");
   $('#imge1').html("");
 
 });


 $(document).on('submit','#admin',function(event){
       event.preventDefault();
     

      $.ajax({
        
         url:'views/script/page/page_insert.php',
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
  new Dialogify('views/script/page/page_view.php', options)
   .title('Utilisateur details')
   .showModal();

});    

$(document).on('click','.delete',function(event){
    var id=$(this).attr("id");
    Dialogify.confirm('voulez-vous vraiment supprimer cette personne?', {

    ok:function(){
      $.ajax({
      
       url:'views/script/page/page_delete.php',
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
      
       url:'views/script/page/page_update',
       method:'POST',
       data:{id:id} ,
       dataType:"json",
       success:function(data){
            $('#admin')[0].reset();
          $('#ajouter').modal('show');

          $('#id').val(data.id);
          $('#nom').val(data.nom);
          

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
      url:'views/script/page_voir.php',
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