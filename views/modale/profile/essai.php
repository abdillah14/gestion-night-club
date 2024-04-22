<?php 

include("../../../config/dbConnect.php");
include("../../fonction/profile/profile_fonction.php");
function all_page(){
$con=dbConnect();
$q=$con->query('SELECT * from page where pg_statut = "actif" '); 
return $q;
}
 


?>
 

  
  
     <div class="col-md-12">
         
                
                 <div class="card-body " >
                 <div class="table-responsive">
                     <form id="affe" method="post" >
                        <div class="form-group col-md-6">
                           <button type="button" class="btn btn-info  m-r-5" id="chec"><i class="fa  fa-check-square-o"></i>
                           </button>
                           <button type="button" class="btn btn-info  m-r-5" id="chec1"><i class="fa  fa-square-o"></i>
                           </button>
                        </div>
                          
                     <div style="height: 500px;overflow: auto;">
                     <table class="table table-striped custom-table table-hover">
                         <thead style="background-color: #587187;">
                             <tr>
                                 <th>Pages</th>
                                
                                   <th> 
                                     <button class="btn btn-info btn-xm">
                                    <i class="fa fa-plus"></i>
                                    </button>
                                  </th>
                                  <th>
                                     <button class="btn btn-success btn-xm">
                                     <i class="fa fa-eye"></i>
                                     </button>
                                 </th>
                                     <th>
                                      <button class="btn btn-warning btn-xm">
                                       <i class="fa fa-pencil"></i>
                                   </button>
                                   </th>
                                   <th> 
                                <button class="btn btn-danger btn-xm">
                                    <i class="fa fa-trash-o "></i>
                                </button></th>
                            
                       
                         </tr>
                        </thead>
                       <tbody>
                         <?php 
                          $span="Enregistrer";
                         
                            
                            
                                 $pf=$_POST["id"];
                                 $val=array('c','d','u','d');
                                 $val['c']=0;
                                 $val['r']=0;
                                 $val['d']=0;
                                 $val['u']=0;


                                 $e=all_page();

                                     while ($data=$e->fetch()) {
                                    $id_pg=$data['pg_id']; 
                                     
                                   $ex= voir_permission($pf,$id_pg);
                                  
                                    if (isset($ex)) {
                                     
                                    foreach ( $ex as $key => $val) {}
                                    }


                                      ?>
                                 <tr>
                                 <td>
                 
                                 <?= $data['pg_nom'] ?>
                                 
                                 </td>
                                <td>
                                                     
                                <input class="largerCheckbox" 
                                name="c<?= $data['pg_id']?>" 
                                type="checkbox"
                                <?php
                                if (isset($ex)) {
                                  if ($val['c']==1):
                                    echo "checked";
                                  
                                  else:
                                    echo "";
                                  endif;

                                }
                                ?>

                                >
                                                              
                                </td>
                                <td >
                                                          
                                <input class="largerCheckbox" 
                                name="r<?= $data['pg_id']?>" 
                                type="checkbox"
                                <?php
                                if (isset($ex)) {
                                  if ($val['r']==1):
                                    echo "checked";
                                  
                                  else:
                                    echo "";
                                  endif;
                                  
                                }
                                ?>

                                >
                                </td>
                                <td>
                                <input class="largerCheckbox" 
                                name="u<?= $data['pg_id']?>" 
                                type="checkbox"
                                <?php
                                if (isset($ex)) {
                                  if ($val['u']==1):
                                    echo "checked";
                                  
                                  else:
                                    echo "";
                                  endif;
                                  
                                }
                                ?>

                                >                          
                                </td>
                                <td>
                                  <input class="largerCheckbox" 
                                name="d<?= $data['pg_id']?>" 
                                type="checkbox"
                                <?php
                                if (isset($ex)) {
                                  if ($val['d']==1):
                                    echo "checked";
                                  
                                  else:
                                    echo "";
                                  endif;
                                  
                                }
                                ?>

                                >
                                </td>
                                                        
                                
                            </tr>
                                                    
                            <?php }?>
                                                   
                                                   
                                    </tbody>
                                </table>
                                </div>

                                
                                <input type="hidden" name="id_p" id="id_p" value="<?= $pf ?>" />
                                
                                <input type="hidden" name="operation" id="operation" value="add" />

                                <input type="submit"  id="save" name="save" class="btn btn-info btn-circle" value="<?php echo $span; ?>">
                                </form>
                                </div>
                             </div>
                           </div>
                     
            
<script type="text/javascript">
$(document).ready(function(){
  $("#chec1").hide();
 $("#chec").click(function(){
   if (! $('input:checkbox').is('checked')) {
      $('input:checkbox').prop('checked',true);
  } else {
      $('input:checkbox').prop('checked', false);
  } 
   $("#chec").hide();
   $("#chec1").show();
}); 

 $("#chec1").click(function(){
   if (! $('input:checkbox').is('checked')) {
      $('input:checkbox').prop('checked',false);
  } else {
      $('input:checkbox').prop('checked', true);
  } 
   $("#chec1").hide();
   $("#chec").show();
});

 }); 
</script>