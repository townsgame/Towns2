<?php require("../funkcie/index.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mapa</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:3px;
	top:9px;
	width:551px;
	height:369px;
	z-index:1;
	background-color: #FFFFFF;
}
-->
</style>
</head>
<body>
<div id="Layer1">
<strong>vaše budovy:</strong>
<table width="525" height="48" border="0">
  <tr>
    <td width="10">&nbsp;</td>
    <td width="40" height="0">&nbsp;</td>
    <th width="128" bgcolor="#eeeeee">budova</th>
    <th width="68" bgcolor="#eeeeee">stav</th>
    <th width="78" bgcolor="#eeeeee">život</th>
    <th width="45" bgcolor="#eeeeee">x</th>
    <th width="45" bgcolor="#eeeeee">y</th>
    <th width="50" bgcolor="#eeeeee">akce</th>
  </tr>
  <?php
/*echo*/$odpoved =mysql_query("SELECT townsuni.meno,townsuni.zivot AS zivot2,towns.xc,towns.yc,towns.zivot,towns.cas,towns.napis,towns.obrazok FROM towns,townsuni WHERE towns.obrazok = townsuni.obrazok AND towns.vlastnik=".$_SESSION["mestoid"]." order by towns.xc,towns.yc");
echo(mysql_error());
while ($row = mysql_fetch_array($odpoved)) {
$q = $q + 1;

if($row["cas"] == "1"){ $staf = "postaveno"; }
if($row["cas"] == "2"){ $staf = "staví se"; }
if($row["cas"] == "3"){ $staf = "bourá se"; }


$serepeticky = "";
$a = "";
$b = "";
$c = "";
$d = "";


$odpoveda =mysql_query("select xc2 from townsutok where xc2='".$row["xc"]."' AND yc2 = '".$row["yc"]."'");
while ($rowa = mysql_fetch_array($odpoveda)) {
$a = $rowa["xc2"];
}
mysql_free_result($odpoveda);
$odpoveda =mysql_query("select odxc from townssur where odxc='".$row["xc"]."' AND odyc = '".$row["yc"]."'");
while ($rowa = mysql_fetch_array($odpoveda)) {
$b = $rowa["odxc"];
}
mysql_free_result($odpoveda);
if($row["obrazok"] == "kasarny"){
if($row["napis"]){
$c = 1;
}
}
$odpoveda =mysql_query("select xc from townsutok where xc='".$row["xc"]."' AND yc = '".$row["yc"]."'");
while ($rowa = mysql_fetch_array($odpoveda)) {
$d = $rowa["xc"];
}
mysql_free_result($odpoveda);
if($a){ $serepeticky = "<img src=\"desing/akce/1.gif\" width=\"20\" height=\"20\" alt=\"1\" />".$serepeticky ; }
if($b){ $serepeticky = "<img src=\"desing/akce/2.gif\" width=\"20\" height=\"20\" alt=\"1\" />".$serepeticky ; }
if($c){ $serepeticky = "<img src=\"desing/akce/3.gif\" width=\"20\" height=\"20\" alt=\"1\" />".$serepeticky ; }
if($d){ $serepeticky = "<img src=\"desing/akce/4.gif\" width=\"20\" height=\"20\" alt=\"1\" />".$serepeticky ; }

echo("
  <tr>
    <td>$q</td>
    <td>$serepeticky</td>
    <td><a href=\"../../index.php?dir=casti/mapa/policko.php&amp;xc1=".$row["xc"]."&amp;yc1=".$row["yc"]."\" target=\"_parent\">".$row["meno"]."</a></td>
    <td>$staf</td>
    <td>".$row["zivot"]." / ".$row["zivot2"]."</td>
    <td>".$row["xc"]."</td>
    <td>".$row["yc"]."</td>
    <td><a href=\"../../index.php?dir=casti/admin/smazat.php&xc=".$row["xc"]."&yc=".$row["yc"]."\" target=\"_parent\">X</td>
");
}
mysql_free_result($odpoved);
?>
</table>
</div>
</body>
</html>
