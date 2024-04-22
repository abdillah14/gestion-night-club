<?php 

 require("model/vente_model.php");  

function  vente(){

require("views/vente/vente_view.php");

include("views/script/vente/vente_print.php");
// include("views/vente/modale/add_img.php");  
// require("views/vente/script/voir_vente.php");
// require("views/vente/script/m_vente.php");

}
function  vente_plat(){

require("views/vente/vente_plat.php");

include("views/script/vente_plat/vente_print.php");
// include("views/vente/modale/add_img.php");  
// require("views/vente/script/voir_vente.php");
// require("views/vente/script/m_vente.php");

}


function  dette(){

require("views/page/dette_boisson.php");

include("views/script/vente/vente_print.php");
// include("views/vente/modale/add_img.php");  
// require("views/vente/script/voir_vente.php");
// require("views/vente/script/m_vente.php");

}
function  dette_plat(){

require("views/page/dette_plat.php");

include("views/script/vente_plat/vente_print.php");
// include("views/vente/modale/add_img.php");  
// require("views/vente/script/voir_vente.php");
// require("views/vente/script/m_vente.php");

}