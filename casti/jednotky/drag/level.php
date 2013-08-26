<?php
$x = 1.08;
$level = $_GET["level"];
$pozadie = $_GET["pozadie"];

$h = $level-500+25;
$w = 50;
//echo(intval($x*$w)."/".intval($h));
$im = ImageCreate(intval($x*$w), intval($h*$x));
//$level = $level/$x;

if($pozadie == 10){ $b1 = 0x66; $b2 = 0x99; $b3 = 0xFF; }
elseif($pozadie == 11){ $b1 = 0xcc; $b2 = 0xcc; $b3 = 0xcc;}
elseif($pozadie == 12){ $b1 = 0x66; $b2 = 0x33; $b3 = 0x00; }
elseif($pozadie == 13){ $b1 = 0x00; $b2 = 0x00; $b3 = 0x00; }
elseif($pozadie == 14){ $b1 = 0x66; $b2 = 0xFF; $b3 = 0xFF; }
elseif($pozadie == 15){ $b1 = 0xCC; $b2 = 0x99; $b3 = 0x00; }
elseif($pozadie == 16){ $b1 = 0xFF; $b2 = 0xFF; $b3 = 0x00; }
elseif($pozadie == 17){ $b1 = 0x00; $b2 = 0x00; $b3 = 0x00; }
elseif($pozadie == 18){ $b1 = 0x66; $b2 = 0xFF; $b3 = 0xCC; }
elseif($pozadie == 19){ $b1 = 0x66; $b2 = 0x99; $b3 = 0x33; }
$c = ImageColorAllocateAlpha($im,0x00,0x00,0x00,90);
$b = ImageColorAllocateAlpha($im,0xFF,0xFF,0xFF,127);
$a1 = ImageColorAllocateAlpha($im,(0xaa+$b1)/2,(0xaa+$b2)/2,(0xaa+$b3)/2,0);
$a2 = ImageColorAllocateAlpha($im,(0x33+$b1)/2,(0x33+$b2)/2,(0x33+$b3)/2,0);
$a3 = ImageColorAllocateAlpha($im,(0xcc+$b1)/2,(0xcc+$b2)/2,(0xcc+$b3)/2,0);
ImageFill($im,0,0,$b);

$points = array(
$x*0,$x*12.5,
$x*25,$x*25,
$x*25,($x*25)+$level-500,
$x*0,$level-500+($x*12.5),
);
imagefilledpolygon($im,$points,4,$a1);

$points = array(
$x*50,$x*12.5,
$x*25,$x*25,
$x*25,($x*25)+$level-500,
$x*50,$level-500+($x*12.5),
);
imagefilledpolygon($im,$points,4,$a2);
$points = array(
$x*50,$x*12.5,
$x*25,$x*25,
$x*0,$x*12.5,
$x*25,$x*0
);
imagefilledpolygon($im,$points,4,$a3);

imageline($im,$x*0,$level-500+($x*12.5),$x*25,($x*25)+$level-500,$c);
imageline($im,$x*25,($x*25)+$level-500,$x*50,$level-500+($x*12.5),$c);
header("Cache-Control: no-cache, must-revalidate");
header("Content-type: image/png");
ImagePng($im);
ImageDestroy($im);
?>