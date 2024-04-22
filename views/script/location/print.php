<?php

include("../../../config/dbConnect.php");

if(isset($_POST["id"]))
{
$query = "SELECT * FROM location WHERE l_id = '".$_POST["id"]."'";
$con=dbConnect();
$statement = $con->prepare($query); 
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{ ?>
<label  style="color:blue">Nom :&nbsp;</label><?=$row["l_nom"]?></br>
<label  style="color:blue">Prix :&nbsp;</label><?=$row["l_px"]?>$</br>
<label  style="color:blue">date debut :&nbsp;</label><?=$row['date_in']?></br>
<label  style="color:blue">date finale :&nbsp;</label><?=$row['date_end']?></br>
<label  style="color:blue">Motif :&nbsp;</label><?=$row['l_details']?></br>
<label  style="color:blue">Statut :&nbsp;</label>payé</br>
<label  style="color:blue">Data ajout :&nbsp;</label><?=$row["l_date"]?></br>
 <?php  }  } ?>
  
