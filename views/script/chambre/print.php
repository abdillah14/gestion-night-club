<?php

include("../../../config/dbConnect.php");

if(isset($_POST["id"]))
{
$query = "SELECT * FROM chambre_client,chambre WHERE id_ch=ch_id and  cc_id = '".$_POST["id"]."'";
$con=dbConnect();
$statement = $con->prepare($query); 
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{ ?>
<label  style="color:blue">Nom :&nbsp;</label><?=$row["cc_nom"]?></br>
<label  style="color:blue">Temps :&nbsp;</label><?=$row["cc_tmp"]?>J(H)</br>
<label  style="color:blue">Chambre :&nbsp;</label><?=$row["ch_nom"]?></br>
<label  style="color:blue">Prix :&nbsp;</label><?=$row["cc_px"]?>$</br>
<label  style="color:blue">Statut :&nbsp;</label>payé</br>
<label  style="color:blue">Data ajout :&nbsp;</label><?=$row["cc_date"]?></br>
 <?php  }  } ?>
  
