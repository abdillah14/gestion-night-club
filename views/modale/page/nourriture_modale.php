<div class="modal fade" id="ajouter" role="dialog" style="  ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:white; ">
            <div class="modal-header">
                <h4 class="modal-title" style=""></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                 <form id="stock"  enctype="multipart/form-data"  method="POST">


          <div class="modal-body">
                 <div class="form-row"> 
                  <div class="form-group col-md-12">
                          
                        <label for="inputAddress" style="">Designation</label>
                        <input type="text" id="ds" name="ds" style="" class="form-control ds"  placeholder="" required>
                    
                        </div>
                       
                         
                        </div>  
                   <div class="form-row"> 
                     
                      <div class="form-group col-md-6">
                         
                            <label for="inputAddress" style="">Prix d'achat</label>
                        <input type="text" id="pa" name="pa" style="" class="form-control pa"  placeholder="" required>
                       
                        </div>
                       
                      <div class="form-group col-md-6">
                        <label for="inputAddress" style="">Quantité</label>
                        <input type="number" id="qt" min="1" name="qt" style="" class="form-control qt"  placeholder="" required>
                      </div>
                       
                        
                        
                      </div>
                      
                    
                </div>
                <input type="hidden" name="id" id="id" class="id" value="0" />
                
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit"  data-dismiss="modal">Fermer</button>
                 <input type="submit" name="save" id="save"  class="btn btn-dark"  value="Ajouter en stock" >
                </div>
               </form> 
            </div>
              
        </div>
    </div>