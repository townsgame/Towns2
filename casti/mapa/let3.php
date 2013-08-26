<?php
$noflile = 1;
require("../funkcie/index.php");


if($_GET["zoom"]){
$_SESSION["zooms"] = $_GET["zoom"];
}

if($_GET["xc"]){
$_SESSION["xcs"] = $_GET["xc"];
}

if($_GET["yc"]){
$_SESSION["ycs"] = $_GET["yc"];
}

if($_POST["plus"]){
$_SESSION["pluss"] = $_POST["plus"];
}

if($_POST["zoom"]){
$_SESSION["zooms"] = $_POST["zoom"];
}

if($_POST["xc"]){
$_SESSION["xcs"] = $_POST["xc"];
}

if($_POST["yc"]){
$_SESSION["ycs"] = $_POST["yc"];
}
/*
$odpoved =mysql_query("SELECT hlbudovaxc, hlbudovayc FROM townsmes WHERE id = '".$_SESSION["mestoid"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$xcreg = $row["hlbudovaxc"]-1;
$ycreg = $row["hlbudovayc"]-1;
}
mysql_free_result($odpoved);
*/
	if(!$_SESSION["zooms"] or $_SESSION["zooms"]<1){
	$_SESSION["zooms"]=xcyczoom($_SESSION["mestoid"],"zoom");
	}
	if(!$_SESSION["pluss"] or $_SESSION["pluss"]<1){
	$_SESSION["pluss"]=1;
	}
	if(!$_SESSION["xcs"] or $_SESSION["xcs"]<1){
	$_SESSION["xcs"]=xcyczoom($_SESSION["mestoid"],"xc");
	}
	if(!$_SESSION["ycs"] or $_SESSION["ycs"]<1){
	$_SESSION["ycs"]=xcyczoom($_SESSION["mestoid"],"yc");
	}
    if($_SESSION["xcs"]>map_x+1-$_SESSION["zooms"]){
	$_SESSION["xcs"]=map_x-$_SESSION["zooms"];
	}
	if($_SESSION["ycs"]>map_y+1-$_SESSION["zooms"]){
	$_SESSION["ycs"]=map_y-$_SESSION["zooms"];
	}
//418


$xc = $_SESSION["xcs"];
$yc = $_SESSION["ycs"];
$zoom = $_SESSION["zooms"];

$brdr = 1;
if($zoom > 20){
$brdr = 0;
}

$size=intval(418/$_SESSION["zooms"])-$brdr-$brdr;

?>

<table border="0" cellpadding="0" cellspacing="0">
<?php  
$odpoved =mysql_query/*echo*/("select townsmes.meno vlistnik,towns.cas,towns.obrazok,towns.rand,towns.xc,towns.yc,towns.vlastnik,towns.utokna,towns.zivot,townsuni.meno,townsuni.zivot zivotmax
from towns
left join townsuni ON towns.obrazok = townsuni.obrazok
left join townsmes ON towns.vlastnik = townsmes.id
WHERE towns.xc > ".($xc-1)." AND towns.yc > ".($yc-1)." AND towns.xc < ".($xc+$zoom)." AND towns.yc < ".($yc+$zoom)." order by yc,xc");
while ($row = mysql_fetch_array($odpoved)) {

$farba = "FFFFFF";

//-----------------
if($row["vlastnik"] == $_SESSION["mestoid"]){
$farba = "BBBBBB";
}

if($row["cas"] == "1"){ $rand = $row["rand"]; }
if($row["cas"] == "2"){ $rand = "6"; }
if($row["cas"] == "3"){ $rand = "7"; }

echo("<th bgcolor=\"#$farba\"><a onMouseOver=\"info('".$row["xc"]."','".$row["yc"]."','".$row["meno"]."','".$row["utokna"]."','".$row["zivot"]."','".$row["zivotmax"]."','".$row["vlistnik"]."')\" href=\"../../index.php?dir=casti/mapa/policko.php&xc1=".$row["xc"]."&yc1=".$row["yc"]."\" target=\"_parent\"><img src=\"casti/jednotky/let/mapa/".$row["obrazok"]."/".$rand.".gif\" width=\"$size\" height=\"$size\" border=\"$brdr\"/></th>");
if($row["xc"]-$xc+1 == $zoom){
echo("</tr><tr>");
}
}
mysql_free_result($odpoved);
?></table>