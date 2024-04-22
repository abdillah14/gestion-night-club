<?php

include("../../../config/dbConnect.php");

if(isset($_GET["id"]))
{
 // $query = "SELECT * FROM admin,profile WHERE 
 //          id_pf=pf_id and a_id = '".$_GET["id"]."'";
   $query = "SELECT * FROM stock_ WHERE 
             pr_id = '".$_GET["id"]."'";
 $con=dbConnect();
 $statement = $con->prepare($query); 
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<div class="row" >';
 foreach($result as $row)
 {

 
   $images = '<img src="lg.jpg" class="img-responsive img-thumbnail" />';

  $output .= '
  <div class="col-md-6">
   <br />
   '.$images.'
  </div>
  <div class="col-md-6">
   <br />
   
   <p><label  style="color:blue">Designation :&nbsp;</label>'.$row["designation"].'</p>
   <p><label  style="color:blue">Quantité :&nbsp;</label>'.$row["pr_id"].'</p>
   <p><label  style="color:blue">Fournisseur :&nbsp;</label>'.$row["fournisseur"].'</p>
   <p><label  style="color:blue">Prix achat :&nbsp;</label>'.$row["prix_a"].'fbu</p>
    <p><label  style="color:blue">Prix vente bar :&nbsp;</label>'.$row["prix_v"].'fbu</p>
    <p><label  style="color:blue">Prix vente box :&nbsp;</label>'.$row["prix_vs"].'fbu</p>
     <p><label  style="color:blue">Q :&nbsp;</label>'.$row["pr_q"].'</p>
     <p><label  style="color:blue">Categorie :&nbsp;</label>'.$row["cat"].'</p>
   
   
   <p><label  style="color:blue">Code produit:&nbsp;</label>'.$row["code_pr"].'</p>
    <p><label style="color:blue">Data ajout :&nbsp;</label>'.$row["date_pr"].'</p>
    
   
  </div>
  </div><br />
  ';
 }
 echo $output;
}

?>
