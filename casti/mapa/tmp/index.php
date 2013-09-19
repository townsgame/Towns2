<?php
require("../funkcie/index.php");
	
if($_GET["zoom"]){
$_SESSION["zoom"] = $_GET["zoom"];
}

if($_GET["xc"]){
$_SESSION["xc"] = $_GET["xc"];
}

if($_GET["yc"]){
$_SESSION["yc"] = $_GET["yc"];
}

if($_POST["plus"]){
$_SESSION["plus"] = $_POST["plus"];
}

if($_POST["zoom"]){
$_SESSION["zoom"] = $_POST["zoom"];
}

if($_POST["xc"]){
$_SESSION["xc"] = $_POST["xc"];
}

if($_POST["yc"]){
$_SESSION["yc"] = $_POST["yc"];
}




	if(!$_SESSION["zoom"] or $_SESSION["zoom"]<1){
	$_SESSION["zoom"]=5;
	}
	if(!$_SESSION["plus"] or $_SESSION["plus"]<1){
	$_SESSION["plus"]=1;
	}
	if(!$_SESSION["xc"] or $_SESSION["xc"]<1){
	$_SESSION["xc"]=1;
	}
	if(!$_SESSION["yc"] or $_SESSION["yc"]<1){
	$_SESSION["yc"]=1;
	}
    if($_SESSION["xc"]>1001-$_SESSION["zoom"]){
	$_SESSION["xc"]=1001-$_SESSION["zoom"];
	}
	if($_SESSION["yc"]>1001-$_SESSION["zoom"]){
	$_SESSION["yc"]=1001-$_SESSION["zoom"];
	}


