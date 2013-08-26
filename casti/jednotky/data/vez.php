<?php
chyba1($xomlouvamse);
/*

Uzavřené dohody:<br />
<table width="287" border="1" cellspacing="0">
  <tr>
    <th width="70" align="left" bgcolor="#CCCCCC">město 1</th>
    <th width="66" align="left" bgcolor="#CCCCCC">město 2</th>
    <th width="112" align="left" bgcolor="#CCCCCC">text dohody</th>
    <td width="20">&nbsp;</td>
  </tr>
<?php
$odpoved = mysql_query("select mesto1, mesto2,text, MID(text,1,15) AS texts from townsspo where mesto1 = '".$_SESSION["mestoid"]."' OR  mesto2 = '".$_SESSION["mestoid"]."'");
echo(mysql_error());
while ($row = mysql_fetch_array($odpoved)) {
echo("
  <tr>
    <td>".(profilm($row["mesto1"]))."</td>
    <td>".(profilm($row["mesto2"]))."</td>
    <td><a onclick=\"alert('".$row["text"]."')\">".$row["texts"]."...</a></td>
    <td><a href=\"?del=0\"><img src=\"casti/desing/no.bmp\" width=\"20\" height=\"20\" border=\"0\" /></a></td>
  </tr>
");
}
mysql_free_result($odpoved);


?>
</table>
<br />
Cizí nabídky: <br />
<br />
Vlastní nabídky:<br />
<br />
<form id="form1" name="form1" method="post" action="">
  město:<br />
    <label>
  <input name="mesto" type="text" id="mesto" size="20" />
  </label>
  <br />
Text dohody:<br />
<label>
<textarea name="dohoda" cols="20" rows="10" id="dohoda"></textarea>
</label> 
</form>
*/
?>