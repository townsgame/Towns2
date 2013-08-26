<?php
$quit = 0;


$xcd = $_SESSION["xcs"]+$_SESSION["noves"];
$ycd = $_SESSION["ycs"]+$_SESSION["noveys"];

$_SESSION["noves"]=$_SESSION["noves"]+1;
if($_SESSION["noves"]==+$_SESSION["zooms"]){
  $_SESSION["noves"] = 0;
  $_SESSION["noveys"] = $_SESSION["noveys"]+1;
}


echo("../../index.php?dir=casti/mapa/policko.php&amp;xc1=".$xcd."&amp;yc1=".$ycd); 
?>