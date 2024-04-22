<div class="modal fade" id="ajouter" role="dialog" style="  border-radius:20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" ><!-- style="background-color:#9d9b9b; " -->
            <div class="modal-header">
                <h4 class="modal-title" style="color:green; font-weight:bold;"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
             <div class="print_div  printableArea">
                <div class="row" >
             <div class="col-md-6">
             
              
               <!--  <img src="log1.jpg" style="width: 130px; height: 120px; border-radius: 50%;"  class="img-responsive rounded-circle" /> -->
                NEWBLUE-BAR
                <?php
                   $dat = date('d-m-Y-h-i-s');
                   echo "<br>N:&nbsp;".$code."  <br />D:&nbsp;".$dat ;
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
              </div>               <div id="print">
                 

               </div>

             </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-pink" class="btn submit" style="color:white; font-weight:bold; border-radius:20px;" data-dismiss="modal">Fermer</button>
                   <!-- <button name="sav" id="pt"  class="btn btn-info" style="color:black; font-weight:bold; border-radius:20px;"  >Imprimer</button> -->
                    <button name="sav" id="imprimer"  class="btn savv" style="color:white; background-color:#587187; font-weight:bold; border-radius:20px;" >Cash</button>&nbsp;&nbsp;
                 <button name="sav" id="Dette"  class="btn btn-danger savv" style="border-radius:20px;" >Credit</button>
               
               
            </div>

              
        </div>

    </div>

