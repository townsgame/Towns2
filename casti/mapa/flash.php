<!--
<?php
require("../funkcie/index.php"); 

if($_GET["xc1"]){
$_SESSION["xc1"] = ($_GET["xc1"]);
}
if($_GET["yc1"]){
$_SESSION["yc1"] = ($_GET["yc1"]);
}

if(!$_SESSION["xc1"]){
$_SESSION["xc1"] = 0;
}
if(!$_SESSION["yc1"]){
$_SESSION["yc1"] = 0;
}

$xc = $_SESSION["xc1"]-5;
$yc = $_SESSION["yc1"]-5;

$odpoved = mysql_query("SELECT towns.obrazok,townsuni.meno,towns.zivot,townsuni.zivot zivot2,towns.cas,towns.utokna,towns.pozadie,townsmes.meno meno2,towns.xc,towns.yc FROM towns,townsuni,townsmes WHERE townsmes.id = towns.vlastnik AND towns.obrazok = townsuni.obrazok AND xc >= ".$xc." AND yc >= ".$yc." AND xc <= ".($xc+9)." AND yc <= ".($yc+9));
while ($row1 = mysql_fetch_array($odpoved)) {
//echo($row1["xc"]." / ".$xc."<br/>");
$xaff = ($row1["xc"]+1-$xc)."y".($row1["yc"]+1-$yc)."_";

$q = "";

if($xaff != "10y6_"){
if(($row1["yc"]+1-$yc) == 1 AND ($row1["xc"]+1-$xc) > 3 AND ($row1["xc"]+1-$xc) < 6){ $q = "1"; }
if(($row1["yc"]+1-$yc) == 2 AND ($row1["xc"]+1-$xc) > 2){ $q = "1"; }
if(($row1["yc"]+1-$yc) == 3 AND ($row1["xc"]+1-$xc) > 1){ $q = "1"; }
if(($row1["yc"]+1-$yc) == 4 OR ($row1["yc"]+1-$yc) == 5){ $q = "1"; }
if(($row1["yc"]+1-$yc) == 6 AND ($row1["xc"]+1-$xc) > 1){ $q = "1"; }
if(($row1["yc"]+1-$yc) == 7 AND ($row1["xc"]+1-$xc) > 2){ $q = "1"; }
if(($row1["yc"]+1-$yc) == 8 AND ($row1["xc"]+1-$xc) > 3){ $q = "1"; }
if(($row1["yc"]+1-$yc) == 9 AND ($row1["xc"]+1-$xc) > 4){ $q = "1"; }
if(($row1["yc"]+1-$yc) == 10 AND ($row1["xc"]+1-$xc) > 5 AND ($row1["xc"]+1-$xc) < 7){ $q = "1"; }
}

if($q){

//if($row1["cas"] == 1){ $row1["cas"] = "postaveno"; }
//f($row1["cas"] == 2){ $row1["cas"] = "staví se"; }
//if($row1["cas"] == 3){ $row1["cas"] = "bourá se"; }

if($row1["pozadie"] == "cesta"){ $row1["pozadie"] = "1"; }
if($row1["pozadie"] == "hlina"){ $row1["pozadie"] = "2"; }
if($row1["pozadie"] == "kamene"){ $row1["pozadie"] = "3"; }
if($row1["pozadie"] == "lad"){ $row1["pozadie"] = "4"; }
if($row1["pozadie"] == "listy"){ $row1["pozadie"] = "5"; }
if($row1["pozadie"] == "piesok"){ $row1["pozadie"] = "6"; }
if($row1["pozadie"] == "polosneh"){ $row1["pozadie"] = "7"; }
if($row1["pozadie"] == "sneh"){ $row1["pozadie"] = "8"; }
if($row1["pozadie"] == "trava"){ $row1["pozadie"] = "9"; }

$getter = $getter.($xaff."1=".$row1["obrazok"]."&amp;".$xaff."2=".$row1["meno"]."&amp;".$xaff."3=".$row1["zivot"]."&amp;".$xaff."4=".$row1["zivot2"]."&amp;".$xaff."5=".$row1["cas"]."&amp;".$xaff."6=--&amp;".$xaff."7=--&amp;".$xaff."8=".$row1["utokna"]."&amp;".$xaff."9=".$row1["pozadie"]."&amp;".$xaff."10=".$row1["meno2"]."&amp;".$xaff."11=".$row1["xc"]."&amp;".$xaff."12=".$row1["yc"]."&amp;");
}
}
mysql_free_result($odpoved);
?>
//-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mapa</title>
</head>

<body>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="557" height="408">
  <param name="movie" value="flash1.swf" />
  <param name="quality" value="high" />
  <embed src="flash1.swf?xc1=<?php echo $_SESSION["xc1"]; ?>&amp;yc1=<?php echo $_SESSION["yc1"]; ?>&amp;<?php echo $getter; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="557" height="408"></embed>
</object>
</body>
</html>