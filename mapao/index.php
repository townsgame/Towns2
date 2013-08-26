<?php
ini_set("memory_limit","200M");
ini_set("max_execution_time","60");
$nocontroling = 1;
$nocontroling = 1;
$root = "../";
require("../casti/funkcie/index.php");
//------------------------
$xc = $_GET["xc"];
$yc = $_GET["yc"];
$zoom = 50;
$uurrll="xc_".$xc."yc_".$yc.".png";
if(!file_exists($uurrll)){
//while
//------------------------
$s=2;
/*$zoom = 10;
$xc = 1;
$yc = 1;*/

function op($url,$x,$y,$xx,$yy,$ne=0){
$file=file_get_contents($url);
if(strpos($file,"PNG") and $ne==0){
$pos = strrpos($url,"/")+1;
$url = substr($url,0,$pos)."+".substr($url,$pos);
}
if(!$ne){
$tmp = imagecreatefromgif($url);
}else{
$tmp = imagecreatefrompng($url);	
}
imagecopyresampled($_SESSION["im"],$tmp,$xx,$yy,0,0,$x,$y,imagesx($tmp),imagesy($tmp));
}
//-----
//------------------------
/*$tmp = imagecreatefrompng("casti/jednotky/drag/mapa/dom/1.gif");
//$tmp = ImageCreate(100, 100);
//$b = imagecolorallocatealpha($tmp,256,0,0,127);
//$_SESSION["im"] = ImageCreate(100,100);
//imagealphablending($tmp, true);
//imagesavealpha($tmp, true);
//header("Content-type: image/png");
//imagefill($tmp,0,0,$b); 
ImageGif($tmp,"tmp.gif");
ImageDestroy($tmp);
die;
*/
//------------------------

//echo($_SESSION["obrazokk"]);
$h = ($zoom*25)+(75);
$w = ($zoom*50)+(50);
$_SESSION["im"] = ImageCreate($w*$s, $h*$s);



//imagecolortransparent($im);
$b = imagecolorallocatealpha($_SESSION["im"],0,0,0,127);
$c = ImageColorAllocate($_SESSION["im"],0,0,0);
//op("http://2.towns.cz/casti/suroviny/desing/prachy.png",20,20,0,0);
//imagecolortransparent($_SESSION["im"]);
ImageFill($_SESSION["im"],0,0,$b);

//----------------------
$castdotazu = "towns2_2.vlastnik = towns2.vlastnik";
//$castdotazu = "(SELECT ali from towns2_uziv WHERE id = towns2_2.vlastnik)=(SELECT ali from towns2_uziv WHERE id = towns2.vlastnik)";
//$castdotazu = "(SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE $castdotazu AND towns2_uni.obrazok=towns2_2.obrazok AND towns2_2.xc=towns2.xc AND towns2_2.yc=towns2.yc),(SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE $castdotazu AND towns2_uni.obrazok=towns2_2.obrazok AND towns2_2.xc=towns2.xc AND towns2_2.yc+1=towns2.yc),(SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE $castdotazu AND towns2_uni.obrazok=towns2_2.obrazok AND towns2_2.xc=towns2.xc AND towns2_2.yc-1=towns2.yc),(SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE $castdotazu AND towns2_uni.obrazok=towns2_2.obrazok AND towns2_2.xc+1=towns2.xc AND towns2_2.yc=towns2.yc),(SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE towns2_uni.obrazok=towns2_2.obrazok AND towns2_2.xc-1=towns2.xc AND towns2_2.yc=towns2.yc)";
/*
(SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE $castdotazu AND towns2_uni.obrazok=towns2_2.obrazok AND towns2_2.xc=towns2.xc AND towns2_2.yc+1=towns2.yc)
(SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE $castdotazu AND towns2_uni.obrazok=towns2_2.obrazok AND towns2_2.xc=towns2.xc AND towns2_2.yc-1=towns2.yc)
(SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE $castdotazu AND towns2_uni.obrazok=towns2_2.obrazok AND towns2_2.xc+1=towns2.xc AND towns2_2.yc=towns2.yc)
(SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE towns2_uni.obrazok=towns2_2.obrazok AND towns2_2.xc-1=towns2.xc AND towns2_2.yc=towns2.yc)
*/
$castdotazu = "
tmp,
IF(tmp!='',(SELECT towns2_2.tmp FROM towns2 towns2_2 WHERE $castdotazu AND towns2_2.xc+0=towns2.xc AND towns2_2.yc+1=towns2.yc),''),
IF(tmp!='',(SELECT towns2_2.tmp FROM towns2 towns2_2 WHERE $castdotazu AND towns2_2.xc+0=towns2.xc AND towns2_2.yc-1=towns2.yc),''),
IF(tmp!='',(SELECT towns2_2.tmp FROM towns2 towns2_2 WHERE $castdotazu AND towns2_2.xc+1=towns2.xc AND towns2_2.yc+0=towns2.yc),''),
IF(tmp!='',(SELECT towns2_2.tmp FROM towns2 towns2_2 WHERE $castdotazu AND towns2_2.xc-1=towns2.xc AND towns2_2.yc+0=towns2.yc),'')";
//$castdotazu = "(SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE $castdotazu AND towns2_uni.obrazok=towns2_2.obrazok AND towns2_2.xc=towns2.xc AND towns2_2.yc=towns2.yc)";
//$castdotazu = "towns2_uni.skupina";
//$castdotazu = "$castdotazu,towns2.tmp_s1,towns2.tmp_s2,towns2.tmp_s3,towns2.tmp_s4";
//$castdotazu = "1";
//$castdotazu = "'','s','','',''";
/*echo*/$odpoved =hnet2("towns2","select $castdotazu,towns2_uni.size,towns2.level,towns2.uroven,towns2.pozadie,towns2_uziv.meno vlistnik,towns2.cas,towns2.obrazok,towns2.rand,towns2.xc,towns2.yc,towns2.vlastnik,towns2.utokna,towns2.zivot,towns2_uni.meno,towns2_uni.zivot zivotmax
from towns2
left join towns2_uni ON towns2.obrazok = towns2_uni.obrazok
left join towns2_uziv ON towns2.vlastnik = towns2_uziv.id
WHERE towns2.xc > ".($xc-1)." AND towns2.yc > ".($yc-1)." AND towns2.xc < ".($xc+$zoom)." AND towns2.yc < ".($yc+$zoom)." order by yc,xc",99999999);
foreach($odpoved as $row){
//----------------------
$xu=$row["xc"]-$xc+1;
$yu=$row["yc"]-$yc+1;

$xx=(25*$s*$xu)-(25*$s*$yu);
$yy=(12.5*$s*$xu)+(12.5*$s*$yu);
$xx=$xx-50+(25*$s*$zoom);
$yy=$yy+50;

//echo("-(".$row["xc"].",".$row["yc"].")<br/>");
//imagestring($_SESSION["im"],4,$xx,$yy,"(".$row["xc"].",".$row["yc"].")",$c);








op("../casti/jednotky/drag/pozadie/".$row["pozadie"]."/index.gif",$s*50*2,$s*25*2,$xx,$yy);

}
//echo("a<br/>");
foreach($odpoved as $row){
//----------------------------------------------
$aa=$row["rand"];
if($row[0] != ""){
//echo("(".$row["xc"].",".$row["yc"].")");

$a = "0";
$b = "0";
$c = "0";
$d = "0";
if($row[0] == $row[4]){$a = "1"; }
if($row[0] == $row[2]){$b = "1"; }
if($row[0] == $row[1]){$c = "1"; }
if($row[0] == $row[3]){$d = "1"; }
$aa = "a".$a.$b.$c.$d;
//echo($aa);
if($aa == "a1111"){ $aa = "1";}
if($aa == "a1110"){ $aa = "2";}
if($aa == "a1101"){ $aa = "3";}
if($aa == "a1100"){ $aa = "4";}
if($aa == "a1011"){ $aa = "5";}
if($aa == "a1010"){ $aa = "6";}
if($aa == "a1001"){ $aa = "7";}
if($aa == "a1000"){ $aa = "8";}
if($aa == "a0111"){ $aa = "9";}
if($aa == "a0110"){ $aa = "10";}
if($aa == "a0101"){ $aa = "11";}
if($aa == "a0100"){ $aa = "12";}
if($aa == "a0011"){ $aa = "13";}
if($aa == "a0010"){ $aa = "14";}
if($aa == "a0001"){ $aa = "15";}
if($aa == "a0000"){ $aa = "16";}
//echo(" / ");
//echo($aa);
}
//----------------------------------------------
$xu=$row["xc"]-$xc+1;
$yu=$row["yc"]-$yc+1;

$xx=(25*$s*$xu)-(25*$s*$yu);
$yy=(12.5*$s*$xu)+(12.5*$s*$yu);
$xx=$xx+10+(25*$s*$zoom);
$yy=$yy-20;
$yy=$yy-($s*($row["level"]-500));

if($row["level"]!=500){
op("http://2.towns.cz/casti/jednotky/drag/level.php?level=".$row["level"]."&pozadie=".$row["pozadie"],$s*50*$row["size"],$s*($row["level"]-500+25)*$row["size"],$xx-((50*$size)/2)-($s*25*($row["size"]-1)),$yy+(50*$s),1);
} /* */
//echo("(".$xx.",".$yy.")<br/>");
op("../casti/jednotky/drag/mapa/".$row["obrazok"]."/".$aa.".gif",$s*50*$row["size"],$s*75*$row["size"],$xx-((50*$size)/2)-($s*25*($row["size"]-1)),$yy-((25*$size)/2)-($s*45*($row["size"]-1)));
}

header("Content-type: image/png");
ImagePng($_SESSION["im"],$uurrll);
echo(file_get_contents("bod.png"));
//ImagePng($_SESSION["im"]);
ImageDestroy($_SESSION["im"]);/**/
}else{
header("Content-type: image/png");
echo(file_get_contents("bod.png"));
//echo(file_get_contents($uurrll));
}
?>