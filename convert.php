<?php
ini_set("memory_limit","400M");
ini_set("max_execution_time","60");
/*$nocontroling = 1;
$root = "../";
require("../casti/funkcie/index.php");*/
//------------------------
$url="mapao/mapa.png";
//$url="mapao/xc_1yc_1.png";
$q=700/$_GET["x"];
$tmp = imagecreatefrompng($url);
//----------------
$b = imagecolorallocatealpha($tmp,0,0,0,0);
imagefill($tmp, 0, 0, $b);
//----------------
$im =  imagecreate($_GET["x"]*$q,$_GET["y"]*$q);
imagecopyresampled($im,$tmp,0,0,$_GET["xx"],$_GET["yy"],$_GET["x"]*$q,$_GET["y"]*$q,$_GET["x"],$_GET["y"]);
//$xx = imagecolorallocatealpha($im,0,0,0,127);
//imagefill($im, 0, 0, $xx); 
//-----------------
/*$map = imagecolorallocatealpha($tmp,255,0,0,50);
imagefilledrectangle($im,5,5,105,55,$map);*/
//-----------------
header("Content-type: image/jpeg");
ImageJpeg($im); 
ImageDestroy($im);
ImageDestroy($tmp);


/*$im = imagecreatefromjpeg("mapao/mapax.jpeg");
header("Content-type: image/png");
ImagePng($im); 
ImageDestroy($im);*/


/*$url="../casti/jednotky/drag/mapa/hradba/10.gif";

$tmp = imagecreatefrompng($url);
$im =  imagecreate (imagesx($tmp),imagesy($tmp));
//$im = imagecreatefromstring(file_get_contents($url));

$red = imagecolorallocatealpha($tmp,255,255,0,127);
imagefill($tmp, 0, 0, $red);

imagecopyresampled($im,$tmp,0,0,0,0,imagesx($im),imagesy($im),imagesx($tmp),imagesy($tmp));
ImageDestroy($tmp);

//$red2 = imagecolorallocatealpha($im,255,0,0,127);
imagefill($im, 0, 0, $red2);



header("Content-type: image/gif");
ImageGIF($im); 
ImageGIF($im,"a.gif");
ImageDestroy($im);*/
?>