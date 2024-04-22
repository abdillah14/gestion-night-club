<div class="modal fade" id="update_stock" role="dialog" style="  border-radius:20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:white; ">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#3a3e59; font-weight:bold;"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                 <form id="stock_up" enctype="multipart/form-data"  method="POST">


                <div class="modal-body">

                  <div class="form-row"> 
                       
                      <div class="form-group col-md-4">
                          <label for="inputAddress" style="color:#3a3e59; font-weight:bold;">Prix de vente</label>
                        <input type="text" id="pv" name="pv" style="border-radius:20px;" class="form-control"  placeholder="" required>
                    
                      </div>
                      <div class="form-group col-md-4">
                         
                            <label for="inputAddress" style="color:#3a3e59; font-weight:bold;">Prix d'achat</label>
                        <input type="text" id="pa" name="pa" style="border-radius:20px;" class="form-control"  placeholder="" required>
                       
                        </div>
                       
                      <div class="form-group col-md-4">
                        <label for="inputAddress" style="color:#3a3e59; font-weight:bold;">Quantité</label>
                        <input type="number" id="qt" name="qt" style="border-radius:20px;" class="form-control"  placeholder="" required>
                      </div>
                       
                        
                        
                      </div>
                      
                  
                </div>
                <input type="hidden" name="id" id="id" class="id" value="0" />
                <input type="hidden" name="photo" id="photo" />
                 <input type="hidden" name="photo_hidden" id="photo_hidden"  />
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit" style="color:white; font-weight:bold; border-radius:20px;" data-dismiss="modal">Fermer</button>
                 <input type="submit"  name="save" id="save"  class="btn btn-default" style="color:black; font-weight:bold; border-radius:20px;" value="ajouter" >
                </div>
               </form> 
            </div>
              
        </div>
    </div>

