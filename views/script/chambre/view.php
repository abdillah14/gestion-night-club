<?php

include("../../../config/dbConnect.php");

if(isset($_GET["id"]))
{
 $id=$_GET["id"];
 $query =  'SELECT * from chambre_client where  cc_statut= "Occupée" and id_ch="'.$id.'" ' ;
 $con=dbConnect();
 $statement = $con->prepare($query); 
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<div class="row" >';

 foreach($result as $row)
 { $tp="Jours";
   if ($row["cc_type"]=="PASSAGE") {
     $tp="h";
   }
 
   $images = '<img src="lg.jpg" class="img-responsive img-thumbnail" />';

  $output .= '
  <div class="col-md-6">
   <br />
   '.$images.'
  </div>
  <div class="col-md-6">
   <br />
   
   <p><label  style="color:blue">Nom client :&nbsp;</label>'.$row["cc_nom"].'</p>
   <p><label  style="color:blue">ID :&nbsp;</label>'.$row["cc_num"].'</p>
   <p><label  style="color:blue">Prix :&nbsp;</label>'.$row["cc_px"].'$</p>
   <p><label  style="color:blue">Type :&nbsp;</label>'.$row["cc_type"].'</p>
   
   <p><label  style="color:blue">Temps :&nbsp;</label>'.$row["cc_tmp"].$tp.'</p>
    <p><label style="color:blue">Data ajout :&nbsp;</label>'.$row["cc_date"].'</p>
    
   <p><label style="color:blue">Details :&nbsp;</label>'.$row["cc_details"].'</p>
  </div>
  </div><br />
  ';
 }
 echo $output;
}

?>