$size=300/$_SESSION["zoom"];
$size2=(300*(4/3))/$_SESSION["zoom"];
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
#Layer2 {
	position:absolute;
	left:66px;
	top:59px;
	width:296px;
	height:304px;
	z-index:1;
}
#Layer1 {
border:0px;
	position:absolute;
	left:1;
	top:1;
	width:453px;
	height:470px;
	z-index:2;
}
#Layer3 {
	position:absolute;
	left:66px;
	top:59px;
	width:300px;
	height:300px;
	z-index:3;
}
-->
</style>
</head>
<body>
<div id="Layer1">
<table width="431" height="444" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th width="44" bgcolor="#FFFFFF" scope="col">&nbsp;</th>
    <th background="../desing/bodka.jpg" scope="col">&nbsp;</th>
    <th width="267" align="center" bgcolor="#FFFFFF" scope="col"><a href="?dir=index.php&amp;yc=<?php echo $_SESSION["yc"]-$_SESSION["plus"]; ?>"><img src="desing/hore.jpg" alt="nahoru" width="91" height="43" border="0" /></a></th>
    <th width="33" bgcolor="#FFFFFF" scope="col">&nbsp;</th>
    <th width="21" background="../desing/bodka.jpg" scope="col">&nbsp;</th>
    <th width="45" bgcolor="#FFFFFF" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th height="11" colspan="6" background="../desing/bodka2.jpg" scope="col"></th>
  </tr>
  <tr>
    <th height="284" valign="middle" bgcolor="#FFFFFF" scope="col"><a href="?dir=index.php&amp;xc=<?php echo $_SESSION["xc"]-$_SESSION["plus"]; ?>"><img src="desing/dolava.jpg" alt="doleva" width="43" height="91" border="0" /></a></th>
    <th width="21" rowspan="2" background="../desing/bodka.jpg" scope="col">&nbsp;</th>
    <th colspan="2" rowspan="2" align="left" valign="top" scope="col"></th>
    <th background="../desing/bodka.jpg" scope="col">&nbsp;</th>
    <th valign="middle" bgcolor="#FFFFFF" scope="col"><a href="?dir=index.php&amp;xc=<?php echo $_SESSION["xc"]+$_SESSION["plus"]; ?>"><img src="desing/doprava.jpg" alt="doprava" width="43" height="91" border="0" /></a></th>
  </tr>
  <tr>
    <th height="20" bgcolor="#FFFFFF" scope="col">&nbsp;</th>
    <th bgcolor="#FFFFFF" scope="col">y</th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th height="19" background="../desing/bodka2.jpg" scope="col"></th>
    <th height="19" background="../desing/bodka2.jpg" scope="col"></th>
    <th height="19" background="../desing/bodka2.jpg" scope="col"></th>
    <th height="19" bgcolor="#FFFFFF" scope="col">x</th>
    <th height="19" background="../desing/bodka2.jpg" scope="col"></th>
    <th height="19" background="../desing/bodka2.jpg" scope="col"></th>
  </tr>
  <tr>
    <th bgcolor="#FFFFFF" scope="col"><a href="?dir=index.php&amp;zoom=<?php echo $_SESSION["zoom"]-$_SESSION["plus"]; ?>"><img src="desing/plus.jpg" alt="nahoru" width="41" height="40" border="0" /></a></th>
    <th background="../desing/bodka.jpg" scope="col">&nbsp;</th>
    <th align="center" bgcolor="#FFFFFF" scope="col"><a href="?dir=index.php&amp;yc=<?php echo $_SESSION["yc"]+$_SESSION["plus"]; ?>"><img src="desing/dole.jpg" alt="dolu" width="91" height="43" border="0" /></a></th>
    <th bgcolor="#FFFFFF" scope="col">&nbsp;</th>
    <th background="../desing/bodka.jpg" scope="col">&nbsp;</th>
    <th bgcolor="#FFFFFF" scope="col"><a href="?dir=index.php&amp;zoom=<?php echo $_SESSION["zoom"]+$_SESSION["plus"]; ?>"><img src="desing/minus.jpg" alt="nahoru" width="44" height="18" border="0" /></a></th>
  </tr>
  <tr>
    <th height="24" colspan="6" align="left" bgcolor="#999999" scope="col"><form id="form1" name="form1" method="post" action="?dir=index.php">
      zoom:
          <label>
          <input name="zoom" type="text" id="zoom" value="<?php echo($_SESSION["zoom"]); ?>" size="4" />
          </label>
    x:
    <input name="xc" type="text" id="xc" value="<?php echo($_SESSION["xc"]); ?>" size="4" />
    y:
    <input name="yc" type="text" id="yc" value="<?php echo($_SESSION["yc"]); ?>" size="4" />
    <label>
    plus
    :
    <input name="plus" type="text" id="plus" value="<?php echo($_SESSION["plus"]); ?>" size="4" />
<input type="submit" value="OK" />
    </label>
    </form>    </th>
  </tr>
</table>
</div>
<div id="Layer3">
  <?php
$_SESSION["nove"]=0;
$_SESSION["novey"]=0;
$x="";
$y="";

$i = $_SESSION["zoom"];
while ($i >= 1):
$x="<a href=\\\"\"); require(\"../jednotky/xcyc.php\"); echo(\"\\\"  target=\\\"_parent\\\"><img src=\\\"../desing/0.gif\\\" alt=\\\"abc\\\" width=\\\"".$size."\\\" height=\\\"".$size."\\\" border=\\\"0\\\"></a>".$x;
$i=$i-1;
endwhile; 

$x=$x."<br />";

$i = $_SESSION["zoom"];
while ($i >= 1):
$y=$x.$y;
$i=$i-1;
endwhile; 

$y="echo(\"".$y."\");";
eval($y);

?>
</div>
<div id="Layer2">
<iframe width="310" height="310" src="zobraz.php?xc=<?php echo($_SESSION["xc"]); ?>&amp;yc=<?php echo($_SESSION["yc"]); ?>&amp;zoom=<?php echo($_SESSION["zoom"]); ?>&amp;size=300" frameborder="0"/>
</div>
</body>
</html>