<?php
require("../funkcie/index.php");
//ini_set("register_globals",1);
//chyba1("Omlouvám se, ale mapa ještě není funkční.");
//die();
/*s */ ?>




<?php

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

$odpoved =mysql_query("SELECT hlbudovaxc, hlbudovayc FROM townsmes WHERE id = '".$_SESSION["mestoid"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$xcreg = $row["hlbudovaxc"];
$ycreg = $row["hlbudovayc"];
}
mysql_free_result($odpoved);

	if(!$_SESSION["zoom"] or $_SESSION["zoom"]<1){
	$_SESSION["zoom"]=5;
	}
	if(!$_SESSION["plus"] or $_SESSION["plus"]<1){
	$_SESSION["plus"]=1;
	}
	if(!$_SESSION["xc"] or $_SESSION["xc"]<1){
	$_SESSION["xc"]=$xcreg;
	}
	if(!$_SESSION["yc"] or $_SESSION["yc"]<1){
	$_SESSION["yc"]=$ycreg;
	}
    if($_SESSION["xc"]>101-$_SESSION["zoom"]){
	$_SESSION["xc"]=101-$_SESSION["zoom"];
	}
	if($_SESSION["yc"]>101-$_SESSION["zoom"]){
	$_SESSION["yc"]=101-$_SESSION["zoom"];
	}

$_SESSION["size"] = 418;
$size=$_SESSION["size"]/$_SESSION["zoom"];
$size2=($_SESSION["size"]*(4/3))/$_SESSION["zoom"];
?>
<?php
$_SESSION["nove"]=0;
$_SESSION["novey"]=0;

$x="";
$y="";

$i = $_SESSION["zoom"]*$_SESSION["zoom"];
$ii = $_SESSION["zoom"]*$_SESSION["zoom"];
while ($i >= 1):
$x="
<div id=\\\"o".$i."\\\"><img src=\\\"../jednotky/let/pozadie/trava/index.gif\\\" alt=\\\"\\\" width=\\\""."121"."\\\" height=\\\""."121"."\\\" border=\\\"0\\\"/></div>
".$x;

$xcs = $_SESSION["xc"]+$_SESSION["nove"];
$ycs = $_SESSION["yc"]+$_SESSION["novey"];
$_SESSION["nove"]=$_SESSION["nove"]+1;
if($_SESSION["nove"]==$_SESSION["zoom"]){
  $_SESSION["nove"] = 0;
  $_SESSION["novey"] = $_SESSION["novey"]+1;
}

$iii = prevrat($i,$ii);

$y=$y."
#o".$iii." {
	position:absolute;
	left:".(0-($size-($size/(8/6)))+($xcs-$_SESSION["xc"])*$size)."px;
	top:".(0-($size-($size/(8/6)))+($ycs-$_SESSION["yc"])*$size)."px;
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
	top:0px;
	width:430px;
	height:430px;
	z-index:3;
}
<?php
echo($y);
?>
#Layer1 {
	position:absolute;
	left:429px;
	top:0px;
	width:180px;
	height:429px;
	z-index:4;
}
#Layer2 {
	position:absolute;
	left:431px;
	top:1px;
	width:131px;
	height:245px;
	z-index:4;
	background-color: #FFFFFF;
}
-->
</style>
</head>
<body>
<div id="Layer2">
  <table width="155" border="0" bgcolor="#FFFFFF">
    <tr>
      <th width="50" scope="col">&nbsp;</th>
      <th width="46" scope="col"><a href="?dir=index.php&amp;yc=<?php echo $_SESSION["yc"]-$_SESSION["plus"]; ?>"><img src="desing/hore.jpg" alt="nahoru" width="50" height="30" border="0" /></a></th>
      <th width="62" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td align="right"><a href="?dir=index.php&amp;xc=<?php echo $_SESSION["xc"]-$_SESSION["plus"]; ?>"><img src="desing/dolava.jpg" alt="doleva" width="30" height="50" border="0" /></a></td>
      <td>&nbsp;</td>
      <td><a href="?dir=index.php&amp;xc=<?php echo $_SESSION["xc"]+$_SESSION["plus"]; ?>"><img src="desing/doprava.jpg" alt="doprava" width="30" height="50" border="0" /></a></td>
    </tr>
    <tr>
      <td align="right"><a href="?dir=index.php&amp;zoom=<?php echo $_SESSION["zoom"]-$_SESSION["plus"]; ?>"><img src="desing/plus.jpg" alt="nahoru" width="30" height="30" border="0" /></a></td>
      <td><a href="?dir=index.php&amp;yc=<?php echo $_SESSION["yc"]+$_SESSION["plus"]; ?>"><img src="desing/dole.jpg" alt="dolu" width="50" height="30" border="0" /></a></td>
      <td><a href="?dir=index.php&amp;zoom=<?php echo $_SESSION["zoom"]+$_SESSION["plus"]; ?>"><img src="desing/minus.jpg" alt="nahoru" width="30" height="15" border="0" /></a></td>
    </tr>
    <tr>
      <td colspan="3">

<form id="form1" name="form1" method="post" action="?dir=index.php">
  <label></label>
        <table width="144" border="0">
          <tr>
            <th align="left" scope="col">zoom:
              <label> </label></th>
            <th height="31" scope="col"><input name="zoom" type="text" id="zoom" value="<?php echo($_SESSION["zoom"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th align="left" scope="col">plus
          :</th>
            <th height="31" scope="col"><input name="plus" type="text" id="plus" value="<?php echo($_SESSION["plus"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th align="left" scope="col">x:</th>
            <th height="31" scope="col"><input name="xc" type="text" id="xc" value="<?php echo($_SESSION["xc"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th width="56" align="left" scope="col">y:</th>
            <th width="78" height="31" scope="col"><input name="yc" type="text" id="yc" value="<?php echo($_SESSION["yc"]); ?>" size="4" /></th>
          </tr>
        </table>
        <label>          </label>
        <label>
        <input name="submit" type="submit" value="OK" />
          </label>
</form>	  </td>
    </tr>
  </table>
</div>
<?php
$x="echo(\"".$x."\");";
$_SESSION["nove"]=1;
$_SESSION["novey"]=1;
eval($x);
?>
<div id="Layer3">
  <?php
$_SESSION["nove"]=0;
$_SESSION["novey"]=0;
$x="";
$y="";

$i = $_SESSION["zoom"];
while ($i >= 1):
$x="<a href=\\\"\"); require(\"../jednotky/let/xcyc.php\"); echo(\"\\\" target=\\\"_parent\\\"><img src=\\\"\"); require(\"../jednotky/let/obrazok.php\"); echo(\"\\\" alt=\\\"abc\\\" width=\\\"".$size."\\\" height=\\\"".$size."\\\" border=\\\"0\\\"></a>".$x;
$i=$i-1;
endwhile; 

$x=$x."<br/>";

$i = $_SESSION["zoom"];
while ($i >= 1):
$y=$x.$y;
$i=$i-1;
endwhile; 

$y="echo(\"".$y."\");";
eval($y);

?>
</div>

</body>
</html>