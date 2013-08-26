<?php
session_start();
$_SESSION["obrazokk"] = rand(1000,9999);
if($_GET["kodmus"]){
$_SESSION["obrazokk"] = $_GET["kodmus"];
}

//echo($_SESSION["obrazokk"]);
$h = 25;
$w = 50;
$im = ImageCreate($w, $h);

$b = ImageColorAllocate($im,200,200,200);
$farba = ImageColorAllocate($im,0,0,0);


ImageFill($im,0,0,$b);
ImageString($im,4,5,5,$_SESSION["obrazokk"],$farba);

header("Content-type: image/png");
ImagePng($im);
ImageDestroy($im);
?>