 <div class="modal fade" id="print" role="dialog" style="border-radius:20px;">
    <div class="modal-dialog modal-xs">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style="color:balck; font-weight:bold;"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>

            <div class="printableArea" >
              <div class="row" >
             <div class="col-md-6">
             
              
               <!--  <img src="log1.jpg" style="width: 130px; height: 120px; border-radius: 50%;"  class="img-responsive rounded-circle" /> -->
                NEWBLUE-BAR
                <?php
                   $dat = date('d-m-Y-h-i-s');
                   echo "<br>DATE:".$dat ;
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
                <div  id="getA" >
            
            </div>
            </div>
              <div  class="col-lg-3">
            <a href="#"  class="btn btn-info btn-xs pt">
                   <i class="ik ik-printer"></i>Imprimer le reçu </a> 
            </div>



        </div>
     </div>
</div>