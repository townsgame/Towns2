<?php 
require("casti/funkcie/index.php"); 
require("casti/funkcie/vojak.php");

if($_GET["logof"]){ session_destroy(); session_start(); }
//------------------------------------------------------------------------------------------------------------------
if($_SESSION["kontrolid"]!= $_SESSION["id"]){
chyba1("chyba ".$_SESSION["id"]." / ".$_SESSION["kontrolid"]);
session_destroy();
session_start();
}
//--------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------

if($_POST["heslo"]){
$_SESSION["uzivatel"]=0;

$odpoved =mysql_query("select * from townsuziv where meno = '".$_POST["meno"]."' AND heslo = '".crypt($_POST["heslo"],"PH")."'");
//echo(mysql_error());

while ($row = mysql_fetch_array($odpoved)) {

$_SESSION["uzivatel"] = $_POST["meno"];
//suroviny
$_SESSION["id"] = $row["id"];
$_SESSION["kontrolid"] = $row["id"];
}
mysql_free_result($odpoved);
}
$odpoved =mysql_query("select typ from townsuziv where id = '".$_SESSION["id"]."'");
//echo(mysql_error());

while ($row = mysql_fetch_array($odpoved)) {
$_SESSION["typ"] = $row["typ"];

if($_SESSION["typ"] == "8"){
chyba1("Promiňte. Administrátor zablokoval váš účet. Pokud chcete administrátora kontaktovat, napište mu na e-mail hejpal@post.cz .");
session_destroy(); session_start();
die();
}
}
mysql_free_result($odpoved);


if($_GET["mesto"]){
$mesto = $_GET["mesto"];
if($mesto == "a"){ $mesto="0"; }


$odpoved =mysql_query("select prava from townsmesuziv where uzivatel = '".$_SESSION["id"]."' and mesto='".$mesto."'");

while ($row = mysql_fetch_array($odpoved)) {
$_SESSION["mestoid"] = $mesto;
$_SESSION["prava"] = $row["prava"];
}
mysql_free_result($odpoved);

$odpoved = mysql_query("select * from townsmes where id = '".$_SESSION["mestoid"]."'");
while ($row = mysql_fetch_array($odpoved)) {

$_SESSION["mesto"] = $row["meno"];

}
mysql_free_result($odpoved);
}



