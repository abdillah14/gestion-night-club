 <div class="modal fade" id="multiple" role="dialog" style="">
     <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#3a3e59; font-weight:bold;"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
             
            </div>
             
              <div class="table-responsive">
                <table class="table table-bordered" id="crud_table">
                 <tr>
                  <th width="20%">Designation</th> 
                  <th width="15%">Code Produit</th>
                  <th width="17%">fournisseur</th>
                 <th width="10%">Prix achat</th>
                  <th width="10%">Prix vente</th>
                   <th width="10%">Qte</th>
                  <th width="5%"></th>
                 </tr>
                 <tr>
                  <td contenteditable="true" class="ds"></td>
                  <td contenteditable="true" class="cd"></td>
                  <td contenteditable="true" class="fs"></td>
                  <td contenteditable="true" class="pa"></td>
                   <td contenteditable="true" class="pv"></td>
                  <td contenteditable="true" class="qt"></td>
                  <td></td>
                 </tr>
                </table>
                <div align="right">
                 <button type="button" name="add" id="add" class="btn btn-success btn-xs add">+</button>
                </div>
                <div align="center">
                 <button type="button" name="eng" style="color:white; font-weight:bold; " id="eng" class="btn btn-info">Save</button>
                 <button type="button" class="btn btn-danger " class="btn submit" style="color:white; font-weight:bold; " data-dismiss="modal">Fermer</button>
                </div>
                <br />
                <div id="inserted_item_data"></div>
               </div>
               


            </div>
              
        </div>
    </div>




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
				             <div class="form-group col-md-4">
                          
                        <label for="inputAddress" style="">Designation</label>
                        <input type="text" id="ds" name="ds" style="" class="form-control ds"  placeholder="" required>
                    
                        </div>
                         <div class="form-group col-md-4">
                            <label for="inputAddress" style="">Categorie</label>
                            <select  name="cd" id="cd" class="form-control cd"  required>
                            <option></option>
                            <option value=""></option>
                            <option value="Whisky">Whisky</option>
                            <option value="Jus">Jus</option>
                            <option value="Sucre">Sucré</option>
                            <option value="Vin">Vin</option>
                            <option value="Eau">Eau</option>
                            <option value="Biere">Biere</option>
                            <option value="coktel">Coktel</option>

                             
                           </select>

                        </div>
					       <div class="form-group col-md-4">
                            <label for="inputAddress" style="">fournisseur</label>
                        <input type="text" id="fs" name="fs" style="" class="form-control fs"  placeholder="" required>

                        </div>
                         
				       	</div>	
                   <div class="form-row"> 
                       
                     
                      <div class="form-group col-md-3">
                         
                            <label for="inputAddress" style="">Prix d'achat</label>
                        <input type="text" id="pa" name="pa" style="" class="form-control pa"  placeholder="" required>
                       
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputAddress" style="">Prix de vente Bar</label>
                        <input type="text" id="pv" name="pv" style="" class="form-control pv"  placeholder="" required>
                    
                      </div>
                       <div class="form-group col-md-3">
                          <label for="inputAddress" style="">Prix de vente Boite</label>
                        <input type="text" id="pvs" name="pvs" style="" class="form-control pvs"  placeholder="" required>
                    
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputAddress" style="">Quantité</label>
                        <input type="number" id="qt" min="1" name="qt" style="" class="form-control at"  placeholder="" required>
                      </div>
                       
                        
                        
                      </div>
                      
                    
                </div>
                <input type="hidden" name="id" id="id" value="0"  class="id" />
                
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit"  data-dismiss="modal">Fermer</button>
                 <input type="submit" name="save" id="save"  class="btn btn-dark"  value="Ajouter en stock" >
                </div>
               </form> 
            </div>
              
        </div>
    </div>



     <!--   update stock -->

<div class="modal fade" id="danger" role="dialog" style="  ">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="background-color:white; ">
            <div class="modal-header">
                <h4 class="modal-title" style=""></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                 <form id="stock_dg" enctype="multipart/form-data"  method="POST">


                <div class="modal-body">

                  <div class="form-row"> 
                      <div class="form-group col-md-12">
                        
                        <input type="number" id="att" min="1" name="att"  style="" class="form-control att"  placeholder="" required>
                      </div>
                       
                        
                        
                      </div>
                      
                  
                </div>
                <input type="hidden" name="id" id="id" class="id" value="0" />
                <input type="hidden" name="qt" id="qt" class="qt" value="0" />
                <input type="hidden" name="photo" id="photo" />
                 <input type="hidden" name="photo_hidden" id="photo_hidden"  />
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit"  data-dismiss="modal">Fermer</button>
                 <input type="submit"  name="save" id="save"  class="btn btn-info alt"   value="Insert" >
                </div>
               </form> 
            </div>
              
        </div>
    </div>



