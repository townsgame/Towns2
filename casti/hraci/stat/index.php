<a href="?dir=casti/hraci/stat/index.php">hráči</a> | <a href="?dir=casti/hraci/stat/mesta.php">města</a> | <a href="?dir=casti/hraci/stat/global.php">globálně</a> <br />
<table width="340" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th width="144" background="casti/diskuse/abc.JPG" scope="col">jméno</th>
    <th width="118" background="casti/diskuse/abc.JPG" scope="col">body</th>
    <th width="66" background="casti/diskuse/abc.JPG" scope="col">id</th>
	<th width="8" scope="col">&nbsp;</th>
  </tr>
  <?php
$odpoved =mysql_query("select * from townsuziv order by body");
while ($row = mysql_fetch_array($odpoved)) {
if($_SESSION["uzivatelid"]==$row["id"]){
$bg = "EEEEEE";
}else{
$bg = "FFFFFF";
}
echo("
  <tr>
    <th bgcolor=\"#$bg\" scope=\"col\"><a href=\"?dir=casti/hraci/profil.php&amp;meno=".$row["meno"]."\">".$row["meno"]."</a></th>
    <th bgcolor=\"#$bg\" scope=\"col\">".$row["body"]."</th>
    <th bgcolor=\"#$bg\" scope=\"col\">".$row["id"]."</th>
    <td scope=\"col\"><img src=\"casti/desing/bodky/6.jpg\" alt=\"x\" width=\"15\" height=\"15\" /></td>
  </tr>
");

}
mysql_free_result($odpoved);
?>
</table>
