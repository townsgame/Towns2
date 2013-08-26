<?php
require("../funkcie/index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shorcut icon" href="favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $xtowns; ?></title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:1px;
	top:1px;
	width:450;
	height:450;
	z-index:1;
}
-->
</style>
</head>

<body>
<div id="Layer1">
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
<?php
$odpoved =mysql_query("select vlastnik,xc,yc,obrazok from towns order by yc,xc");
while ($row = mysql_fetch_array($odpoved)) {
//echo("(".$row["xc"]." / ".$row["yc"].")");
if($row["obrazok"] == "0"){
$farba = "990000";
}else{
$farba = "ff0000";
}
//-----------------
if($row["vlastnik"] == "1" and $row["obrazok"] == "0"){
$farba = "000000";
}
if($row["vlastnik"] == "1" and $row["obrazok"] != "0"){
$farba = "333333";
}
//-----------------
if($row["vlastnik"] == $_SESSION["mestoid"] and $row["obrazok"] == "0"){
$farba = "000099";
}
if($row["vlastnik"] == $_SESSION["mestoid"] and $row["obrazok"] != "0"){
$farba = "0000ff";
}
//-----------------
if($row["vlastnik"] == $_GET["zobrazithraca"] and $row["obrazok"] == "0"){
$farba = "009900";
}
if($row["vlastnik"] == $_GET["zobrazithraca"] and $row["obrazok"] != "0"){
$farba = "00ff00";
}
echo("
<th width=\"4\" height=\"4\" bgcolor=\"#$farba\" scope=\"col\"/>");
if($row["xc"] == "100"){
echo("
</tr><tr>");
}
}
mysql_free_result($odpoved);
?>
    </tr>
</table>
</div>
</body>
</html>