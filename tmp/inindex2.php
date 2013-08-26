<style type="text/css">
<!--
.style1 {color: #FFCC00}
.style10 {color: #FFFF00;
	font-size: 18px;
}
-->
</style>
<table width="855" border="0">
  <tr>
    <td width="164" align="left"><span class="style10"><?php echo $xnejhraci; ?></span></td>
    <td width="164" align="left"><span class="style10"><?php echo $xnejali; ?></span></td>
    <td width="513" height="22" align="left"><span class="style10"><?php echo $xnejmesta; ?></span></td>
  </tr>
  <tr>
    <td width="164" align="left" valign="top" class="style1"><?php
$odpoved =mysql_query("select meno from townsuziv order by body desc,meno LIMIT 0 , 10");
while ($row = mysql_fetch_array($odpoved)) {
echo($row["meno"]."<br/>");
}
mysql_free_result($odpoved);
?></td>
    <td width="164" align="left" valign="top" class="style1"><?php
$odpoved =mysql_query("select meno from townsali order by body desc,meno LIMIT 0 , 10");
while ($row = mysql_fetch_array($odpoved)) {
echo($row["meno"]."<br/>");
}
mysql_free_result($odpoved);
?></td>
    <td width="513" align="left" valign="top" class="style1"><?php
$odpoved =mysql_query("select meno from townsmes order by body desc,meno LIMIT 0 , 10");
while ($row = mysql_fetch_array($odpoved)) {
echo($row["meno"]."<br/>");
}
mysql_free_result($odpoved);
?></td>
  </tr>
</table>
