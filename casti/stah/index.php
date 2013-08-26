<br/>
Zde si můžete zahrát hry nesouvisející s towns:
<table border="0">
  <tr>
    <th width="134" bgcolor="#CCCCCC">Jméno:</th>
    <th width="130" bgcolor="#CCCCCC">Autor:</th>
    <th width="300" bgcolor="#CCCCCC">Akce:</th>
  </tr>
<?php 
$odpoved =mysql_query("select id,meno,popis,autor from towns2_sta order by id desc");
while ($row = mysql_fetch_array($odpoved)) {
$autor = profil($row["autor"]);


echo("
  <tr>
    <td bgcolor=\"#dddddd\"><a href=\"".gv("?dir=casti/stah/hra.php&amp;hra=".$row["id"]."")."\">".$row["meno"]."</a></td>
    <td bgcolor=\"#dddddd\">".(profil($row["autor"]))."</td>
    <td bgcolor=\"#dddddd\">".$row["popis"]."</td>
  </tr>
");

}
mysql_free_result($odpoved);
?>
</table>