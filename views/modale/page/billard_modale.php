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
                          
                        <label for="inputAddress" style="">Nom</label>
                        <input type="text" id="nom" name="nom" style="" class="form-control nom"  placeholder="" required>
                    
                        </div>
                       
                         
                        </div>  
                   <div class="form-row"> 
                     <div class="form-group col-md-6">
                        <label for="inputAddress" style="">Nombre des jeux</label>
                        <input type="number" id="nb" min="1" name="nb" style="" class="form-control nb"  placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                         
                            <label for="inputAddress" style="">Prix</label>
                        <input type="text" id="px" name="px" style="" class="form-control px"  placeholder="" required>
                       
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