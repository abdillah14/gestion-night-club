<?php 
session_start();
include("../../../config/dbConnect.php");
 function all_vente($id){

    $con=dbConnect();

        $q=$con->query('SELECT * from vente_plat,user,plat where
            id_s=p_id and vente_plat.id_user=user_id and  v_code="'.$id.'" '); 

       return $q;
  }





if(isset($_GET["id"]))
{
            $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $string=str_shuffle($string);
            $c=substr($string,0,5);
            $idd='S-'.$c;

 $code = $_GET["id"];
 $total = 0; 
 $nom = ''; ?>
    <div class="print_div2">
             <div class="row" >
             <div class="col-md-6">
             
              
               <!--  <img src="log1.jpg" style="width: 130px; height: 120px; border-radius: 50%;"  class="img-responsive rounded-circle" /> -->
                NEWBLUE-BAR
                <?php
                   $dat = date('d-m-Y-h-i-s');
                   echo "<br>N:&nbsp;".$_GET["id"]."  <br />D:&nbsp;".$dat ;
                 ?>
                  <br />
                 
                Srv:&nbsp;<?=$_SESSION["nom"]?>&nbsp;<?=$_SESSION["prenom"]?>
                <br />
              </div>
              <div class="col-md-6">
                
                
                <br />
                C :MUKAZA,Rohero,Blvd de l'Uprona N43&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <br />Tel : +25765116699
                <br />
                RCN :34216/21&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                  <br />NIF :4001852914<br />
                   
               </div> 
              </div>
       
       
      <div class="table-scrollable">
          <div class="table-responsive">
           <table  class="table table-striped custom-table table-hover">
             <thead>
                 <tr>
                    <th>ID</th>
                    <th>SV</th>
                     <th>Ds</th>
                     <th>PV(HTVA)</th>
                     
                      <th>Qt
                           </th>
                             </tr>
                               </thead>
                                  <tbody>
                                       <?php
                                       $q=all_vente($code);
                                      while ($data=$q->fetch()) {
                                               
                                      ?>
                                                      
                                        <tr class="odd gradeX">
                                           <td class="left"><?= $data['v_code'] ?></td>
                                           <td class="left"><?= $data['user_nom'] ?> <?= $data['user_prenom'] ?></td>
                                             <td><?= $data['p_nom'] ?></td>
                                              <td class="left"><?= $data['v_px'] ?>fbu</td>
                                               <td class="left"><?= $data['v_q'] ?></td>
                                                 <?php
                                                    $total += $data['v_px'] * $data['v_q'] ; ?>
                                                </tr>
                                                     
                                             <?php
                                                  $nom=$data['nom'] ; 
                                                   } ?>
                                                   <tr>
                                                    <td> </td>
                                                    <td> </td>
                                                      <td class="CENTER">
                                                        (<?=$nom?>)
                                                      </td>
                                                      <td>T= </td>
                                                       
                                                      <td><?= $total ?>fbu
                                                                        
                                                       </td>
                                                   </tr>
                                              
                                                </tbody>


                                            </table>
                                          
                                             
                                           </div>
                                           </div>

</div>                               
<?php }
?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="sav" id="pt"  class="btn pt" style="color:white; background-color:#587187; font-weight:bold; border-radius:20px;" >Imprimer</button>