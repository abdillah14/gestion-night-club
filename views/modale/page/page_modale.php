<div class="modal fade" id="ajouter" role="dialog" style="  border-radius:20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight:bold;"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                 <form id="admin" enctype="multipart/form-data"  method="POST">


                <div class="modal-body">
                   <div class="form-row"> 
                       
                      <div class="form-group col-md-12">
                        <label for="inputAddress" style="font-weight:bold;"></label>
                        <input type="text" id="nom" name="nom"  class="form-control nom"  placeholder="nom" required>
                      </div>
                        
                      </div>
                      
                     
                </div>
                <input type="hidden" name="id" class="id" id="id" value="0" />
                <input type="hidden" name="photo" id="photo" />
                 <input type="hidden" name="photo_hidden" id="photo_hidden"  />
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit" style="color:white; font-weight:bold;" data-dismiss="modal">Fermer</button>
                 <input type="submit" name="save" id="save"  class="btn btn-default" style="color:black; font-weight:bold;" value="ajouter" >
                </div>
               </form> 
            </div>
              
        </div>
    </div>

