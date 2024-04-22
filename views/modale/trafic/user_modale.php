<div class="modal fade" id="ajouter" role="dialog" style="  border-radius:20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:#9d9b9b; ">
            <div class="modal-header">
                <h4 class="modal-title" style="color:balck; font-weight:bold;"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                 <form id="admin" enctype="multipart/form-data"  method="POST">


                <div class="modal-body">
                   <div class="form-row"> 
                       
                      <div class="form-group col-md-6">
                        <label for="inputAddress" style="color:balck; font-weight:bold;">Nom</label>
                        <input type="text" id="nom" name="nom" style="border-radius:20px;" class="form-control"  placeholder="nom" required>
                      </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4" style="color:balck; font-weight:bold;">Prenom</label>
                          <input type="text" id="prenom" name="prenom" style="border-radius:20px;" class="form-control"  placeholder="Nom" required>
                        </div>
                      </div>
                      
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputZip" style="color:black; font-weight:bold;">Fonction</label>
                          <input type="text" name="poste" id="poste" style="border-radius:20px;" class="form-control" id="nation" required>
                        </div>  
                        <div class="form-group col-md-6">
                       <label for="inputZip" style="color:black; font-weight:bold;">nom utilisateur</label>
                          <input type="text" name="user" id="user" style="border-radius:20px;" class="form-control" id="nation" required>
                         </div> 
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputCity" style="color:black; font-weight:bold;">phone</label>
                          <input type="text" name="phone" id="phone" style="border-radius:20px;" class="form-control" id="phone">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputState" style="color:black; font-weight:bold;">sexe</label>
                          <select  name="sexe" id="sexe" class="form-control" style="border-radius:20px;" required>
                            <option selected>Choisi...</option>
                            <option value="masculin">M</option>
                            <option value="feminin">F</option>
                          </select>
                        </div>
                        
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputZip" style="color:black; font-weight:bold;">Mot de passe</label>
                          <input type="password" name="password" id="password" style="border-radius:20px;" class="form-control" required>
                        </div>
                     
                    
                        <div class="form-group col-md-6">
                          <label  style="color:black; font-weight:bold;">comfirmer</label>
                          <input type="password" name="cpasse" id="cpasse" style="border-radius:20px;" class="form-control"  required>
                        </div>
                     </div>
                     <div class="form-row">
                   <div class="form-group col-md-6">
                          <label  style="color:black; font-weight:bold;">Photo De Profile</label>
                          <input type="file" name="voir_photo" id="voir_photo" style="border-radius:20px;" class="form-control"  >
                          <span id="imge"></span>
                  </div>
                  <div class="form-group col-md-6">
                          <label  style="color:black; font-weight:bold;">Profile</label>
                           <select  name="pf" id="pf" class="form-control" style="border-radius:20px;" >
                            <option ></option>
                             <option value="1" >User</option> 
                           </select> 
                       </div>
                     </div>
                </div>
                <input type="hidden" name="id" id="id" value="0" />
                <input type="hidden" name="pa" id="pa" value="0" />
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