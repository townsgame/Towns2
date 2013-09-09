<?php
//die("Tato mapa není ještě plně funkční.");
require("../funkcie/index.php");
	
	
if(!$_SESSION["zoom"]){
$_SESSION["zoom"] = 5;
}

if(!$_SESSION["xc"]){
$_SESSION["xc"] = 1;
}
if(!$_SESSION["yc"]){
$_SESSION["yc"] = 1;
}
	
	
	
	
if($_GET["zoom"]){
$_SESSION["zoom"] = $_GET["zoom"];
}


$_SESSION["size"] = 423;


if($_GET["xc"]){
$_SESSION["xc"] = $_GET["xc"];
}

if($_GET["yc"]){
$_SESSION["yc"] = $_GET["yc"];
}



if($_SESSION["zoom"]<5){
$_SESSION["zoom"] = 5;
}
if($_SESSION["zoom"]>15){
$_SESSION["zoom"] = 14;
}
if($_SESSION["xc"]<1){
$_SESSION["xc"] = 1;
}
if($_SESSION["yc"]<1){
$_SESSION["yc"] = 1;
}




$size=$_SESSION["size"]/$_SESSION["zoom"];
$size2=($_SESSION["size"]*(4/3))/$_SESSION["zoom"];

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

$i = $_SESSION["zoom"]*$_SESSION["zoom"];
$ii = $_SESSION["zoom"]*$_SESSION["zoom"];
while ($i >= 1):
$x="
<div id=\\\"p".$i."\\\"><img src=\\\"\"); require(\"../jednotky/iso/pozadie.php\"); echo(\"\\\" alt=\\\"\\\" width=\\\"".$size2."\\\" height=\\\"".($size2/3)."\\\" border=\\\"3\\\" />
</div>

<div id=\\\"o".$i."\\\"><img src=\\\"\"); require(\"../jednotky/iso/obrazok.php\"); echo(\"\\\" alt=\\\"\\\" width=\\\"".$size2."\\\" height=\\\"".($size2*(5/3))."\\\" border=\\\"0\\\" usemap=\\\"#Map".$i."\\\" />

<map name=\\\"Map".$i."\\\" id=\\\"Map".$i."\\\">
  <area shape=\\\"poly\\\" coords=\\\"23,2,110,2,83,35,-2,36\\\" href=\\\"\"); require(\"../jednotky/iso/xcyc.php\"); echo(\"\\\" target=\\\"_parent\\\" />
</map>

</div>
".$x;

$xc = $_SESSION["xc"]+$_SESSION["nove"];
$yc = $_SESSION["yc"]+$_SESSION["novey"];
$_SESSION["nove"]=$_SESSION["nove"]+1;
if($_SESSION["nove"]>$_SESSION["zoom"]){
  $_SESSION["nove"] = 1;
  $_SESSION["novey"] = $_SESSION["novey"]+1;
}
//echo("$xc,$xc<br />");


$iii = prevrat($i,$ii);


//echo($_SESSION["nove"]."/".$_SESSION["novey"]."<br />");
//(($_SESSION["novey"]*(35*(5/$_SESSION["zoom"])))-(35*(5/$_SESSION["zoom"]))

$zkosenie = (prevrat($_SESSION["novey"], $_SESSION["zoom"])*(37*(5/$_SESSION["zoom"])))-(37*(5/$_SESSION["zoom"]));
$y=$y."
#p".$iii." {
	position:absolute;
	left:".($zkosenie+(($_SESSION["nove"]-1)*($size2*(2/3)))-40)."px;
	top:".((($_SESSION["novey"]-0)*(170/$_SESSION["zoom"]))+248+30)."px;
}
#o".$iii." {
	position:absolute;
	left:".($zkosenie+(($_SESSION["nove"]-1)*($size2*(2/3)))-37)."px;
	top:".((($_SESSION["novey"]*(35*(5/$_SESSION["zoom"])))-(35*(5/$_SESSION["zoom"])))+80+37+30)."px;
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
	top:30px;
	width:541px;
	height:500px;
}
<?php
echo($y);
?>
-->
</style>
</head>
<body>
<div id="Layer3">
  <table width="554" height="418" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th height="247" colspan="3" background="../jednotky/iso/obloha/<?php echo(den()); ?>.jpg" bgcolor="#FFFFFF" scope="col"><img src="../jednotky/iso/pozadie2/pust.gif" width="555" height="247" border="0" /></th>
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


<map name="plus" id="plus">
<area shape="rect" coords="133,25,171,58" href="?zoom=<?php echo $_SESSION["zoom"]-1; ?>" />
<area shape="rect" coords="100,63,147,83" href="?yc=<?php echo $_SESSION["yc"]-1; ?>" />
<area shape="rect" coords="74,89,96,135" href="?xc=<?php echo $_SESSION["xc"]-1; ?>" />
<area shape="rect" coords="97,138,146,159" href="?yc=<?php echo $_SESSION["yc"]+1; ?>" />
<area shape="rect" coords="151,92,173,137" href="?xc=<?php echo $_SESSION["xc"]+1; ?>" />
<area shape="rect" coords="21,138,66,155" href="?zoom=<?php echo $_SESSION["zoom"]+1; ?>" />
</map>
</body>
</html>