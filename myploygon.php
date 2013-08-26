<?php
function mypolygon($points,$color){
$color=imagecolorallocate($_SESSION["im"],($color[0]/100*255),($color[1]/100*255),($color[2]/100*255));
imagefilledpolygon($_SESSION["im"],$points,sizeof($points)/2,$color);
}

$_SESSION["im"] = ImageCreate(100,100);
$r=imagecolorallocate($_SESSION["im"],255,255,255);
imagefill($_SESSION["im"],0,0,$r);
 
$points = array(
30,30,
70,30,
70,70,
30,70
);


mypolygon($points,array(0,100,0));

header("Cache-Control: no-cache, must-revalidate");
header("Content-type: image/png");
ImagePng($_SESSION["im"]);
ImageDestroy($_SESSION["im"]);
/**/
?>