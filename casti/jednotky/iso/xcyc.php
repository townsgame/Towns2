<?php
/*
$quit = 0;


$xc = $_SESSION["xc"]+$_SESSION["nove"];
$yc = $_SESSION["yc"]+$_SESSION["novey"];

$_SESSION["nove"]=$_SESSION["nove"]+1;
if($_SESSION["nove"]==+$_SESSION["zoom"]){
  $_SESSION["nove"] = 0;
  $_SESSION["novey"] = $_SESSION["novey"]+1;
}
*/

echo("../index.php?dir=casti/mapa/policko.php&amp;xc=".($xc-1)."&amp;yc=".($yc-1)); 
//echo(($xc-1)."/".($yc-1)); 
?>