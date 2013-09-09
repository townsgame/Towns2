<?php
//die("Tato mapa není ještě plně funkční.");
require("../funkcie/index.php");
	
	
if(!$_SESSION["zooms"]){
$_SESSION["zooms"] = 5;
}

if(!$_SESSION["xcs"]){
$_SESSION["xcs"] = 1;
}
if(!$_SESSION["ycs"]){
$_SESSION["ycs"] = 1;
}
	
	
	
	
if($_GET["zoom"]){
$_SESSION["zooms"] = $_GET["zoom"];
}


$_SESSION["sizes"] = 423;


if($_GET["xc"]){
$_SESSION["xcs"] = $_GET["xc"];
}

if($_GET["yc"]){
$_SESSION["ycs"] = $_GET["yc"];
}



if($_SESSION["zooms"]<5){
$_SESSION["zooms"] = 5;
}
if($_SESSION["zooms"]>15){
$_SESSION["zooms"] = 14;
}
if($_SESSION["xcs"]<1){
$_SESSION["xcs"] = 1;
}
if($_SESSION["ycs"]<1){
$_SESSION["ycs"] = 1;
}




$size=/*$_SESSION["sizes"]/$_SESSION["zooms"]*/112;
$size2=/*($_SESSION["sizes"]*(4/3))/$_SESSION["zooms"]*/112/3*5;

?>
<?php
/*
<div id=\\\"p".$i."\\\"><a href=\\\"\"); require(\"../jednotky/xcyc2.php\"); echo(\"\\\"><img src=\\\"\"); require(\"../jednotky/pozadie2.php\"); echo(\"\\\" alt=\\\"\\\" width=\\\"".$size2."\\\" height=\\\"".($size2/3)."\\\" border=\\\"0\\\"/></a></div>


<div id=\\\"p".$i."\\\">\"); require(\"../jednotky/xcyc2.php\"); echo(\"\\\"<br /><img src=\\\"\"); require(\"../jednotky/pozadie2.php\"); echo(\"\\\" alt=\\\"\\\" width=\\\"".$size2."\\\" height=\\\"".($size2/3)."\\\" border=\\\"0\\\"/></div>
*/
$_SESSION["nove"]=0;
$_SESSION["novey"]=0;

$x="";
$y="";

$i = $_SESSION["zooms"]*$_SESSION["zooms"];
$ii = $_SESSION["zooms"]*$_SESSION["zooms"];
while ($i >= 1):
$x="
<div id=\\\"p".$i."\\\"><img src=\\\"\"); require(\"../jednotky/iso/pozadie.php\"); echo(\"\\\" alt=\\\"\\\" width=\\\"112\\\" height=\\\"36\\\" border=\\\"0\\\" />
</div>

<div id=\\\"o".$i."\\\"><img src=\\\"\"); require(\"../jednotky/iso/obrazok.php\"); echo(\"\\\" alt=\\\"\\\" width=\\\"84\\\" height=\\\"139\\\" border=\\\"0\\\" />

</div>
\"); if(\$_SESSION[\"nove\"] == \"5\"){ echo(\"<div id=\\\"Layer2\\\"><img src=\\\"../jednotky/iso/transparentne/".(den()).".png\\\" width=\\\"580\\\" height=\\\"418\\\" /></div>\"); } echo(\"".$x;

$xc = $_SESSION["xcs"]+$_SESSION["nove"];
$yc = $_SESSION["ycs"]+$_SESSION["novey"];
$_SESSION["nove"]=$_SESSION["nove"]+1;
if($_SESSION["nove"]>$_SESSION["zooms"]){
  $_SESSION["nove"] = 1;
  $_SESSION["novey"] = $_SESSION["novey"]+1;
}

//echo("$xc,$xc<br />");


$iii = prevrat($i,$ii);


//echo($_SESSION["nove"]."/".$_SESSION["novey"]."<br />");
//(($_SESSION["novey"]*(35*(5/$_SESSION["zoom"])))-(35*(5/$_SESSION["zoom"]))

$zkosenie = (prevrat($_SESSION["novey"], $_SESSION["zooms"])*(37*(5/$_SESSION["zooms"])))-(37*(5/$_SESSION["zooms"]));
$y=$y."
#p".$iii." {
	position:absolute;
	left:".($zkosenie+(($_SESSION["nove"]-1)*($size2*(2/3)))-40-(($_SESSION["nove"]-1)*45))."px;
	top:".((($_SESSION["novey"]-0)*(170/$_SESSION["zooms"]))+248+20)."px;
	z-index:3;
}
#o".$iii." {
	position:absolute;
	left:".($zkosenie+(($_SESSION["nove"]-1)*($size2*(2/3)))-20-(($_SESSION["nove"]-1)*45))."px;
	top:".((($_SESSION["novey"]*(35*(5/$_SESSION["zooms"])))-(35*(5/$_SESSION["zooms"])))+80+37+78)."px;
	z-index:3;
}
";

