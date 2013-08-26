<?php  
if($_GET["vytrenovat"])
$odpoved = mysql_query("SELECT napis,budovanas,vlastnik FROM towns WHERE napis != '' AND obrazok = 'kasarny' AND budovanas != '' AND  xc2 = ".$xc." AND yc2 = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$cena = vojakcena($row["napis"]);
if(zsur2("zelezo",$cena,$row["vlastnik"])){
surovinames($row["vlastnik"],"zelezo","-",$cena);
//--------------------------
eval($row["budovanas"]);
$odpoved1 = mysql_query("SELECT napis FROM towns WHERE xc=$xcc AND yc=$ycc");
while ($row1 = mysql_fetch_array($odpoved1)) {
$vojaci = vojakplus($row["napis"],$row1["napis"]);
mysql_free_result($odpoved1);
mysql_query("UPDATE towns set napis = '".$vojaci."' WHERE xc=$xcc AND yc=$ycc");
}
mysql_free_result($odpoved1);
chyba2("vytrénováno");
}else{
chyba1("nedostatek železa");
}
}
}

if($_POST["xckas"]){
$odpoved =mysql_query("select xc from towns where vlastnik='".$_SESSION["mestoid"]."' AND obrazok = 'schromazdiste' AND xc = ".$_POST["xckas"]." AND yc = ".$_POST["yckas"]);
while ($row = mysql_fetch_array($odpoved)) {
$budovanas = $row["xc"];
}
mysql_free_result($odpoved);
if($budovanas){
//echo("zzzzzzzzzzzzzzzzzz");
//echo("m$xc / $yc");
/*echo*/mysql_query("UPDATE towns SET budovanas = '\$xcc=".$_POST["xckas"]."; \$ycc=".$_POST["yckas"].";' WHERE xc=$xc AND yc=$yc");
//secho("m$xc / $yc");
}else{
chyba1("Toto není vaše políčko se shromaždištěm!");
}
}
?>
<a href="?vytrenovat=1">vytrénovat</a>
<?php
$vojakvlozx = vojakvlozx();
$zelezo = vojakcena($vojakvlozx);
if($vojakvlozx){ 
//echo($zelezo);
if(zsur("zelezo",$zelezo)){
mysql_query("UPDATE towns SET napis = '$vojakvlozx' WHERE xc=$xc AND yc=$yc");
echo("cena: ".$zelezo." železa<br/>");
}else{
chyba1("nedostatek surovin");
}
}
$odpoved =mysql_query("select napis from towns where xc = ".$xc." AND yc = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$napis = $row["napis"];
}
mysql_free_result($odpoved);
vojakvloz($napis,"OK");

//----------------------------------------------------------------------------------------------------

$odpoved =mysql_query("select budovanas from towns where xc = $xc AND yc = $yc");
while ($row = mysql_fetch_array($odpoved)) {
eval($row["budovanas"]);
}
mysql_free_result($odpoved);
?>
<strong>a bude posláno na :</strong>
<form action="" method="post">
  x:
  <input name="xckas" type="text" id="xckas" value="<?php echo $xcc; ?>" size="5" maxlength="5" /> 
  y:
  <label>
  <input name="yckas" type="text" id="yckas" value="<?php echo $ycc; ?>" size="5" maxlength="5" />
  </label>
  <label>
  <input type="submit" name="Submit" value="OK" />
  </label>
</form>

<?php zobraztbl(1); ?>