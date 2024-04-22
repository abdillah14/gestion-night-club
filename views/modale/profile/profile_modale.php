<div class="modal fade" id="ajouter" role="dialog" style="  border-radius:20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:#fff; ">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#3a3e59; font-weight:bold;"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                 <form id="admin" enctype="multipart/form-data"  method="POST">


                <div class="modal-body">
                   <div class="form-row"> 
                       
                      <div class="form-group col-md-12">
                        <label for="inputAddress" style="color:#3a3e59; font-weight:bold;">Nom</label>
                        <input type="text" id="nom" name="nom" style="border-radius:20px;" class="form-control"  placeholder="nom" required>
                      </div>
                        
                      </div>
                      
                     
                </div>
                <input type="hidden" name="id" id="id" value="0" />
                <input type="hidden" name="photo" id="photo" />
                 <input type="hidden" name="photo_hidden" id="photo_hidden"  />
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit" style="color:white; font-weight:bold; border-radius:20px;" data-dismiss="modal">Fermer</button>
                 <input type="submit" name="save" id="save"  class="btn btn-default" style="color:black; font-weight:bold; border-radius:20px;" value="ajouter" >
                </div>
               </form> 
            </div>
              
        </div>
    </div>

<!-- image cropie -->
<div id="insertimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enregistrer</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 text-center">
            <div id="image_demo" style="width:350px; margin-top:30px"></div>
          </div>
          <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
            
          </div>
        </div>
      </div>
      <div class="modal-footer">
         <button class="btn btn-success crop_image">Enregistrer</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<!-- user view -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profile admin</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

   
 <div class="modal fade" id="affecte" role="dialog" style="border-radius:20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style="color:#3a3e59; font-weight:bold;">Droit d'accer</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                
            <div class="row" id="getA" >
            
            </div>
  



        </div>
     </div>
</div>
 