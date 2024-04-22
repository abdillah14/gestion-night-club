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
                  <div class="form-group col-md-6">
                          
                        <label for="inputAddress" style="">Designation</label>
                        <input type="text" id="ds" name="ds" style="" class="form-control ds"  placeholder="" required>
                    
                        </div>
                       
                         
                   <!--      </div>  
                     <div class="form-row">  -->
                     
                      <div class="form-group col-md-6">
                         
                            <label for="inputAddress" style="">Prix</label>
                        <input type="text" id="pa" name="pa" style="" class="form-control pa"  placeholder="" required>
                       
                        </div>
                       
                      <!-- <div class="form-group col-md-6">
                        <label for="inputAddress" class="im" style="">image</label>
                        <input type="file" id="img"  name="img" style="" class="form-control img"  placeholder="" >
                      </div> -->
                       
                        
                        
                      </div>
                      
                    
                </div>
                <input type="hidden" name="id" id="id" value="0" />
                <input type="hidden" name="photo_hidden" id="photo_hidden" class="photo_hidden" />
                <input type="hidden" name="photo" id="photo" class="photo" />
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit"  data-dismiss="modal">Fermer</button>
                 <input type="submit" name="save" id="save"  class="btn btn-dark save"  value="Ajouter en stock" >
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
          <h4 class="modal-title">Profile</h4>
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