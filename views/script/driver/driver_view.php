<?php

include("../../../config/dbConnect.php");

if(isset($_GET["id"]))
{
 // $query = "SELECT * FROM admin,profile WHERE 
 //          id_pf=pf_id and a_id = '".$_GET["id"]."'";
   $query = "SELECT * FROM driver,boss WHERE 
             id_bs=bs_id and dr_id = '".$_GET["id"]."'";
 $con=dbConnect();
 $statement = $con->prepare($query); 
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<div class="row" >';
 foreach($result as $row)
 {

 
   $images = '<img src="'.$row["dr_photo"].'" class="img-responsive img-thumbnail" />';
   $image = '<img src="'.$row["bs_photo"].'" class="img-responsive img-thumbnail" />';

  $output .= '
  <div class="col-md-6">
   <br />
   '.$images.'
  </div>
  <div class="col-md-6">
   <br />
   
   <p><label  style="color:blue">Name :&nbsp;</label>'.$row["dr_nom"].'</p>
   <p><label  style="color:blue">Prenom :&nbsp;</label>'.$row["dr_prenom"].'</p>
   <p><label  style="color:blue">sexe :&nbsp;</label>'.$row["dr_sexe"].'</p>
   <p><label  style="color:blue">Telephone :&nbsp;</label>'.$row["dr_tel"].'</p>
    <p><label style="color:blue">Data ajout :&nbsp;</label>'.$row["dr_date"].'</p>
    <p><label style="color:blue">Statut :&nbsp;</label>'.$row["dr_statut"].'</p>
    <p><label style="color:blue">Adresse :&nbsp;</label>'.$row["dr_adresse"].'</p>
        
  </div>
  </div><br />
  <p>-----------------------------------Proprietaire---------------------------------</p>

  <div class="row">
  <div class="col-md-6">
   <br />
   '.$image.'
  </div>
  <div class="col-md-6">
  <br />
   
   <p><label  style="color:blue">Name :&nbsp;</label>'.$row["bs_nom"].'</p>
   <p><label  style="color:blue">Prenom :&nbsp;</label>'.$row["bs_prenom"].'</p>
   <p><label  style="color:blue">Telephone :&nbsp;</label>'.$row["bs_tel"].'</p>
   <p><label style="color:blue">Adresse :&nbsp;</label>'.$row["bs_adresse"].'</p>
    </div>
  </div>
  ';
 }
 echo $output;
}

?>
