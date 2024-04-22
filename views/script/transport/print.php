<?php

include("../../../config/dbConnect.php");

if(isset($_POST["id"]))
{
$query = "SELECT * FROM transport WHERE tr_id = '".$_POST["id"]."'";
$con=dbConnect();
$statement = $con->prepare($query); 
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{ ?>
<label  style="color:blue">Nom :&nbsp;</label><?=$row["tr_nom"]?></br>
<label  style="color:blue">Prix :&nbsp;</label><?=$row["tr_px"]?>$</br>
<label  style="color:blue">Statut :&nbsp;</label><?=$row["tr_statut"]?></br>
<label  style="color:blue">Data ajout :&nbsp;</label><?=$row["tr_date"]?></br>
 <?php  }  } ?>
  
