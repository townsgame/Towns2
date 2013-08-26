<?php
require("../funkcie/index.php");
eval(file_get_contents("../jazyk/".$_SESSION["lang"].".txt"));
//chyba1("Omlouvám se, ale mapa ještě není funkční.");
//die();
/*s */ ?>


<?php
if($_GET["zoom"] < 8){
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

if($_POST["zoom"] < 8){
$_SESSION["zooms"] = $_POST["zoom"];
}

if($_POST["xc"]){
$_SESSION["xcs"] = $_POST["xc"];
}

if($_POST["yc"]){
$_SESSION["ycs"] = $_POST["yc"];
}

$odpoved =mysql_query("SELECT hlbudovaxc, hlbudovayc FROM townsmes WHERE id = '".$_SESSION["mestoid"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$xcreg = $row["hlbudovaxc"]-1;
$ycreg = $row["hlbudovayc"]-1;
}
mysql_free_result($odpoved);

	if(!$_SESSION["zooms"] or $_SESSION["zooms"]<1){
	$_SESSION["zooms"]=5;
	}
	if(!$_SESSION["pluss"] or $_SESSION["pluss"]<1){
	$_SESSION["pluss"]=1;
	}
	if(!$_SESSION["xcs"] or $_SESSION["xcs"]<1){
	$_SESSION["xcs"]=$xcreg;
	}
	if(!$_SESSION["ycs"] or $_SESSION["ycs"]<1){
	$_SESSION["ycs"]=$ycreg;
	}
    if($_SESSION["xcs"]>101-$_SESSION["zooms"]){
	$_SESSION["xcs"]=101-$_SESSION["zooms"];
	}
	if($_SESSION["ycs"]>101-$_SESSION["zooms"]){
	$_SESSION["ycs"]=101-$_SESSION["zooms"];
	}

$_SESSION["sizes"] = 418;
$size=$_SESSION["sizes"]/$_SESSION["zooms"];
$size2=($_SESSION["sizes"]*(4/3))/$_SESSION["zooms"];
?>
<?php
$_SESSION["noves"]=0;
$_SESSION["noveys"]=0;

$x="";
$y="";

$i = $_SESSION["zooms"]*$_SESSION["zooms"];
$ii = $_SESSION["zooms"]*$_SESSION["zooms"];
while ($i >= 1):
$x="
<div id=\\\"o".$i."\\\"><img src=\\\"../jednotky/let/pozadie/trava/index.gif\\\" alt=\\\"\\\" width=\\\""."121"."\\\" height=\\\""."121"."\\\" border=\\\"0\\\"/></div>
".$x;

$xcc = $_SESSION["xcs"]+$_SESSION["noves"];
$ycc = $_SESSION["ycs"]+$_SESSION["noveys"];
$_SESSION["noves"]=$_SESSION["noves"]+1;
if($_SESSION["noves"]==$_SESSION["zooms"]){
  $_SESSION["noves"] = 0;
  $_SESSION["noveys"] = $_SESSION["noveys"]+1;
}

$iii = prevrat($i,$ii);

$y=$y."
#o".$iii." {
	position:absolute;
	left:".(0-($size-($size/(8/6)))+($xcc-$_SESSION["xcs"])*$size)."px;
	top:".(0-($size-($size/(8/6)))+($ycc-$_SESSION["ycs"])*$size)."px;
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
      <th width="46" scope="col"><a href="?dir=index.php&amp;yc=<?php echo $_SESSION["ycs"]-$_SESSION["pluss"]; ?>"><img src="desing/hore.jpg" alt="nahoru" width="50" height="30" border="0" /></a></th>
      <th width="62" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td align="right"><a href="?dir=index.php&amp;xc=<?php echo $_SESSION["xcs"]-$_SESSION["pluss"]; ?>"><img src="desing/dolava.jpg" alt="doleva" width="30" height="50" border="0" /></a></td>
      <td>&nbsp;</td>
      <td><a href="?dir=index.php&amp;xc=<?php echo $_SESSION["xcs"]+$_SESSION["pluss"]; ?>"><img src="desing/doprava.jpg" alt="doprava" width="30" height="50" border="0" /></a></td>
    </tr>
    <tr>
      <td align="right"><a href="?dir=index.php&amp;zoom=<?php echo $_SESSION["zooms"]-$_SESSION["pluss"]; ?>"><img src="desing/plus.jpg" alt="nahoru" width="30" height="30" border="0" /></a></td>
      <td><a href="?dir=index.php&amp;yc=<?php echo $_SESSION["ycs"]+$_SESSION["pluss"]; ?>"><img src="desing/dole.jpg" alt="dolu" width="50" height="30" border="0" /></a></td>
      <td><a href="?dir=index.php&amp;zoom=<?php echo $_SESSION["zooms"]+$_SESSION["pluss"]; ?>"><img src="desing/minus.jpg" alt="nahoru" width="30" height="15" border="0" /></a></td>
    </tr>
    <tr>
      <td colspan="3">

<form id="form1" name="form1" method="post" action="?dir=index.php">
  
        <table width="144" border="0">
          <tr>
            <th align="left" scope="col"><?php echo $xzoom; ?>
              </th>
            <th height="31" scope="col"><input name="zoom" type="text" id="zoom" value="<?php echo($_SESSION["zooms"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th align="left" scope="col"><?php echo $xplus; ?></th>
            <th height="31" scope="col"><input name="plus" type="text" id="plus" value="<?php echo($_SESSION["pluss"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th align="left" scope="col"><?php echo $xx; ?></th>
            <th height="31" scope="col"><input name="xc" type="text" id="xc" value="<?php echo($_SESSION["xcs"]); ?>" size="4" /></th>
          </tr>
          <tr>
            <th width="56" align="left" scope="col"><?php echo $xy; ?></th>
            <th width="78" height="31" scope="col"><input name="yc" type="text" id="yc" value="<?php echo($_SESSION["ycs"]); ?>" size="4" /></th>
          </tr>
        </table>
        <label>
        <input name="submit" type="submit" value="<?php echo $xok; ?>" />
          </label>
</form>	  </td>
    </tr>
  </table>
</div>
<?php
$x="echo(\"".$x."\");";
$_SESSION["noves"]=1;
$_SESSION["noveys"]=1;
eval($x);
?>
<div id="Layer3">
  <?php
$_SESSION["noves"]=0;
$_SESSION["noveys"]=0;
$x="";
$y="";

$i = $_SESSION["zooms"];
while ($i >= 1):
$x="<a href=\\\"\"); require(\"../jednotky/let/xcyc.php\"); echo(\"\\\" target=\\\"_parent\\\"><img src=\\\"\"); require(\"../jednotky/let/obrazok.php\"); echo(\"\\\" alt=\\\"abc\\\" width=\\\"".$size."\\\" height=\\\"".$size."\\\" border=\\\"0\\\"></a>".$x;
$i=$i-1;
endwhile; 

$x=$x."<br/>";

$i = $_SESSION["zooms"];
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