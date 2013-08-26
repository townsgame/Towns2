<?php
$root = "../";
require("../casti/funkcie/index.php"); 
require("../casti/funkcie/vojak.php");
//---------------------------------------------------
$size = 250;
$voda = 20;
$prek = 200;
$piesok = 50;
$les = 70;
$lad = 10;
$hlina = 5;
$kamene = 15;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MapGenerator</title>
</head>
<body>
<?php
//$prekonrek = 100;
/*
$mapa = array(array(),array(),array(),array(),array(),array(),array(),array(),array(),array());
$mapa[rand(0,$size-1)] = 1;
$q = $size;
while($q > 0){

($mapa[rand(0,$size-1)])[rand(0,$size-1)] = array(rand(0,1));

$q = $q - 1;
}

foreach($mapa as $row){
foreach($row as $row1){
echo($row1." / ");	
}
echo("<br/>");

if(rand(1,20) != 1 AND $x != $size AND $y != $size){
$x_1 = rand(0,1);
$y_1 = rand(0,1);
$mapa[$x+$x_1][$y+$y_1]["pozadie"];
}
elseif(rand(1,4) == 1){ $pozadie = 10; }
elseif(rand(1,5) == 1){ $pozadie = 19; }
elseif(rand(1,5) == 1){ $pozadie = 15; }
elseif(rand(1,5) == 1){ $pozadie = 16; }
elseif(rand(1,5) == 1){ $pozadie = 18; }
elseif(rand(1,5) == 1){ $pozadie = 14; }
elseif(rand(1,5) == 1){ $pozadie = 12; }
elseif(rand(1,5) == 1){ $pozadie = 13; }
}
10 - voda-
11 - cesta-
12 - hlina-
13 - kamene-
14 - sneh-
15 - listy-
16 - piesok-
17 - polosneh-
18 - lad-
19 - trava-
*/
$voda = 100-$voda;
//$piesok = 100-$piesok;
//---------
$x = $size;
while($x > 0){
$y = $size;
while($y > 0){
//------------------------------------	
$mapa[$x][$y]["obrazok"] = 0;
$mapa[$x][$y]["pozadie"] = 10;
//------------------------------------	
$y = $y - 1;	
}
$x = $x - 1;	
}
//-----------------------------------
$q = ($size*$size)*($voda/100);
$x = rand(1,$size);
$y = rand(1,$size);
while($q > 0){

if($mapa[$x][$y]["pozadie"] == 19){$q = $q + 1;	}

$mapa[$x][$y]["pozadie"] = 19;

$x = $x + rand(0,2) -1;
$y = $y + rand(0,2) -1;
if($x > $size-1){ $x = rand(1,$size); }
if($x < 1){$x = rand(1,$size);  }
if($y > $size-1){ $y = rand(1,$size); }
if($y < 1){$y = rand(1,$size);  }

$q = $q - 1;	
}
//-----------------------------------
$q = ($prek*$size)/100;
while($q > 0){
$x = rand(intval($size*0.4),intval($size*0.6));
$y = rand(intval($size*0.4),intval($size*0.6));
$smer = rand(1,2);
$kolik = rand(0,2)-1;
//$prekon = $prekonrek; 
while($mapa[$x][$y]["pozadie"] == 19 and false == ($x > $size-1 or $x < 1 or $y > $size-1 or $y < 1) ){

//if($mapa[$x][$y]["pozadie"] == 19){ $prekon = $prekon-1; }

$q = $q - 1;
$mapa[$x][$y]["pozadie"] = 10;

if($smer == 1){ $mapa[$x][$y+1]["pozadie"] = 10; }
if($smer == 2){ $mapa[$x+1][$y]["pozadie"] = 10; }

if($smer == 2){ $x = $x+$kolik; $y = $y+rand(0,2)-1; }
if($smer == 1){ $y = $y+$kolik; $x = $x+rand(0,2)-1; }
}
}
//-----------------les------------------
function pozadie($mapa_p,$pocet_p,$jake,$size){
$mapa = $mapa_p;
$q = /*($size*$size)*($voda/100)*($les/100)*/intval($pocet_p);
//echo($pocet_p);
$x = rand(1,$size);
$y = rand(1,$size);
while($q > 0){
//if($mapa[$x][$y]["pozadie"] == 19){
//if($mapa[$x][$y]["pozadie"] == 15){	}
if($mapa[$x][$y]["pozadie"] == 10){ $x = rand(1,$size); $y = rand(1,$size); }else{

$mapa[$x][$y]["pozadie"] = $jake; }
//echo("$x / $y / $q / $size / $jake  <br/>");

$x = $x + rand(0,2) -1;
$y = $y + rand(0,2) -1;
if($x > $size-1){ $x = rand(1,$size); }
if($x < 1){$x = rand(1,$size);  }
if($y > $size-1){ $y = rand(1,$size); }
if($y < 1){$y = rand(1,$size);  }
$q = $q - 1;
/*}else{
$x = rand(1,$size);
$y = rand(1,$size);	
}*/
}
return($mapa);
}
//------
$mapa = pozadie($mapa,($size*$size)*($voda/100)*($les/100),15,$size);
$mapa = pozadie($mapa,($size*$size)*($voda/100)*($lad/200),18,$size);
$mapa = pozadie($mapa,($size*$size)*($voda/100)*($lad/200),14,$size);
$mapa = pozadie($mapa,($size*$size)*($voda/100)*($les/100)*($piesok/100),16,$size);
$mapa = pozadie($mapa,($size*$size)*($voda/100)*($les/100)*($hlina/100),12,$size);
$mapa = pozadie($mapa,($size*$size)*($voda/100)*($les/100)*($kamene/100),13,$size);
//------------------ine-----------------
$x = $size;
while($x > 0){
$y = $size;
while($y > 0){
//------------------------------------	
if($mapa[$x][$y]["pozadie"] == 12 or $mapa[$x][$y]["pozadie"] == 13){
if(rand(1,2) == 1){
$mapa[$x][$y]["obrazok"] = "zelezo";	
}else{
$mapa[$x][$y]["obrazok"] = "kamen";	
}
}
if($mapa[$x][$y]["pozadie"] == 15){
$mapa[$x][$y]["obrazok"] = "les";		
}
//------------------------------------	
$y = $y - 1;	
}
$x = $x - 1;	
}
//-----------------------------------




