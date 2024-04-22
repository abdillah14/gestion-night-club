<?php

include("../../../config/dbConnect.php");

if(isset($_POST["id"]))
{
$query = "SELECT * FROM sauna WHERE sa_id = '".$_POST["id"]."'";
$con=dbConnect();
$statement = $con->prepare($query); 
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{ ?>
<label  style="color:blue">Nom :&nbsp;</label><?=$row["sa_nom"]?></br>
<label  style="color:blue">Prix :&nbsp;</label><?=$row["sa_px"]?>$</br>
<label  style="color:blue">Statut :&nbsp;</label><?=$row["sa_statut"]?></br>
<label  style="color:blue">Data ajout :&nbsp;</label><?=$row["sa_date"]?></br>
 <?php  }  } ?>
  
