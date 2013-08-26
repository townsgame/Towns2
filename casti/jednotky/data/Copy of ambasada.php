<?php
if($_GET["hrac1"] or $_GET["hrac2"]){
if($_GET["hrac1"]!=$_SESSION["uzivatel"] AND $_GET["hrac2"]!=$_SESSION["uzivatel"]){
die("bezpectnoctni chyba");
}
}

$hrac1=$_GET["hrac1"];
$hrac2=$_GET["hrac2"];
if($_POST["valka"]){
$hrac1=$_SESSION["uzivatel"];
$hrac2=$_POST["valka"];
}
if($_POST["hrac"]){
$hrac1=$_SESSION["uzivatel"];
$hrac2=$_POST["hrac"];
}
$quit="";
$odpoved =mysql_query("select * from townsspo where hrac1 = '".$hrac1."' AND hrac2 = '".$hrac2."'");
while ($row = mysql_fetch_array($odpoved)) {
$quit="1";
}
mysql_free_result($odpoved);
$odpoved =mysql_query("select * from townsspo where hrac1 = '".$hrac2."' AND hrac2 = '".$hrac1."'");
while ($row = mysql_fetch_array($odpoved)) {
$quit="1";
}
mysql_free_result($odpoved);



if($hrac1 and $hrac2){
if(zkuz($hrac1) and zkuz($hrac2)){
if($_GET["urob"]==8){
mysql_query("DELETE FROM townsspo WHERE hrac1='".$_GET["hrac1"]."' AND hrac2='".$_GET["hrac2"]."' AND typ='4'");
}
if($_GET["urob"]==7){
if($_GET["hrac1"]==$_SESSION["uzivatel"]){
mysql_query("INSERT INTO townsspo values('".$_GET["hrac1"]."', '".$_GET["hrac2"]."' ,4)");
}else{
mysql_query("INSERT INTO townsspo values('".$_GET["hrac2"]."', '".$_GET["hrac1"]."' ,4)");
}
}
if($_GET["urob"]==4){
mysql_query/*echo*/("DELETE FROM townsspo WHERE hrac1='".$_GET["hrac1"]."' AND hrac2='".$_GET["hrac2"]."'");
}
if($_GET["urob"]==5){
mysql_query("DELETE FROM townsspo WHERE hrac1='".$_GET["hrac1"]."' AND hrac2='".$_GET["hrac2"]."'");
mysql_query("DELETE FROM townsspo WHERE hrac1='".$_GET["hrac2"]."' AND hrac2='".$_GET["hrac1"]."'");
}

if(!$quit){
if($_POST["hrac"]){
mysql_query("INSERT INTO townsspo values('".$_SESSION["uzivatel"]."', '".$_POST["hrac"]."' ,3)");
}
if($_POST["valka"]){
mysql_query("INSERT INTO townsspo values('".$_SESSION["uzivatel"]."', '".$_POST["valka"]."' ,2)");
}

if($_GET["urob"]==1){
mysql_query("UPDATE townsspo SET typ=1 WHERE hrac1='".$_GET["hrac1"]."' AND hrac2='".$_GET["hrac2"]."'");
}
if($_GET["urob"]==2){
mysql_query("DELETE FROM townsspo WHERE hrac1='".$_GET["hrac1"]."' AND hrac2='".$_GET["hrac2"]."'");
}

}
}else{
chyba1("neexistující uživatel");
}
}
?>
uzavřené dohody: <br />
<table width="425" border="0">
<?php
$odpoved =mysql_query/*echo*/("select hrac1, hrac2, typ from townsspo where hrac1 = '".$_SESSION["uzivatel"]."' OR hrac2 = '".$_SESSION["uzivatel"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$typ= "";
$urob= "";
if($row["typ"] == "1"){
$typ= " má spojenectví s ";
$urob= "2";
}
if($row["typ"] == "2"){
$typ= " je ve válce s ";
$urob= "7";
}
if($typ){
$hrac1 = profil($row["hrac1"]);
$hrac2 = profil($row["hrac2"]);
echo("
  <tr>
    <th scope=\"col\"><a href=\"?dir=casti/mapa/policko.php&xc=$xc&yc=$yc&amp;urob=$urob&amp;hrac1=".$row["hrac1"]."&amp;hrac2=".$row["hrac2"]."\"><img src=\"casti/desing/no.bmp\" alt=\"zrušit\" width=\"15\" height=\"15\" /><a></th>
    <th align=\"left\" scope=\"col\">".$hrac1." $typ ".$hrac2."</th>
  </tr>
");
}
}
mysql_free_result($odpoved);
?>
</table>

<br />
nabídky:<br />
<table width="425" border="0">
<?php
$odpoved =mysql_query/*echo*/("select hrac1, hrac2, typ from townsspo where hrac2 = '".$_SESSION["uzivatel"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$typ= "";
$urob= "";
$urob2= "";
if($row["typ"] == "3"){
$typ= " dal nabídku o spojenectví spojenectví s ";
$urob= "1";
$urob2= "4";
}
if($row["typ"] == "4"){
$typ= " dal nabídku o ukončení války s ";
$urob= "5";
$urob2= "8";
}
if($typ){
$hrac1 = profil($row["hrac1"]);
$hrac2 = profil($row["hrac2"]);
echo("
  <tr>
    <th scope=\"col\"><a href=\"?dir=casti/mapa/policko.php&xc=$xc&yc=$yc&amp;urob=$urob&amp;hrac1=".$row["hrac1"]."&amp;hrac2=".$row["hrac2"]."\"><img src=\"casti/desing/yes.bmp\" alt=\"zrušit\" width=\"15\" height=\"15\" /><a></th>
	<th><a href=\"?dir=casti/mapa/policko.php&xc=$xc&yc=$yc&amp;urob=$urob2&amp;hrac1=".$row["hrac1"]."&amp;hrac2=".$row["hrac2"]."\"><img src=\"casti/desing/no.bmp\" alt=\"zrušit\" width=\"15\" height=\"15\" /><a></th>
    <th align=\"left\" scope=\"col\">".$hrac1." $typ ".$hrac2."</th>
  </tr>
");
}
}
mysql_free_result($odpoved);
?>
</table>
<p><br />
vlastní nabídky:</p>
<form id="form1" name="form1" method="post" action="<?php echo("?dir=casti/mapa/policko.php&xc=$xc&yc=$yc"); ?>">
  <label>
  <input name="hrac" type="text" id="hrac" />
  </label>
  <input type="submit" name="Submit" value="Nabídnout spojenectví tomuto hráči." />
  <label></label>
  <br />
  <label>
  <input name="valka" type="text" id="valka" />
  </label>
  <input type="submit" name="Submit2" value="Vyhlásit válku tomuto hráči." />
  <label></label>
</form>
<table width="425" border="0">
<?php
$odpoved =mysql_query/*echo*/("select hrac1, hrac2, typ from townsspo where hrac1 = '".$_SESSION["uzivatel"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$typ= "";
$urob= "";
if($row["typ"] == "3"){
$typ= " dal nabídku o spojenectví spojenectví s ";
$urob= "4";
}
if($row["typ"] == "4"){
$typ= " dal nabídku o ukončení války s ";
$urob= "8";
}
if($typ){
$hrac1 = profil($row["hrac1"]);
$hrac2 = profil($row["hrac2"]);
echo("
  <tr>
	<th><a href=\"?dir=casti/mapa/policko.php&xc=$xc&yc=$yc&amp;urob=$urob&amp;hrac1=".$row["hrac1"]."&amp;hrac2=".$row["hrac2"]."\"><img src=\"casti/desing/no.bmp\" alt=\"zrušit\" width=\"15\" height=\"15\" /><a></th>
    <th align=\"left\" scope=\"col\">".$hrac1." $typ ".$hrac2."</th>
  </tr>
");
}
}
mysql_free_result($odpoved);
?>
</table>
<p>&nbsp; </p>