echo("<table width=\"".($size*2)."\" height=\"".($size*2)."\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">");
foreach($mapa as $row){
echo("<tr>");
foreach($row as $row1){
//echo("(".$row1["obrazok"].",".$row1["pozadie"].") / ");	
if($row1["pozadie"] == 10){ $bg = "#6699FF"; }
elseif($row1["pozadie"] == 11){ $bg = "#cccccc"; }
elseif($row1["pozadie"] == 12){ $bg = "#663300"; }
elseif($row1["pozadie"] == 13){ $bg = "#000000"; }
elseif($row1["pozadie"] == 14){ $bg = "#66FFFF"; }
elseif($row1["pozadie"] == 15){ $bg = "#CC9900"; }
elseif($row1["pozadie"] == 16){ $bg = "#FFFF00"; }
elseif($row1["pozadie"] == 17){ $bg = "#000000"; }
elseif($row1["pozadie"] == 18){ $bg = "#66FFCC"; }
elseif($row1["pozadie"] == 19){ $bg = "#669900"; }

echo("<td bgcolor=\"".$bg."\"></td>");
}
echo("</tr>");
//echo("<br/>");
}
echo("</table>");
?>
<table>
<tr><td bgcolor="#6699FF" width="20"></td>
<td>Voda</td></tr>
	
<tr><td bgcolor="#cccccc" width="20"></td>
<td>Cesta</td></tr>
	
<tr><td bgcolor="#663300" width="20"></td>
<td>Hlina</td></tr>
	
<tr><td bgcolor="#000000" width="20"></td>
<td>Kameny</td></tr>
	
<tr><td bgcolor="#66FFFF" width="20"></td>
<td>Snih</td></tr>
		
<tr><td bgcolor="#CC9900" width="20"></td>
<td>Les</td></tr>
		
<tr><td bgcolor="#FFFF00" width="20"></td>
<td>Pisek</td></tr>
		
<tr><td bgcolor="#66FFCC" width="20"></td>
<td>Led</td></tr>
	
<tr><td bgcolor="#669900" width="20"></td>
<td>Trava</td></tr>
</table>
<?php
echo("INSERT INTO towns2 (`xc` , `yc` , `obrazok` , `meno` , `rand` , `pozadie` , `vlastnik` , `cas` , `casovac` , `napis` , `uroven` , `budovanas` , `zivot` , `utokna` , `tmp`) VALUES<br/>");
$x = $size;
while($x > 0){
$y = $size;
while($y > 0){
//------------------------------------
$nod = ",";
if(1 == $x and 1 == $y){ $nod = ""; }
echo("('$x' , '$y' , '".$mapa[$x][$y]["obrazok"]."' , '' , '".rand(1,5)."' , '".$mapa[$x][$y]["pozadie"]."' , '1' , '1' , '0' , '' , '1' , '' , '100' , '0' , '')$nod<br/>");
//------------------------------------	
$y = $y - 1;	
}
$x = $x - 1;	
}
?>
</body>
</html>