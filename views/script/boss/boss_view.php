<?php

include("../../../config/dbConnect.php");

if(isset($_GET["id"]))
{
 // $query = "SELECT * FROM admin,profile WHERE 
 //          id_pf=pf_id and a_id = '".$_GET["id"]."'";
   $query = "SELECT * FROM client WHERE 
              bs_id = '".$_GET["id"]."'";
 $con=dbConnect();
 $statement = $con->prepare($query); 
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<div class="row" >';
 foreach($result as $row)
 {

 
   $images = '<img src="'.$row["bs_photo"].'" class="img-responsive img-thumbnail" />';

  $output .= '
  <div class="col-md-6">
   <br />
   '.$images.'
  </div>
  <div class="col-md-6">
   <br />
   
   <p><label  style="color:blue">Name :&nbsp;</label>'.$row["bs_nom"].'</p>
   <p><label  style="color:blue">Prenom :&nbsp;</label>'.$row["bs_prenom"].'</p>
   <p><label  style="color:blue">sexe :&nbsp;</label>'.$row["bs_sexe"].'</p>
   <p><label  style="color:blue">Telephone :&nbsp;</label>'.$row["bs_tel"].'</p>
    <p><label style="color:blue">Data ajout :&nbsp;</label>'.$row["bs_date"].'</p>
    <p><label style="color:blue">Statut :&nbsp;</label>'.$row["bs_statut"].'</p>
    <p>-------------------Adresse-----------------</p>
    <p>'.$row["bs_adresse"].'</p>
  </div>
  </div><br />
  ';
 }
 echo $output;
}

?>
