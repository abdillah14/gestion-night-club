<?php 
session_start();
include("../../../config/dbConnect.php");
 

if(isset($_POST["ds"]))
{
            $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $string=str_shuffle($string);
            $c=substr($string,0,5);
            $idd='S-'.$c;
            $iddd=$_SESSION["id"];

 $ds = $_POST["ds"];
 $nom = $_POST["nom"];
 $nm = $_POST["nm"];
 $px = $_POST["px"];
 $tp = $_POST["tp"];
 $hr = $_POST["hr"];
 $id = $_POST["id"];
 $stat = "Occupée";
 $iddd =$_SESSION["id"];


   $success=false;

     $con=dbConnect();
   $req=$con->prepare("insert into chambre_client(
                     id_ch,cc_nom,cc_px,cc_statut,cc_details,cc_num,cc_type,cc_tmp,id_user) 

                      values(:id_ch,:cc_nom,:cc_px,:cc_statut,:cc_details,:cc_num,:cc_type,:cc_tmp,:id_user)") ;
     $success=$req->execute(array(
                  
                  ':id_ch'=>$id,
                  ':cc_nom'=>$nom,
                  ':cc_px'=>$px,
                  ':cc_statut'=>$stat,
                  ':cc_details'=>$ds,
                  ':cc_num'=>$nm,
                  ':cc_type'=>$tp,
                  ':cc_tmp'=>$hr,
                  ':id_user'=>$iddd
                  
                  )) ;

        

 }
 echo json_encode(array('success'=>$success));
 
?>