<!-- 
 multiple -->

<div class="modal fade" id="export" role="dialog" style="  ">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="background-color:white; ">
            <div class="modal-header">
                <h4 class="modal-title" style=""></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                 <form id="stock_ex" enctype="multipart/form-data"  method="POST">


                <div class="modal-body">

                  <div class="form-row"> 
                      <div class="form-group col-md-12">
                        
                        <input type="number" id="att" min="1" name="att"  style="" class="form-control att"  placeholder="" required>
                      </div>
                       
                        
                        
                      </div>
                      
                  
                </div>
                <input type="hidden" name="id" id="id" class="id" value="0" />
                <input type="hidden" name="qt" id="qt" class="qt" value="0" />
                <input type="hidden" name="photo" id="photo" />
                 <input type="hidden" name="photo_hidden" id="photo_hidden"  />
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit"  data-dismiss="modal">Fermer</button>
                 <input type="submit"  name="save" id="save"  class="btn btn-info exp"   value="Insert" >
                </div>
               </form> 
            </div>
              
        </div>
    </div>





  <!--   update stock -->

<div class="modal fade" id="update_stock" role="dialog" style="  ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:white; ">
            <div class="modal-header">
                <h4 class="modal-title" style=""></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                 <form id="stock_up" enctype="multipart/form-data"  method="POST">


                <div class="modal-body">

                  <div class="form-row"> 
                       
                      
                      <div class="form-group col-md-4">
                         
                            <label for="inputAddress" style="">Prix d'achat</label>
                        <input type="text" id="pa" name="pa" style="" class="form-control"  placeholder="" >
                       
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputAddress" style="">Prix de vente bar</label>
                        <input type="text" id="pv" name="pv" style="" class="form-control"  placeholder="" >
                    
                      </div>
                      <div class="form-group col-md-4">
                          <label for="inputAddress" style="">Prix de vente boite</label>
                        <input type="text" id="pvs" name="pvs" style="" class="form-control"  placeholder="" >
                    
                      </div>
                       
                      <div class="form-group col-md-4">
                        <label for="inputAddress" style="">Quantité</label>
                        <input type="number" id="qt" name="qt" style="" class="form-control"  placeholder="" >
                      </div>
                       
                        
                        
                      </div>
                      
                  
                </div>
                <input type="hidden" name="id" id="id" class="id" value="0" />
                <input type="hidden" name="photo" id="photo" />
                 <input type="hidden" name="photo_hidden" id="photo_hidden"  />
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit" style="color:white; font-weight:bold; " data-dismiss="modal">Fermer</button>
                 <input type="submit"  name="save" id="save"  class="btn btn-success" style="color:black; font-weight:bold; " value="Modifiez" >
                </div>
               </form> 
            </div>
              
        </div>
    </div>

<div class="modal fade" id="promotion" role="dialog" style="  ">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="background-color:white; ">
            <div class="modal-header">
                <h4 class="modal-title" style=""></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
                 <form id="promo" enctype="multipart/form-data"  method="POST">


                <div class="modal-body">

                  <div class="form-row"> 
                      <div class="form-group col-md-4">
                        <label for="inputAddress" style="">%</label>
                        <input type="text" id="att"  name="att"  style="" class="form-control att"  placeholder="%" required>
                      </div>
                       
                       <div class="form-group col-md-4">
                            <label for="inputAddress" style="">Categorie</label>
                            <select  name="cd" id="cd" class="form-control cd"  required>
                            <option></option>
                            <option value=""></option>
                            <option value="Whisky">Whisky</option>
                            <option value="Jus">Jus</option>
                            <option value="Sucre">Sucré</option>
                            <option value="Vin">Vin</option>
                            <option value="Eau">Eau</option>
                            <option value="Biere">Biere</option>
                            <option value="coktel">Coktel</option>

                             
                           </select>

                        </div>
                         <div class="form-group col-md-4">
                            <label for="inputAddress" style="">Option</label>
                            <select  name="op" id="op" class="form-control op"  required>
                            <option></option>
                            <option value=""></option>
                            <option value="moins">Moins</option>
                            <option value="plus">plus</option>
                           </select>

                        </div>  
                        
                      </div>
                      
                  
                </div>
                <input type="hidden" name="id" id="id" class="id" value="0" />
                <input type="hidden" name="qt" id="qt" class="qt" value="0" />
                <input type="hidden" name="photo" id="photo" />
                 <input type="hidden" name="photo_hidden" id="photo_hidden"  />
                 <input type="hidden" name="operation" id="operation" value="add" />
                <div class="modal-footer">
                 <button type="button" class="btn btn-danger " class="btn submit"  data-dismiss="modal">Fermer</button>
                 <input type="submit"  name="save" id="save"  class="btn btn-info alt"   value="Insert" >
                </div>
               </form> 
            </div>
              
        </div>
    </div>
