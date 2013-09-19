<?php
$root = "../../";
require("../funkcie/index.php");
//eval(file_get_contents("../jazyk/".$_SESSION["lang"].".txt"));
//chyba1("Omlouvám se, ale mapa ještě není funkční.");
//die();
if(!$_SESSION["id"]){
die("Pro zobrazeni mapy se prihlaste.");
}
/*s */ ?>


<?php
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>towns</title>  
<script> 
<!-- 
function info(xc,yc,obrazok,utokna,zivot,zivotmax,vlastnik) 
{  
document.show.xc.value = xc 	
document.show.yc.value = yc 
document.show.obrazok.value = obrazok 
document.show.utokna.value = utokna
document.show.zivot.value = zivot
document.show.zivotmax.value = zivotmax
document.show.vlastnik.value = vlastnik
} 

//--> 
</script> 
<style type="text/css">
<!--
#Layer2 {
	position:absolute;
	left:1px;
	top:1px;
	width:500px;
	height:700px;
	z-index:4;
	background-color: #FFFFFF;
}
-->
</style>
</head>
<body>
<div id="Layer2">
<table width="600" border="0" bgcolor="#FFFFFF">
<tr>
	<th width="420" height="434" scope="col"><table border="0" cellpadding="0" cellspacing="0">
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

echo("<th bgcolor=\"#$farba\"><a onMouseOver=\"info('".$row["xc"]."','".$row["yc"]."','".$row["meno"]."','".$row["utokna"]."','".$row["zivot"]."','".$row["zivotmax"]."','".$row["vlistnik"]."')\" href=\"../../index.php?dir=casti/mapa/policko.php&xc1=".$row["xc"]."&yc1=".$row["yc"]."\" target=\"_parent\"><img src=\"../jednotky/let/mapa/".$row["obrazok"]."/".$rand.".gif\" width=\"$size\" height=\"$size\" border=\"$brdr\"/></th>");
if($row["xc"]-$xc+1 == $zoom){
echo("</tr><tr>");
}
}
mysql_free_result($odpoved);
?></table></th>

    	<th align="left" valign="top"  scope="col">
  <table width="170" border="0" bgcolor="#FFFFFF">
    <tr>
      <th width="50" scope="col">&nbsp;</th>
      <th width="46" scope="col"><a href="?dir=index.php&amp;yc=<?php echo $_SESSION["ycs"]-$_SESSION["pluss"]; ?>"><img src="desing/hore.jpg" alt="|" width="50" height="30" border="0" /></a></th>
      <th width="62" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td align="right"><a href="?dir=index.php&amp;xc=<?php echo $_SESSION["xcs"]-$_SESSION["pluss"]; ?>"><img src="desing/dolava.jpg" alt="<-" width="30" height="50" border="0" /></a></td>
      <td>&nbsp;</td>
      <td><a href="?dir=index.php&amp;xc=<?php echo $_SESSION["xcs"]+$_SESSION["pluss"]; ?>"><img src="desing/doprava.jpg" alt="->" width="30" height="50" border="0" /></a></td>
    </tr>
    <tr>
      <td align="right"><a href="?dir=index.php&amp;zoom=<?php echo $_SESSION["zooms"]-$_SESSION["pluss"]; ?>"><img src="desing/plus.jpg" alt="|" width="30" height="30" border="0" /></a></td>
      <td><a href="?dir=index.php&amp;yc=<?php echo $_SESSION["ycs"]+$_SESSION["pluss"]; ?>"><img src="desing/dole.jpg" alt="|" width="50" height="30" border="0" /></a></td>
      <td><a href="?dir=index.php&amp;zoom=<?php echo $_SESSION["zooms"]+$_SESSION["pluss"]; ?>"><img src="desing/minus.jpg" alt="|" width="30" height="15" border="0" /></a></td>
    </tr>
    <tr>
      <td colspan="3">

<form id="form1" name="form1" method="post" action="?dir=index.php">
  
        <table width="170" border="0">
          <tr>
            <th align="left" scope="col">zoom
              </th>
            <th height="31" scope="col"><input name="zoom" type="text" id="zoom" value="<?php echo($_SESSION["zooms"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th align="left" scope="col">+</th>
            <th height="31" scope="col"><input name="plus" type="text" id="plus" value="<?php echo($_SESSION["pluss"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th align="left" scope="col">x</th>
            <th height="31" scope="col"><input name="xc" type="text" id="xc" value="<?php echo($_SESSION["xcs"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th width="56" align="left" scope="col">y</th>
            <th width="78" height="31" scope="col"><input name="yc" type="text" id="yc" value="<?php echo($_SESSION["ycs"]); ?>" size="4" /></th>
          </tr>
        </table>
        <label>
        <input name="submit" type="submit" value="OK" />
          </label>
</form>	  </td>
    </tr>
  </table>
  <hr/>   
<form name="show"> 
<b>x:&nbsp;&nbsp;&nbsp;&nbsp;</b>
 <input size="3" name="xc" style="border:0px solid #FFFFFF"/><b>y:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="3" name="yc" style="border:0px solid #FFFFFF"/>
<br />
<b>vlastník:&nbsp;&nbsp;&nbsp;&nbsp;<input name="vlastnik" id="vlastnik" size="14" style="border:0px solid #FFFFFF"/></b>
<br /> 
<b>budova:&nbsp;&nbsp;&nbsp;&nbsp;<input size="14" name="obrazok" style="border:0px solid #FFFFFF"/>  </b> 
<br />   
<b>život:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="3" name="zivot" style="border:0px solid #FFFFFF"/> / <input size="3" name="zivotmax" style="border:0px solid #FFFFFF"/>  <br />
<b>obrana:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="4" name="utokna" style="border:0px solid #FFFFFF"/>

</form>   
  </th>
    </tr>
  </table>
</div>

</body>
</html>