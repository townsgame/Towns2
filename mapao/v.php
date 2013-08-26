<?php
ini_set("memory_limit","400M");
ini_set("max_execution_time","60");
$nocontroling = 1;
$nocontroling = 1;
$root = "../";
require("../casti/funkcie/index.php");
//------------------------
$s=2.5;
function op($url,$x,$y,$xx,$yy){
$tmp = imagecreatefrompng($url);
imagecopyresampled($_SESSION["im"],$tmp,$xx,$yy,0,0,$x,$y,imagesx($tmp),imagesy($tmp));
ImageDestroy($tmp);
}

$xcc=50*50*2*$s;
$ycc=(25*47.68*2*$s)-25;
/*if(!$_GET["co"] or $_GET["co"]==1){ $xm=0; $ym=0; }
if($_GET["co"]==2){ $xm=$xcc; $ym=0; }
if($_GET["co"]==3){ $xm=0; $ym=$ycc; }
if($_GET["co"]==4){ $xm=$xcc; $ym=$ycc; }*/

$_SESSION["im"] = ImageCreate($xcc,$ycc+25);
$s=5;
$ycc=25*47.68*2*$s;

$b = imagecolorallocatealpha($_SESSION["im"],0,0,0,/*127*/0);
ImageFill($_SESSION["im"],0,0,$b);

$yc = -1;
while ($yc <= $s-2) {
$yc=$yc+1;
$xc = -1;
while ($xc <= $s-2) {
$xc=$xc+1;
//-------------------------------
$uurrll="xc_".(($xc*50)+1)."yc_".(($yc*50)+1).".png";
$xu=$xc;
$yu=$yc;
$xx=(50*25*2*$xu)-(25*50*2*$yu);
$yy=(12.5*47.6*2*$xu)+(12.5*47.6*2*$yu);
$xx=$xx+10000-$xm;
$yy=$yy-93-$ym;


op($uurrll,50*50,25*50,$xx/2,$yy/2);

//-------------------------------
//echo("(".$xc.",".$yc.")"); 
}
//echo("<br/>");
}
header("Content-type: image/png");
ImagePng($_SESSION["im"],"mapa.png");
ImagePng($_SESSION["im"]);
ImageDestroy($_SESSION["im"]);
?>