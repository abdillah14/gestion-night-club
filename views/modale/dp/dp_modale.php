<div class="modal fade" id="ajouter" role="dialog" style="  border-radius:20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style="color:balck; font-weight:bold;"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                 <form id="dp"  enctype="multipart/form-data"  method="POST">


          <div class="modal-body">
				 <div class="form-row"> 
				  <div class="form-group col-md-6">
                          
                        <label for="inputAddress" style="color:balck; font-weight:bold;">Details</label>
                        <textarea id="ds" name='ds'   class="form-control"  placeholder="" required></textarea>
                    
                        </div>
                        
					       <div class="form-group col-md-6">
                            <label for="inputAddress" style="color:balck; font-weight:bold;">Montant</label>
                        <input type="text" id="mt" name="mt"  class="form-control"  placeholder="" required>

                        </div>
                         
				       	</div>	
                   
                      
                    
                </div>
                <input type="hidden" name="id" id="id" value="0" />
                
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit" style="color:white; font-weight:bold; border-radius:20px;" data-dismiss="modal">Fermer</button>
                 <input type="submit" name="save" id="save"  class="btn btn-default" style="color:black; font-weight:bold; border-radius:20px;" value="ajouter" >
                </div>
               </form> 
            </div>
              
        </div>
    </div>
