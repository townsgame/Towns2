<?php
require("casti/funkcie/index.php"); 
ini_set("max_execution_time",10000);

if($_GET["heslo"] != "hovnokleslo"){
chyba1("spatne heslo");
die();
}

if($_POST["menor1"]){
echo("a");
while ($i <= 5):
echo("b");
echo($i);
if($i){
eval(file_get_contents("reg.txt"));
//-------------------------------------------------------------------------
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsuziv");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;
$heslor=crypt($_POST["heslor$i"],"PH");

mysql_query("
INSERT INTO `townsuziv` ( `id` ,`typ` , `meno`, `ali` , `body` , `poradie`, `heslo` , `popis` , `pohlavie` , `vek` , `mail` , `zmail` , `www`, `mestozal`,  `lista`) 
VALUES (
'$pocet',9 , '".$_POST["menor$i"]."', '0', '0', '0', '$heslor', '', '0', '0', '".$_POST["mailr$i"]."', '".$_POST["zmailr$i"]."', '','0','lista(1); lista(4); lista(2); lista(3); lista(5);'
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
'$pocet2', '".$_POST["mestor$i"]."', '',  '0', '0','$xcreg', '$ycreg', '5000', '5000', '5000', '5000', '5000','0','0'
);
");




mysql_query("
INSERT INTO `townsmesuziv` ( `mesto` , `uzivatel` , `prava`) 
VALUES (
'$pocet2', '$pocet', 'admin'
);
");

mysql_query("UPDATE towns SET zivot=(SELECT zivot from townsuni WHERE townsuni.obrazok='hlbudova'), cas=1, obrazok = 'hlbudova', vlastnik = '$pocet2' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+0));
mysql_query("UPDATE towns SET zivot=(SELECT zivot from townsuni WHERE townsuni.obrazok='dom'), cas=1, obrazok = 'dom', vlastnik = '$pocet2' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+1));
mysql_query("UPDATE towns SET zivot=(SELECT zivot from townsuni WHERE townsuni.obrazok='sklad'), cas=1, obrazok = 'sklad', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+0));
mysql_query("UPDATE towns SET zivot=(SELECT zivot from townsuni WHERE townsuni.obrazok='tdrevo'), cas=1, obrazok = 'tdrevo', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+1));
mysql_query("UPDATE towns SET zivot=(SELECT zivot from townsuni WHERE townsuni.obrazok='tkamen'), cas=1, obrazok = 'tkamen', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg-1));

$zpravax = $xdopis1.$_POST["menor$i"].$xdopis2;
$zpravax = nl2br(htmlspecialchars($zpravax));
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townszpr");
$row1 = mysql_fetch_array($odpoved1);
$pocetz=$row1["maxId"];
mysql_free_result($odpoved1);
$pocetz = $pocetz+1;
}
$i++;
endwhile;
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="851" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>jméno:
        <input name="menor1" type="text" id="menor1" /></td>
      <td>heslo:
        <input name="heslor1" type="password" id="heslor1" value="qw" /></td>
      <td>mail:
        <input name="mailr1" type="text" id="mailr1" /></td>
      <td>město:
        <input name="mestor1" type="text" id="mestor1" /></td>
      <td><input name="zmailr1" type="checkbox" id="zmailr1" value="1" /></td>
    </tr>
    <tr>
      <td>jméno:
        <input name="menor2" type="text" id="menor2" /></td>
      <td>heslo:
        <input name="heslor2" type="password" id="heslor2" value="qw" /></td>
      <td>mail:
        <input name="mailr2" type="text" id="mailr2" /></td>
      <td>město:
        <input name="mestor2" type="text" id="mestor2" /></td>
      <td><input name="zmailr2" type="checkbox" id="zmailr2" value="1" /></td>
    </tr>
    <tr>
      <td>jméno:
        <input name="menor3" type="text" id="menor3" /></td>
      <td>heslo:
        <input name="heslor3" type="password" id="heslor3" value="qw" /></td>
      <td>mail:
        <input name="mailr3" type="text" id="mailr3" /></td>
      <td>město:
        <input name="mestor3" type="text" id="mestor3" /></td>
      <td><input name="zmailr3" type="checkbox" id="zmailr3" value="1" /></td>
    </tr>
    <tr>
      <td>jméno:
        <input name="menor4" type="text" id="menor4" /></td>
      <td>heslo:
        <input name="heslor4" type="password" id="heslor4" value="qw" /></td>
      <td>mail:
        <input name="mailr4" type="text" id="mailr4" /></td>
      <td>město:
        <input name="mestor4" type="text" id="mestor4" /></td>
      <td><input name="zmailr4" type="checkbox" id="zmailr4" value="1" /></td>
    </tr>
    <tr>
      <td width="204">jméno:
      <input name="menor5" type="text" id="menor5" /></td>
      <td width="201">heslo:
      <input name="heslor5" type="password" id="heslor5" value="qw" /></td>
      <td width="187">mail:
      <input name="mailr5" type="text" id="mailr5" /></td>
      <td width="199">město:
      <input name="mestor5" type="text" id="mestor5" /></td>
      <td width="26"><input name="zmailr5" type="checkbox" id="zmailr5" value="1" /></td>
    </tr>
  </table>
  <label>
  <input type="submit" name="Submit" value="vytvořit" />
  </label>
</form>

