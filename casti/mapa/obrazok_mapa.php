<?php
$root = "../../";
$nocontroling = 1;
require("../funkcie/index.php");
$url = "../../index/mini_mapa".$_GET["xc"]."xc".$_GET["yc"]."yc.txt";


if(!file_exists($url)){


//echo($_SESSION["obrazokk"]);
$x_od = $_GET["xc"];
$y_od = $_GET["yc"];
$size = 10;
$im = ImageCreate($size, $size);

$b = ImageColorAllocate($im,200,200,200);
//$v_c = ImageColorAllocate($im,0,0,0);
//$v_b = ImageColorAllocate($im,200,200,200);
ImageFill($im,0,0,$b);

//echo("SELECT xc,yc,pozadie FROM towns2 WHERE xc>".($x_od-1)." AND yc>".($y_od-1)." AND xc<".($size+$x_od)." AND yc<".($size+$y_od)." ORDER BY yc,xc");
foreach(hnet2("towns2","SELECT xc,yc,pozadie FROM towns2 WHERE xc>".($x_od-1)." AND yc>".($y_od-1)." AND xc<".($size+$x_od)." AND yc<".($size+$y_od)." ORDER BY yc,xc",99999999) as $row){
//--------------------
if($row["pozadie"] == 10){ $bg = ImageColorAllocate($im,0x66 ,0x99 ,0xFF ); }
elseif($row["pozadie"] == 11){ $bg = ImageColorAllocate($im,0xCC ,0xCC ,0xCC ); }
elseif($row["pozadie"] == 12){ $bg = ImageColorAllocate($im,0x66 ,0x33 ,0x00 ); }
elseif($row["pozadie"] == 13){ $bg = ImageColorAllocate($im,0x00 ,0x00 ,0x00 ); }
elseif($row["pozadie"] == 14){ $bg = ImageColorAllocate($im,0x66 ,0xFF ,0xFF ); }
elseif($row["pozadie"] == 15){ $bg = ImageColorAllocate($im,0xCC ,0x99 ,0x00 ); }
elseif($row["pozadie"] == 16){ $bg = ImageColorAllocate($im,0xFF ,0xFF ,0x00 ); }
elseif($row["pozadie"] == 17){ $bg = ImageColorAllocate($im,0x00 ,0x00 ,0x00 ); }
elseif($row["pozadie"] == 18){ $bg = ImageColorAllocate($im,0x66 ,0xFF ,0xCC ); }
elseif($row["pozadie"] == 19){ $bg = ImageColorAllocate($im,0x66 ,0x99 ,0x00 ); }
/*if(rand(1,2) == 1){
$v_farba = $v_c;
}else{
$v_farba = $v_b;
}*/
imagesetpixel($im,$row["xc"]-$x_od+1,$row["yc"]-$y_od+1,$bg);

//--------------------
}

//--------------------------------------
function obrazokcash($buffer){
file_put_contents("abcdef.txt","sedgf");
file_put_contents("../../index/mini_mapa".$_GET["xc"]."xc".$_GET["yc"]."yc.txt",$buffer);
return($buffer);
}
ob_start("obrazokcash");
//--------------------------------------
file_put_contents("abcdef.txt","sedgf");
header("Content-type: image/png");
ImagePng($im);
ImageDestroy($im);

}else{
header("Content-type: image/png");
echo(file_get_contents($url));	
}
?>