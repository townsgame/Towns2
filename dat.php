<?php header("Cache-Control: no-cache, must-revalidate");

if($_GET["zoom"] != 1){
//if($_GET["zoom"] != 10){ die("neplatne zadani"); }
//if($_GET["xc"] > map_x){ die("neplatne zadani_xc+"); }
//if($_GET["yc"] > map_y){ die("neplatne zadani_yc+"); }
//if($_GET["xc"] < 1){ die("neplatne zadani_xc-"); }
//if($_GET["yc"] < 1){ die("neplatne zadani_yc-"); }
//if( (($_GET["xc"]-1)/10) != intval(($_GET["xc"]-1)/10)  ){ die("neplatne zadani"); }
//if( (($_GET["yc"]-1)/10) != intval(($_GET["yc"]-1)/10)  ){ die("neplatne zadani"); }
}

$nocontroling = 1;
require("casti/funkcie/index.php");

$zoom = $_GET["zoom"];
$xc = $_GET["xc"];
$yc = $_GET["yc"];
$url = "index/mapa".$zoom."zoom".$xc."xc".$yc."yc.txt";


if(!file_exists($url)){

//UPDATE towns2 SET tmp = (SELECT skupina FROM towns2_uni WHERE towns2_uni.obrazok = towns2.obrazok LIMIT 0,1)
//pododo0000am0000hlsk0000ve0000000000dotdsk0000bavltk00vldo00td0000hrhrskposktzka000000vedotdsktkdo00kascscvltkskpoveve00000000hlskamhlve0000000000dotd00000000000000000000000000000000000000000000000000
//05010305040203020405050502030402020101010505020504030104020303040504030104040101040403040501020405030202040304020104010305030503010302030102010303050105030305050502010501010505010205030303050205050205
//$a_t="IF((SELECT towns2_uni.skupina FROM towns2 towns2_2,towns2_uni WHERE towns2_uni.obrazok=towns2_2.obrazok),";
//$b_t=",'";  
//$castdotazu = "1";
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
/*echo*/$odpoved =mysql_query("select $castdotazu,towns2.level,towns2.uroven,towns2.pozadie,towns2_uziv.meno vlistnik,towns2.cas,towns2.obrazok,towns2.rand,towns2.xc,towns2.yc,towns2.vlastnik,towns2.utokna,towns2.zivot,towns2_uni.meno,towns2_uni.zivot zivotmax
from towns2
left join towns2_uni ON towns2.obrazok = towns2_uni.obrazok
left join towns2_uziv ON towns2.vlastnik = towns2_uziv.id
WHERE towns2.xc > ".($xc-1)." AND towns2.yc > ".($yc-1)." AND towns2.xc < ".($xc+$zoom)." AND towns2.yc < ".($yc+$zoom)." order by yc,xc");
while ($row = mysql_fetch_array($odpoved)) {
//   2
// 3 0 4
//   1
$aa = "";
if($row["cas"] == "2"){ $aa = "06"; }
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
if($aa == "a1111"){ $aa = "01";}
if($aa == "a1110"){ $aa = "02";}
if($aa == "a1101"){ $aa = "03";}
if($aa == "a1100"){ $aa = "04";}
if($aa == "a1011"){ $aa = "05";}
if($aa == "a1010"){ $aa = "06";}
if($aa == "a1001"){ $aa = "07";}
if($aa == "a1000"){ $aa = "08";}
if($aa == "a0111"){ $aa = "09";}
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

    
$dat4 = $dat4.substr("000".$row["vlastnik"],-4);
$dat1 = $dat1.substr(($row["obrazok"]."0000"),0,2);
$dat3 = $dat3.substr("000".$row["utokna"],-4);
$dat2 = $dat2.substr("000".$row["zivot"],-4);
$dat5 = $dat5.$row["pozadie"];
$dat7 = $dat7.substr("000".$row["uroven"],-4);
$dat8 = $dat8.substr("000".$row["level"],-4);
if($aa){ $dat6 = $dat6.$aa; }else{ $rnd = $row["rand"]; $dat6 = $dat6."0".$rnd; }

}
mysql_free_result($odpoved);

$cash = ("
dat1 = \"$dat1\";
dat2 = \"$dat2\";
dat3 = \"$dat3\";
dat4 = \"$dat4\";
dat5 = \"$dat5\";
dat6 = \"$dat6\";
dat7 = \"$dat7\";
dat8 = \"$dat8\";");
file_put_contents($url,$cash);
}else{
$cash = file_get_contents($url);
}



if($_GET["cashing"]){
echo(file_get_contents("tools/dot.jpg"));
}else{
echo($cash);
}
?>
