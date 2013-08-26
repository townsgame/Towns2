<?php
if($_GET["del"]){
mysql_query("DELETE from townssur WHERE odxc = $xc AND odyc = $yc");
}
?>
<?php
if($_POST["kaxc"]){
$odpoved =mysql_query("select obrazok from towns where xc = ".$_POST["kaxc"]." AND yc = ".$_POST["kayc"]);
while ($row = mysql_fetch_array($odpoved)) {
$obrazok = $row["obrazok"];
}
mysql_free_result($odpoved);
//echo($obrazok);
if($obrazok == "zelezo"){
$odpoved =mysql_query("select kaxc,kayc from townssur where odxc = $xc AND odyc = $yc");
while ($row = mysql_fetch_array($odpoved)) {
$kaxcc = $row["kaxc"];
}
mysql_free_result($odpoved);     
//echo  $kaxcc;
if(!$kaxcc){
mysql_query("INSERT INTO `townssur` ( `odxc` , `odyc` , `kaxc` , `kayc` ) VALUES ('$xc', '$yc', '".$_POST["kaxc"]."', '".$_POST["kayc"]."');");
}else{
chyba1($xvytez2z);
}
}else{
chyba1($xvytez3z);
}
}
?>
<table width="126" border="0">
  <tr>
    <td width="40" bgcolor="#CCCCCC">x</td>
    <td width="40" bgcolor="#CCCCCC">y</td>
    <td width="32">&nbsp;</td>
  </tr>
<?php
$odpoved =mysql_query("select kaxc,kayc from townssur where odxc = $xc AND odyc = $yc");
while ($row = mysql_fetch_array($odpoved)) {
echo("
  <tr>
    <td>".$row["kaxc"]."</td>
    <td>".$row["kayc"]."</td>
    <td><a href=\"?del=1\"><img src=\"casti/desing/no.bmp\" width=\"20\" height=\"20\" border=\"0\" /></a></td>
  </tr>
");
}
mysql_free_result($odpoved);
?>
</table>
<form action="?del=0" method="post" name="form1" id="form1">
  <strong><?php echo($xvytez1z); ?>:
  <label>
  <input name="kaxc" type="text" id="kaxc" size="5" maxlength="5" />
  </label>
&nbsp;y:
<label>
  <input name="kayc" type="text" id="kayc" size="5" maxlength="5" />
  </label>
  </strong>
  <label>
  <input type="submit" name="Submit" value="OK" />
  </label>
</form>
