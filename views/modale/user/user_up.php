 <!-- image cropie -->


 <div class="modal fade" id="mod" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:balck; font-weight:bold;"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>

               <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="panel panel-box">
                                <div class="panel-head">
                                  <font size="6">
                                    <header class="col-sm-2 control-label" ></header>
                                   </font>                           
                                </div>
                                <div class="panel-body " id="bar-parent">
                                    <form id="admin1" enctype="multipart/form-data"  method="POST">

                                           
                                           <div class="form-group row">
                                            <label for="horizontalFormEmail" class="col-sm-2 control-label">Nom</label>
                                            <div class="col-sm-10">
                                                 <input type="text" value="<?php echo $_SESSION['nom'] ?>" id="nom" name="nom"  class="form-control"  placeholder="nom" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="horizontalFormEmail" class="col-sm-2 control-label">Prenom</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $_SESSION['prenom'] ?>" id="prenom" name="prenom"  class="form-control"  placeholder="Nom" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="horizontalFormEmail" class="col-sm-2 control-label">Phone</label>
                                            <div class="col-sm-10">
                                                  <input type="text" data-mask="+243999999999" value="<?php echo $_SESSION['tel'] ?>"  name="phone" id="phone" class="form-control phone"  placeholder="(+243)000000000" required>
                                            </div>
                                        </div>
                                        
                              
                                </div>
                                <br><br>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-6">
                            <div class="panel panel-box">
                                <div class="panel-head">
                                  <font size="6">
                                    <header class="col-sm-2 control-label" ></header>
                                   </font>                           
                                </div>
                                <div class="panel-body " id="bar-parent">
                                    

                                            
                                        <div class="form-group row">
                                            <label for="horizontalFormEmail" class="col-sm-2 control-label">Username</label>
                                            <div class="col-sm-10">
                                                 <input type="text" value="<?php echo $_SESSION["username"] ?>" id="user" name="user"  class="form-control"  placeholder="Prenom" required>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label for="horizontalFormEmail" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                 <input type="password" name="password" value="<?php echo $_SESSION['password'] ?>" id="password"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="horizontalFormEmail" class="col-sm-2 control-label">Confirm</label>
                                            <div class="col-sm-10">
                                                 <input type="password" value="<?php echo $_SESSION['password'] ?>" name="cpasse" id="cpasse"  class="form-control"  >
                                            </div>
                                        </div>  
                                         <div class="form-group row">
                                            <label for="horizontalFormEmail" class="col-sm-2 control-label">Photo</label>
                                            <div class="col-sm-10">
                                                  <input type="file" name="voir_photo" id="voir_photo"  class="form-control voir_photo"  >
                                                <span id="imge" class="img-circle imge"><img src="<?=$_SESSION["photo"] ?>"></span>     
                                            </div>
                                        </div>  
                              
                                </div>
                            </div>

                        </div>

                        <div class="center">
                 <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id'] ?>" />
                 <input type="hidden" value="<?php echo $_SESSION['photo'] ?>" name="photo_hidden" id="photo_hidden"  />
                 <input type="hidden" name="operation" id="operation" value="add" />
                 <input type="hidden" name="photo" id="photo" class="photo" />
                <div class="modal-footer">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-danger " class="btn submit" style="color:white; font-weight:bold; border-radius:20px;" data-dismiss="modal">Fermer</button>
                 <input type="submit" name="save" id="save"  class="btn btn-default" style="color:black; font-weight:bold; border-radius:20px;" value="Modifier" >
                      </div>  
                                                                                 
                     
                   
                  
                </div>
               
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