if($_SESSION["uzivatel"]){
require("indexuziv.php");
die();
//chyba1("hra ještě není dokončena");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $xtowns; ?></title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(zaklad_copy.png);
	background-repeat: no-repeat;
	background-color: #000000;
}
#Layer1 {
	position:absolute;
	left:628px;
	top:91px;
	width:436px;
	height:364px;
	z-index:1;
}
.style11 {	color: #FFFFFF;
	font-size: 16px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
a:link {
	color: #FFFFFF;
}
a:visited {
	color: #FFFFFF;
}
a:hover {
	color: #FFFFFF;
}
a:active {
	color: #FFFFFF;
}
#Layer2 {
	position:absolute;
	left:131px;
	top:240px;
	width:715px;
	height:8px;
	z-index:2;
}
.style13 {color: #FFCC00}
-->
</style></head>

<body>
<div id="Layer1">
  <p><img src="bg_fig1_02.png" width="377" height="325" /><img src="bg_fig2_04.png" width="405" height="296" /></p>
</div>
<div id="Layer2">
  <table width="689" height="34" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th>
<?php 
if($_GET["inindex"]){
$_SESSION["inindex"] = $_GET["inindex"];
} 
	  
$inindexa = "inindex".$_SESSION["inindex"].".php";
if(!$_SESSION["inindex"]){
$inindexa="inindex1.php";
}
?>
	  <span class="style11"><a href="?inindex=1">login</a></span></th>
      <th><span class="style11"><a href="?inindex=2">statistika</a></span></th>
      <th><span class="style11"><a href="?inindex=3">registrace</a></span></th>
      <th><a href="?inindex=4">o hře</a></th>
    </tr>
  </table>
</div>
<table width="1068" height="1034" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="60" colspan="6" align="center" valign="top">
<?php
//echo $_SESSION["obrazokk"];
if($_POST["menor"] and $_POST["heslor"] and $_POST["mailr"] and $_POST["mestor"]){
if($_POST["kod"] == $_SESSION["obrazokk"] or 1){
if($_POST["heslor"] == $_POST["heslo2r"]){
if($_POST["pravidlar"] == "1"){
//chyba1("chyba registrace");
//die();
//-------------------------------------------------------------------------
eval(file_get_contents("reg.txt"));
//-------------------------------------------------------------------------
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsuziv");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;
$heslor=crypt($_POST["heslor"],"PH");

mysql_query("
INSERT INTO `townsuziv` ( `id` ,`typ` , `meno`, `ali` , `body` , `poradie`, `heslo` , `popis` , `pohlavie` , `vek` , `mail` , `zmail` , `www`, `mestozal`,  `lista`) 
VALUES (
'$pocet',7 , '".$_POST["menor"]."', '0', '0', '0', '$heslor', '', '0', '0', '".$_POST["mailr"]."', '".$_POST["zmailr"]."', '','0','lista(1); lista(2); lista(3);'
);
");
echo(mysql_error());

$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsmes");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet2 = $pocet1+1;
mysql_query("
INSERT INTO `townsmes` ( `id` , `meno` , `popis`, `body` , `poradie`, `hlbudovaxc` , `hlbudovayc` , `prachy` , `jedlo` , `kamen`, `zelezo` , `drevo`, `ludia`, `ludiamax` ) 
VALUES (
'$pocet2', '".$_POST["mestor"]."', '',  '0', '0','$xcreg', '$ycreg', '5000', '5000', '5000', '5000', '5000','0','0'
);
");




mysql_query("
INSERT INTO `townsmesuziv` ( `mesto` , `uzivatel` , `prava`) 
VALUES (
'$pocet2', '$pocet', 'admin'
);
");

mysql_query("UPDATE towns SET cas=1, obrazok = 'hlbudova', vlastnik = '$pocet2' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+0));
mysql_query("UPDATE towns SET cas=1, obrazok = 'dom', vlastnik = '$pocet2' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+1));
mysql_query("UPDATE towns SET cas=1, obrazok = 'sklad', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+0));
mysql_query("UPDATE towns SET cas=1, obrazok = 'tdrevo', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+1));
mysql_query("UPDATE towns SET cas=1, obrazok = 'tkamen', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg-1));

$zpravax = $xdopis1.$_POST["menor"].$xdopis2;
$zpravax = nl2br(htmlspecialchars($zpravax));
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townszpr");
$row1 = mysql_fetch_array($odpoved1);
$pocetz=$row1["maxId"];
mysql_free_result($odpoved1);
$pocetz = $pocetz+1;
mysql_query("INSERT INTO townszpr VALUES('".$pocetz."','1', '$pocet', '0',CURRENT_TIMESTAMP , 'Vítejte v Towns', '".$zpravax."')");


chyba2($xpodekovani);
}else{
chyba1($xmusitesouhlasit);
}
}else{
chyba1($xheslanicht );
}
}else{
chyba1($xkodneopsany);
}
}
?></td>
  </tr>
  <tr>
    <td width="83" rowspan="4">&nbsp;</td>
    <td width="44" rowspan="4">&nbsp;</td>
    <td width="296" height="37">&nbsp;</td>
    <td width="214">&nbsp;</td>
    <td width="393">&nbsp;</td>
    <td width="38" rowspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="133" colspan="3"><h1 align="center" class="style13">Vítejte na stránce Towns</h1></td>
  </tr>
  <tr>
    <td height="46" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="746" colspan="3" align="left" valign="middle"><table width="891" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="25" height="692">&nbsp;</td>
        <td width="866" align="left" valign="top"><br />
            <br /><?php require($inindexa); ?></td>
        </tr>
    </table>    
    </td>
  </tr>
</table>
</body>
</html>
