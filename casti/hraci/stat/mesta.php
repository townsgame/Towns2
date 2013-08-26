<a href="?dir=casti/hraci/stat/index.php">hráči</a> | <a href="?dir=casti/hraci/stat/mesta.php">města</a> | <a href="?dir=casti/hraci/stat/global.php">globálně</a> <br />
<table width="401" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th width="139" bgcolor="#CCCCCC" scope="col">jméno</th>
    <th width="122" bgcolor="#CCCCCC" scope="col">popis</th>
    <th width="112" bgcolor="#CCCCCC" scope="col">body</th>
  </tr>
  <?php
$odpoved =mysql_query("select meno,kpopis,body from townsuziv order by body");
while ($row = mysql_fetch_array($odpoved)) {
if($_SESSION["uzivatel"]==$row["meno"]){
$bg = "EEEEEE";
}else{
$bg = "FFFFFF";
}
echo("
  <tr>
    <th bgcolor=\"#$bg\" scope=\"col\"><a href=\"?dir=casti/hraci/profil.php&amp;meno=".$row["meno"]."\">".$row["meno"]."</a></th>
    <th bgcolor=\"#$bg\" scope=\"col\">".$row["kpopis"]."</th>
    <th bgcolor=\"#$bg\" scope=\"col\">".$row["body"]."</th>
  </tr>
");

}
mysql_free_result($odpoved);
?>
</table>
