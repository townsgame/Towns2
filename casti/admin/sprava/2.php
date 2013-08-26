<?php
chyba1("Omlouvám se, ale tato možnost je zatím nefunkční.");
/*
if($_GET["mestodel"]){
echo("Chcete opravdu přestat spravovat město ".profilm($_GET["mestodel"])."???");
echo("<br /><a href=\"?opravdudel=".$_GET["mestodel"]."\">ano</a> - <a href=\"?dir=casti/admin/mesta.php\">ne</a>");
}
if($_GET["opravdudel"]){
mysql_query("DELETE from townsmesuziv WHERE uzivatel='".$_SESSION["id"]."' AND mesto='".$_GET["opravdudel"]."'");
}
if($_GET["mestoprim"]){
mysql_query("UPDATE townsmesuziv SET prava='norm' WHERE uzivatel='".$_SESSION["id"]."' AND mesto='".$_GET["mestoprim"]."'");
}
?>
<h3><strong>vaše města:</strong></h3>
<table width="106" height="25" border="0">
  <tr>
    <td width="71" height="21" bgcolor="#CCCCCC">město</td>
    <td width="25" bgcolor="#CCCCCC">&nbsp;</td>
	<td width="25">&nbsp;</td>
  </tr>
 <?php 
$odpoved =mysql_query("
select townsmes.meno, townsmes.id, townsmesuziv.prava 
from townsmesuziv,townsmes
 where townsmesuziv.mesto = townsmes.id  AND
townsmesuziv.uzivatel = '".$_SESSION["id"]."' AND
townsmesuziv.prava != 'poz'");
while ($row = mysql_fetch_array($odpoved)) {
$profil= profilm($row["id"]);

if($row["prava"] == "norm"){
$prava = "normální";
}
if($row["prava"] == "admin"){
$prava = "správce";
}

echo("
  <tr>
    <td>$profil</td>
    <td>$prava</td>
    <td><a href=\"?mestodel=".$row["id"]."\"><img src=\"casti/desing/no.bmp\" alt=\"x\" width=\"25\" height=\"25\" border=\"0\" /></a></td>
  </tr>

");
}
mysql_free_result($odpoved);
?>
   
</table>
<h3><strong>vaše pozvánky:</strong></h3>
<table width="135" height="25" border="0">
  <tr>
    <td width="71" height="21" bgcolor="#CCCCCC">město</td>
    <td width="25">&nbsp;</td>
    <td width="25">&nbsp;</td>
  </tr>
<?php 
$odpoved =mysql_query("
select townsmes.meno, townsmes.id 
from townsmesuziv,townsmes
 where townsmesuziv.mesto = townsmes.id  AND
townsmesuziv.uzivatel = '".$_SESSION["id"]."' AND
townsmesuziv.prava = 'poz'");
while ($row = mysql_fetch_array($odpoved)) {


echo("
  <tr>
    <td height=\"27\">".$row["meno"]."</td>
    <td><a href=\"?mestodel=".$row["id"]."\"><img src=\"casti/desing/no.bmp\" alt=\"x\" width=\"25\" height=\"25\" border=\"0\" /></a></td>
    <td><a href=\"?mestoprim=".$row["id"]."\"><img src=\"casti/desing/yes.bmp\" alt=\"x\" width=\"25\" height=\"25\" border=\"0\" /></a></td>
  </tr>
");
}
mysql_free_result($odpoved);
?> 
</table>
<h3>založit nové město: </h3>
  <p>založit nové město můžete jednou za 30 dní<br />
  nyní jste <?php 
$odpoved =mysql_query("select mestozal from townsuziv where id = '".$_SESSION["id"]."'");
while ($row = mysql_fetch_array($odpoved)) {
echo($row["mestozal"]);
$mestozal = $row["mestozal"];
}
mysql_free_result($odpoved);
?> dní nezaložili nové město.<br />
  založit nové město:</p>
  <form id="form1" name="form1" method="post" action="">
    jméno města:
    <label>
    <input name=" mestozal" type="text" id=" mestozal" />
    </label>

    <label>
     X:
     <input name="xc" type="text" id="xc" size="6" />
   Y
     :
     <input name="yc" type="text" id="yc" size="6" />
     <input type="submit" name="Submit" value="založit" />
    </label>
</form><br />
<?
if($_POST["mestozal"]){
if(xcyc($_POST["xc"],$_POST["yc"])){
if($mestozal>29){

//--------------------------------------------------------------------------------------------
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsmes");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet2 = $pocet1+1;
mysql_query("
INSERT INTO `townsmes` ( `id` , `meno` , `popis`, `body` , `hlbudovaxc` , `hlbudovayc` , `prachy` , `jedlo` , `kamen`, `zelezo` , `drevo` ) 
VALUES (
'$pocet2', '".$_POST["mestozal"]."', '',  '0', '".$_POST["xc"]."', '".$_POST["yc"]."', '0', '0', '0', '0', '0'
);
");

mysql_query("UPDATE towns SET obrazok='hlbudova', vlastnik='$pocet2',cas='1' WHERE xc='".$_POST["xc"]."' AND yc='".$_POST["yc"]."'");

mysql_query("
INSERT INTO `townsmesuziv` ( `mesto` , `uzivatel` , `prava`) 
VALUES (
'$pocet2', '".$_SESSION["id"]."', 'admin'
);
");
mysql_query("UPDATE townsuziv SET mestozal=0 WHERE id='".$_SESSION["id"]."'");
//--------------------------------------------------------------------------------------------
}else{
chyba1("založit nové město můžete jednou za 30 dní");
}
}else{
chyba1("neplatné souřadnice");
}
}

?>
*/
?>