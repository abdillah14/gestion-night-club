<?php 
// session_start();
include("../../../config/dbConnect.php");
 

if(isset($_POST["item_ds"]))
{
            $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $string=str_shuffle($string);
            $c=substr($string,0,5);
            $idd='S-'.$c;

 
 $item_ds = $_POST["item_ds"];
 $item_qt = $_POST["item_qt"];
 $tb = $_POST["tb"];
 $item_pv = $_POST["item_pv"];
 $code = $_POST["id"];
 $n = $_POST["nom"];

   
 $total = 0; ?>


       
       
      <div class="table-scrollable">
          <div class="table-responsive">
           <table  class="table table-striped custom-table table-hover">
             <thead>
                 <tr>
                     
                     <th>Plat</th>
                     <th>PV(HTVA)</th>
                     
                      <th>Nb
                           </th>
                             </tr>
                               </thead>
                                  <tbody>
                                       <?php

                                      for($count = 0; $count<count($item_ds); $count++)
                                                   {
                                           $item_ds_clean =$item_ds[$count];
                                           $item_qt_clean = $item_qt[$count];
                                           
                                           $item_pv_clean = $item_pv[$count];
                                          
                                            
                                    if ( $item_qt_clean > 0) { ?>
                                                      
                                        <tr class="odd gradeX">
                                          
                                             <td><?= $item_ds_clean ?></td>
                                              <td class="left"><?=  $item_pv_clean ?>fbu</td>
                                               <td class="left"><?=  $item_qt_clean ?></td>
                                                 <?php
                                                    $total += $item_pv_clean * $item_qt_clean ; ?>
                                                </tr>
                                                     
                                             <?php
                                                   }
                                                   } ?>
                                                   <tr>
                                                      <td class="CENTER">
                                                        (<?=$n?>)
                                                      </td>
                                                      <td>MONTANT TOTAL =   </td>
                                                      
                                                      <td><?= $total ?>fbu
                                                                        
                                                       </td>
                                                   </tr>
                                              
                                                </tbody>


                                            </table>
                                          
                                             
                                           </div>
                                           </div>

                                        
<?php }
?>