$i=$i-1;
endwhile; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>towns</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
#Layer3 {
	position:absolute;
	left:0px;
	top:21px;
	width:585px;
	height:422px;
	z-index: 1;
}
#Layer1 {
	position:absolute;
	left:0px;
	top:22px;
	width:90px;
	height:144px;
	z-index:2;
}
#Layer2 {
	position:absolute;
	left:1px;
	top:23px;
	width:579px;
	height:417px;
	z-index:3;
}
#Layer4 {
	position:absolute;
	left:403px;
	top:276px;
	width:173px;
	height:126px;
	z-index:3;
}
#Layer5 {
	position:absolute;
	left:0px;
	top:21px;
	width:88px;
	height:292px;
	z-index:3;
}
<?php
echo($y);
?>
-->
</style>
</head>
<body>
<div id="Layer3">
  <table width="580" height="418" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th height="247" colspan="3" align="left" background="../jednotky/iso/obloha/<?php echo(den()); ?>.jpg" bgcolor="#FFFFFF" scope="col"><img src="../jednotky/iso/pozadie2/hory.gif" width="580" height="247" border="0" /></th>
    </tr>
    <tr>
      <th width="184" background="desing/textura.jpg" bgcolor="#666600" scope="col"><img src="desing/biele.gif" width="184" height="40" /></th>
      <th width="184" bgcolor="#666600" scope="col"><hr width="184" /></th>
      <th width="184" align="right" valign="bottom" bgcolor="#999999" scope="col">
      <img src="desing/navigacia.jpg" width="176" height="164" border="0" usemap="#plus" /></th>
    </tr>
  </table>
</div>
<?php
$x="echo(\"".$x."\");";
$_SESSION["nove"]=1;
$_SESSION["novey"]=1;
eval($x);
?>
<div id="Layer1"><img src="desing/a.gif" width="206" height="418" border="0" /></div>
<div id="Layer4"><img src="../jednotky/let/mapa/0/1.gif" width="176" height="164" border="0" usemap="#plusMap" />
  <map name="plusMap" id="plusMap">
    <area shape="rect" coords="100,63,147,83" href="?yc=<?php echo $_SESSION["ycs"]-1; ?>" />
    <area shape="rect" coords="74,89,96,135" href="?xc=<?php echo $_SESSION["xcs"]-1; ?>" />
    <area shape="rect" coords="97,138,146,159" href="?yc=<?php echo $_SESSION["ycs"]+1; ?>" />
    <area shape="rect" coords="151,92,173,137" href="?xc=<?php echo $_SESSION["xcs"]+1; ?>" />
  </map>
</div>
<div id="Layer5"><img src="../jednotky/let/mapa/0/1.gif" width="176" height="300" border="0" usemap="#mapas" />
  <map name="mapas" id="mapas">
    <area shape="rect" coords="6,210,25,227" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+0; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+3; ?>" target="_parent" />
    <area shape="rect" coords="30,151,49,168" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+1; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+0; ?>" target="_parent" />
    <area shape="rect" coords="53,150,72,167" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+2; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+0; ?>" target="_parent" />
    <area shape="rect" coords="76,150,95,167" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+3; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+0; ?>" target="_parent" />
    <area shape="rect" coords="99,150,118,167" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+4; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+0; ?>" target="_parent" />
    <area shape="rect" coords="99,169,118,186" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+4; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+1; ?>" target="_parent" />
    <area shape="rect" coords="76,170,95,187" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+3; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+1; ?>" target="_parent" />
    <area shape="rect" coords="53,170,72,187" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+2; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+1; ?>" target="_parent" />
    <area shape="rect" coords="29,170,48,187" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+1; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+1; ?>" target="_parent" />
    <area shape="rect" coords="7,171,26,188" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+0; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+1; ?>" target="_parent" />
    <area shape="rect" coords="99,191,118,208" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+4; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+2; ?>" target="_parent" />
    <area shape="rect" coords="76,191,95,208" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+3; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+2; ?>" target="_parent" />
    <area shape="rect" coords="52,191,71,208" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+2; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+2; ?>" target="_parent" />
    <area shape="rect" coords="29,191,48,208" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+1; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+2; ?>" target="_parent" />
    <area shape="rect" coords="6,192,25,209" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+0; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+2; ?>" target="_parent" />
    <area shape="rect" coords="29,211,48,228" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+1; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+3; ?>" target="_parent" />
    <area shape="rect" coords="7,231,26,248" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+0; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+4; ?>" target="_parent" />
    <area shape="rect" coords="29,231,48,248" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+1; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+4; ?>" target="_parent" />
    <area shape="rect" coords="52,211,71,228" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+2; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+3; ?>" target="_parent" />
    <area shape="rect" coords="76,211,95,228" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+3; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+3; ?>" target="_parent" />
    <area shape="rect" coords="99,211,118,228" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+4; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+3; ?>" target="_parent" />
    <area shape="rect" coords="52,232,71,249" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+2; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+4; ?>" target="_parent" />
    <area shape="rect" coords="76,232,95,249" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+3; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+4; ?>" target="_parent" />
    <area shape="rect" coords="99,232,118,249" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+4; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+4; ?>" target="_parent" />
    <area shape="rect" coords="7,152,26,169" href="../../index.php?dir=casti/mapa/policko.php&amp;xc1=<?php echo $_SESSION["xcs"]+0; ?>&amp;yc1=<?php echo $_SESSION["ycs"]+0; ?>" target="_parent" />
  </map>
</div>
</map>
</body>
</html>
