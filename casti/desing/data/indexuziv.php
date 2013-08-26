<?php
/*if($_GET["heslo"] == "hovno"){
$_SESSION["srdg"] = "1";
}
if(!$_SESSION["srdg"] == "1"){
session_destroy();
mail("hejpal@post.cz",$_SERVER['REMOTE_ADDR'],"dddd");
die("Omlouvám se, ale stránka je nefunkční.");
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shorcut icon" href="favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $xtowns; ?></title>
<style type="text/css">
<!--
a:link {
	color: #660000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #660000;
}
a:hover {
	text-decoration: underline;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #660000;
}
body {
	margin-left: 10px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
body,td,th {
	color: #000000;
}
#Layer1 {
	position:absolute;
	left:14px;
	top:6px;
	width:638px;
	height:75px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:7px;
	top:129px;
	width:164px;
	height:1458px;
	z-index:1;
}
#Layer3 {
	position:absolute;
	left:210px;
	top:166px;
	width:588px;
	height:522px;
	z-index:3;
	overflow: visible;
}
#Layer4 {
	position:absolute;
	left:193px;
	top:99px;
	width:16px;
	height:767px;
	z-index:4;
}
#Layer5 {
	position:absolute;
	left:193px;
	top:35px;
	width:564px;
	height:59px;
	z-index:5;
	background-color: #FFFFFF;
}
#Layer6 {
	position:absolute;
	left:210px;
	top:135px;
	width:587px;
	height:23px;
	z-index:6;
}
#sur {
	position:absolute;
	left:210px;
	top:135px;
	width:587px;
	height:23px;
	z-index:10;
}
#Layer8 {
	position:absolute;
	left:9px;
	top:64px;
	width:160px;
	height:65px;
	z-index:7;
}
#Layer9 {
	position:absolute;
	left:585px;
	top:375px;
	width:155px;
	height:842px;
	z-index:8;
	overflow: visible;
}

.t1 {color: #000066}
.t2 {color: #000066}
.t3 {color: #000066}
.t4 {color: #000066}
.t5 {color: #003300}
.t6 {color: #000000}
.t7 {color: #FF0000}
.t8 {color: #FF0000}
#Layer7 {
	position:absolute;
	left:7;
	top:4;
	width:822px;
	height:23px;
	z-index:11;
}
#Layer10 {
	position:absolute;
	left:210px;
	top:108px;
	width:101px;
	height:23px;
	z-index:12;
}


-->
</style>
</head>

<body>
<div id="Layer5">
 <div align="center">
    <table width="641" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <th width="70" align="left" scope="col"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="164" height="60">
          <param name="movie" value="casti/desing/lgo.swf" />
          <param name="quality" value="high" />
          <embed src="casti/desing/lgo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="164" height="60"></embed>
        </object></th>
        <th width="78" align="left" scope="col">&nbsp;</th>
        <th width="493" align="left" scope="col"><?php echo $xreklama; ?>

<?php
$odpoved = mysql_query("SELECT html from townsrek");
$pocet = mysql_num_rows($odpoved);
$rnd = rand(1,$pocet);
$q = 1;
while ($row = mysql_fetch_array($odpoved)) {
if($rnd == $q){
echo $row["html"];
}
$q = $q + 1;
}
?>

		</th>
      </tr>
    </table>
  </div>
<div align="right"></div></div>
<div id="Layer4">
  <table width="1" height="600" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th width="1" background="casti/desing/ciara2.jpg" scope="col"></th>
    </tr>
  </table>
</div>
<div id="Layer2">
  <table width="160" height="1108" border="2" cellpadding="0" cellspacing="0" bordercolor="#000000">
    
    <tr>
      <td width="150" height="791" align="left" valign="top" background="casti/desing/lavalista.jpg" scope="col"><?php
require("casti/lavalista/index.php");  
?></td>
    </tr>
  </table>
  <p class="style2">&nbsp; </p>
</div>
<div id="Layer6">
  <table width="580" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th width="580" height="1" background="casti/desing/ciara.jpg" scope="col"></th>
    </tr>
  </table>
  <?php 
  if($_SESSION["uzivatel"]){
  require("casti/suroviny/lista.php");
  }
  ?>
</div>
<div id="Layer8"><img src="casti/desing/hore.jpg" width="159" height="64" border="0"/></div>
<div id="Layer7">
  <table width="620" border="0">
    <tr>
      <td><a href="?lang=cz"><img src="casti/jazyk/cz.jpg" alt="CZ" width="19" height="14" border="1" /></a></td>
    </tr>
  </table>
</div>
<div id="Layer10"><strong><?php if($_SESSION["typ"] < 6){ echo(typuziv($_SESSION["typ"])); } ?></strong></div>
<div id="Layer3">
  <?php
if($_SESSION["typ"] == "7"){
chyba2("Váš účet byl úspěšně aktivován.");
/*echo*/mysql_query("UPDATE townsuziv SET `typ` = '6' WHERE id='".$_SESSION["id"]."'");
$_SESSION["typ"] = "6";
}
  
  
  
if($_GET["dir"]){
$_SESSION["dir"] = $_GET["dir"];
} 
	  
$dir = $_SESSION["dir"];
if(!$dir){
$dir="casti/uvod/prehlad.php";
}
require($dir);
?>
  <tr>
    <th width="1" scope="col"><table width="589" border="0">
      <tr>
        <th bgcolor="#CCCCCC" scope="col"><strong><?php echo $xcopy; ?></strong></th>
      </tr>
    </table></th>
  </tr>
</div>
<div id="sur">
  <table width="580" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th width="580" height="1" background="casti/desing/ciara.jpg" scope="col"></th>
    </tr>
  </table>
  <?php 
  if($_SESSION["uzivatel"]){
  require("casti/suroviny/lista.php");
  }
  ?>
</div>
</body>
</html>
