<?php

include("../../../config/dbConnect.php");

if(isset($_POST["id"]))
{
$query = "SELECT * FROM sport WHERE sp_id = '".$_POST["id"]."'";
$con=dbConnect();
$statement = $con->prepare($query); 
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{ ?>
<label  style="color:blue">Nom :&nbsp;</label><?=$row["sp_nom"]?></br>
<label  style="color:blue">Prix :&nbsp;</label><?=$row["sp_px"]?>$</br>
<label  style="color:blue">Statut :&nbsp;</label><?=$row["sp_statut"]?></br>
<label  style="color:blue">Data ajout :&nbsp;</label><?=$row["sp_date"]?></br>
 <?php  }  } ?>
  
