<?php
/*
$id = $_SESSION["mestoid"];
if($_MYGET["id"]){
$id = $_MYGET["id"];
}


$odpoved =mysql_query("select * from towns2_mes WHERE id='$id'");
//echo (mysql_error());
while ($row = mysql_fetch_array($odpoved)) {
$hlbudovaxc = $row["hlbudovaxc"];
$hlbudovayc= $row["hlbudovayc"];
$meno = $row["meno"];
$body= $row["body"];
$popis = $row["popis"];
}


$zmena = "";
if($_SESSION["uzivatel"]==$_MYGET["meno"]){
$zmena = "změnit popis města";
}
?>
<table width="400" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th colspan="5" bgcolor="#DDDDDD" scope="col">město <?php echo $meno; ?></th>
  </tr>
  <tr>
    <th colspan="3" bgcolor="#EEEEEE">Detaily:</th>
    <th width="4" rowspan="11">&nbsp;</th>
    <th width="170" bgcolor="#EEEEEE">Popis:</th>
  </tr>
  <tr>
    <td width="7"></td>
    <th width="89" align="left" valign="top">body:</th>
    <td width="118"><?php echo $body; ?></td>
    <td rowspan="10" align="center" valign="top"><?php echo convert($popis); ?></td>
  </tr>
  
  
  
  
  
  <tr>
    <th colspan="3" bgcolor="#EEEEEE">akce:</th>
  </tr>
  <tr>
    <td width="7" rowspan="3"></td>
    <td colspan="2">poslat suroviny </td>
  </tr>
  
  <tr>
    <td colspan="2">zaůtočit na město </td>
  </tr>
  <tr>
    <td height="20" colspan="2" align="left" valign="top"><a href="?dir=casti/hraci/profilch.php"><?php echo $zmena; ?></a></td>
  </tr>
  <tr>
    <th height="20" colspan="3" bgcolor="#EEEEEE">mapa:</th>
  </tr>
  <tr>
    <td rowspan="2"></td>
    <th height="21" align="left" valign="top">x:</th>
    <td height="21" align="left" valign="top"><?php echo $hlbudovaxc; ?></td>
  </tr>
  <tr>
    <th height="21" align="left" valign="top">y:</th>
    <td align="left" valign="top"><?php echo $hlbudovayc; ?></td>
  </tr>
  <tr>
    <th height="13" colspan="3" bgcolor="#EEEEEE">uživatelé:</th>
  </tr>
  <tr>
    <td></td>
    <td colspan="2" align="left" valign="top">
<?php 
$odpoved =mysql_query("
select towns2_uziv.id 
from towns2_mesuziv,towns2_uziv
 where towns2_mesuziv.uzivatel = towns2_uziv.id  AND
towns2_mesuziv.mesto = '$id'");
while ($row = mysql_fetch_array($odpoved)) {
$link = profil($row["id"]);

echo("
$link<br/>
");
}
mysql_free_result($odpoved);
?></td>
  </tr>
</table>
*/ ?>
