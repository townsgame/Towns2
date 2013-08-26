<?php echo $xmestosp; ?> <?php echo profilm($_SESSION["mestoid"]); ?><br />
<?php
$odpoved =mysql_query("SELECT prava from townsmesuziv WHERE uzivatel=".$_SESSION["id"]." AND mesto=".$_SESSION["mestoid"]);
while ($row = mysql_fetch_array($odpoved)) {
if($row["prava"]!="admin"){
chyba1($xvtomto);
die();
}
}
mysql_free_result($odpoved);





if($_POST["pozvanka"]){
if(zkuz($_POST["pozvanka"])){
if(!zkuzali($_POST["pozvanka"])){


$odpoved =mysql_query("select id from townsuziv WHERE meno='".$_POST["pozvanka"]."'");
while ($row = mysql_fetch_array($odpoved)) {	 	 	 
 	$komu = $row["id"];
}
mysql_query("INSERT INTO `townsmesuziv` ( `mesto` , `uzivatel` , `prava` ) VALUES (".$_SESSION["mestoid"].", $komu, 'poz')");
}else{
chyba1($xtentohracn);
}
}else{
chyba1($xneexsist);
}
}
//-------------------------------------------------------
if($_GET["mestodel"]){
echo("$xzrusafka ".profil($_GET["mestodel"])."$xot");
echo("<br /><a href=\"?opravdudel=".$_GET["mestodel"]."\">$xyes</a> - <a href=\"?dir=casti/admin/mesta.php\">$xno</a>");
}
if($_GET["opravdudel"]){
mysql_query("DELETE from townsmesuziv WHERE uzivatel=".$_GET["opravdudel"]." AND mesto=".$_SESSION["mestoid"]);
}
/*
if($_GET["mestoprim"]){
mysql_query("UPDATE townsmesuziv SET prava='norm' WHERE uzivatel='".$_GET["opravdudel"]."' AND mesto='".$_GET["mestoid"]."'");
}*/
//-------------------------------------------------------
if($_GET["mestosprav"]){
echo("$xpredavka ".profil($_GET["mestosprav"])."$xot");
echo("<br /><a href=\"?opravdusprav=".$_GET["mestosprav"]."\">$xyes</a> - <a href=\"?dir=casti/admin/mesta.php\">$xno</a>");
}
if($_GET["opravdusprav"]){
mysql_query("UPDATE townsmesuziv SET prava='norm' WHERE uzivatel=".$_SESSION["id"]." AND mesto=".$_SESSION["mestoid"]);
mysql_query("UPDATE townsmesuziv SET prava='admin' WHERE uzivatel=".$_GET["opravdusprav"]." AND mesto=".$_SESSION["mestoid"]);
}
?>
<table width="164" height="25" border="0">
  <tr>
    <td width="71" height="21" bgcolor="#CCCCCC"><?php echo $xmestosp; ?></td>
    <td width="25" bgcolor="#CCCCCC">&nbsp;</td>
	<td width="25">&nbsp;</td>
	<td width="25">&nbsp;</td>
  </tr>
 <?php 
$odpoved =mysql_query("
select townsuziv.meno, townsuziv.id, townsmesuziv.prava 
from townsmesuziv,townsuziv
 where townsmesuziv.uzivatel = townsuziv.id  AND
townsmesuziv.mesto = '".$_SESSION["mestoid"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$profil= profil($row["id"]);

if($row["prava"] == "norm"){
$prava = $xxnormalni;
}
if($row["prava"] == "admin"){
$prava = $xxspravce;
}
if($row["prava"] == "poz"){
$prava = $xxpozvanka;
}

echo("
  <tr>
    <td>$profil</td>
    <td>$prava</td>
    <td><a href=\"?mestodel=".$row["id"]."\"><img src=\"casti/desing/no.bmp\" alt=\"x\" width=\"25\" height=\"25\" border=\"0\" /></a></td>
    <td><a href=\"?mestosprav=".$row["id"]."\"><img src=\"casti/desing/yes.bmp\" alt=\"x\" width=\"25\" height=\"25\" border=\"0\" /></a></td>
  </tr>

");
}
mysql_free_result($odpoved);
?>
</table>
<br />
<form id="form1" name="form1" method="post" action="">
  <label>
  <?php echo $xxpozvathrace; ?>
  <input name="pozvanka" type="text" id="pozvanka" />
  </label>
  <label>
  <input type="submit" name="Submit" value="<?php echo $xok; ?>" />
  </label>
</form>
