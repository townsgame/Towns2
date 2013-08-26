<?php
$root = "../../";
$nocontroling = 1;
require("../funkcie/index.php");
require("../funkcie/vojak.php");

//echo($_SESSION["obrazokk"]);
$x_od = $_GET["xc"];
$y_od = $_GET["yc"];
$size = 50;
$pxl = 2;
$im = ImageCreate($size*$pxl,$size*$pxl);

$o1 = ImageColorAllocate($im,0xcc,0xcc,0xcc);
$o2 = ImageColorAllocate($im,0x00,0x00,0x00);

$b = ImageColorAllocate($im,0x00,0x00,0x00);
$r = ImageColorAllocate($im,0x00 ,0x00 ,0x00);
$h = ImageColorAllocate($im,0x66 ,0x33 ,0x00);
$rr = ImageColorAllocate($im,0xcc ,0xcc ,0xcc);
$r2 = ImageColorAllocate($im,0xcc,0xcc,0xcc);
//--------------------
function cczz($x,$y){
if($x<1 or $y<1){ return(false); }else{ return(true); }
}
//--------------------
/*$p10 = ImageColorAllocate($im,0x66 ,0x99 ,0xFF );
$p11 = ImageColorAllocate($im,0xCC ,0xCC ,0xCC );
$p12 = ImageColorAllocate($im,0x66 ,0x33 ,0x00 );
$p13 = ImageColorAllocate($im,0x00 ,0x00 ,0x00 );
$p14 = ImageColorAllocate($im,0x66 ,0xFF ,0xFF );
$p15 = ImageColorAllocate($im,0xCC ,0x99 ,0x00 );
$p16 = ImageColorAllocate($im,0xFF ,0xFF ,0x00 );
$p17 = ImageColorAllocate($im,0x00 ,0x00 ,0x00 );
$p18 = ImageColorAllocate($im,0x66 ,0xFF ,0xCC );
$p19 = ImageColorAllocate($im,0x66 ,0x99 ,0x00 );*/
$kamen = ImageColorAllocate($im,0x55 ,0x55 ,0x55 );
$zelezo = ImageColorAllocate($im,0x55 ,0x55 ,0x55 );
$drevo = ImageColorAllocate($im,0x00 ,0x66 ,0x00 );
$pevnina = ImageColorAllocate($im,0x66 ,0x99 ,0x00 );
$more = ImageColorAllocate($im,0x66 ,0x99 ,0xFF );
$hrac = ImageColorAllocate($im,0xFF ,0x00 ,0x00 );
$zlta = ImageColorAllocate($im,0xFF ,0xCC ,0x00 );
$ciara = imagecolorallocatealpha($im,0x00 ,0x00 ,0x00,0x33);
//$v_c = ImageColorAllocate($im,0,0,0);
//$v_b = ImageColorAllocate($im,200,200,200);
ImageFill($im,0,0,$pevnina);

//echo("SELECT xc,yc,pozadie FROM towns2 WHERE xc>".($x_od-1)." AND yc>".($y_od-1)." AND xc<".($size+$x_od)." AND yc<".($size+$y_od)." ORDER BY yc,xc");
//echo hnet("towns2","SELECT COUNT(xc) FROM towns2 WHERE xc>".($x_od-1)." AND yc>".($y_od-1)." AND xc<".($size+$x_od)." AND yc<".($size+$y_od)." ORDER BY yc,xc",99999999);
$cnt = 0;
foreach(hnet2("towns2","SELECT xc,yc,pozadie,obrazok,vlastnik FROM towns2 WHERE xc>".($x_od-1)." AND yc>".($y_od-1)." AND xc<".($size+$x_od)." AND yc<".($size+$y_od)." ORDER BY yc,xc",99999999) as $row){
//--------------------
$cnt = $cnt+1;
$x1 = (($row["xc"]-$x_od+0)*$pxl)+0;
$y1 = (($row["yc"]-$y_od+0)*$pxl)+0;
$x2 = (($row["xc"]-$x_od+1)*$pxl)+0;
$y2 = (($row["yc"]-$y_od+1)*$pxl)+0;
/*if($row["pozadie"] == 10){ imagefilledrectangle ($im,$x1,$y1,$x2,$y2,$p10); }
elseif($row["pozadie"] == 11){ imagefilledrectangle($im,$x1,$y1,$x2,$y2,$p11); }
elseif($row["pozadie"] == 12){ imagefilledrectangle($im,$x1,$y1,$x2,$y2,$p12); }
elseif($row["pozadie"] == 13){ imagefilledrectangle($im,$x1,$y1,$x2,$y2,$p13); }
elseif($row["pozadie"] == 14){ imagefilledrectangle($im,$x1,$y1,$x2,$y2,$p14); }
elseif($row["pozadie"] == 15){ imagefilledrectangle($im,$x1,$y1,$x2,$y2,$p15); }
elseif($row["pozadie"] == 16){ imagefilledrectangle($im,$x1,$y1,$x2,$y2,$p16); }
elseif($row["pozadie"] == 17){ imagefilledrectangle($im,$x1,$y1,$x2,$y2,$p17); }
elseif($row["pozadie"] == 18){ imagefilledrectangle($im,$x1,$y1,$x2,$y2,$p18); }
elseif($row["pozadie"] == 19){ imagefilledrectangle($im,$x1,$y1,$x2,$y2,$p19); }*/
if($row["pozadie"] == 10){ imagefilledrectangle ($im,$x1,$y1,$x2,$y2,$more); }
if($row["obrazok"] == "les"){ imagefilledrectangle ($im,$x1,$y1,$x2,$y2,$drevo); }
if($row["obrazok"] == "kamen"){ imagefilledrectangle ($im,$x1,$y1,$x2,$y2,$kamen); }
if($row["obrazok"] == "zelezo"){ imagefilledrectangle ($im,$x1,$y1,$x2,$y2,$zelezo); }
if($row["vlastnik"] != 1){ imagefilledrectangle ($im,$x1,$y1,$x2,$y2,$hrac); }
if($row["obrazok"] == "sopka"){ imagefilledellipse  ($im,$x1,$y1,5,5,$zlta); }
//--------------------
/*if(intval($row["yc"]/10) == ($row["yc"]/10) ){
imagefilledrectangle ($im,$x1,$y1,$x1+(10*$pxl),$y1+(10*$pxl),$ciara);
}*/
//--------------------
}
//--------------------
/*foreach(hnet2("towns2","SELECT hlbudovaxc,hlbudovayc,meno FROM towns2_uziv") as $row){
imagefilledrectangle($im,($row["hlbudovaxc"]*$pxl)-2+($x_od-1),($row["hlbudovayc"]*$pxl)-2,($row["hlbudovaxc"]*$pxl)+2+(6*strlen($row["meno"]))+($x_od-1),($row["hlbudovayc"]*$pxl)+14,$b);
imagefilledrectangle($im,($row["hlbudovaxc"]*$pxl)-1+($x_od-1),($row["hlbudovayc"]*$pxl)-1,($row["hlbudovaxc"]*$pxl)+1+(6*strlen($row["meno"]))+($x_od-1),($row["hlbudovayc"]*$pxl)+13,$r2);
ImageString($im,2,$row["hlbudovaxc"]*$pxl,$row["hlbudovayc"]*$pxl,$row["meno"],$r);
}*/
//--------------------
foreach(hnet2("towns2","SELECT hlbudovaxc,hlbudovayc,meno,body FROM towns2_uziv WHERE poradie<10 OR id='".$_SESSION["id"]."' "/*AND xc<".($x_od)." AND yc<".($y_od)*/." ORDER by body desc") as $row){
//ImageString($im,/*$row["body"]/100*/2,($row["hlbudovaxc"]-$x_od)*$pxl,($row["hlbudovayc"]-$y_od)*$pxl,$row["meno"],$rr);
$x1=(($row["hlbudovaxc"]-$x_od)*$pxl);
$y1=($row["hlbudovayc"]-$y_od)*$pxl;
$x2=$x1+(strlen($row["meno"])*5);
$y2=$y1+8;
if(cczz($x2+1,$y2+1)){
imagefilledrectangle($im,$x1-2,$y1-2,$x2+1,$y2+1,$o2);
imagefilledrectangle($im,$x1-1,$y1-1,$x2,$y2,$o1);
}
ImageString($im,0.5,$x1,$y1,$row["meno"],$r);
}
//--------------------
foreach(hnet2("towns2_utok","SELECT * FROM towns2_utok") as $row){
$x1=($row["xc"]-$x_od)*$pxl;
$y1=($row["yc"]-$y_od)*$pxl;
$x2=($row["txc"]-$x_od)*$pxl;
$y2=($row["tyc"]-$y_od)*$pxl;
$pomer=1-(($row["cas"]-time())/($row["cas"]-$row["tcas"]));
if(time()>$row["cas"]){ $h = ImageColorAllocate($im,0xff ,0x0 ,0x00); $pomer=1; }
$xx=(($x1-$x2)*$pomer)+$x2;
$yy=(($y1-$y2)*$pomer)+$y2;

eval(vojakrozloz($row["vojak"]));
$velkost = sqrt($v + $s + $k + $r + $j + $t + $z + $b + $a + $e + $n + $d + $m);
//imageline($im,$x1+0,$y1+0,$x2+0,$y2+0,$h);
//imageline($im,$x1+1,$y1+1,$x2+1,$y2+1,$h);
imagefilledellipse($im,$xx,$yy,$velkost+2,$velkost+2,$r);
imagefilledellipse($im,$xx,$yy,$velkost,$velkost,$h);
$h = ImageColorAllocate($im,0x66 ,0x33 ,0x00);
}
//--------------------
//echo($cnt);
header("Content-type: image/png");
ImagePng($im);
ImageDestroy($im);/**/
?>