<?php
require("casti/funkcie/index.php"); 
if($_SESSION["typ"]!="1"){
die();
}



function mestaa($a){


$odpoved = mysql_query("select townsmes.id,townsmes.meno, townsmesuziv.prava from townsmes,townsmesuziv WHERE townsmesuziv.uzivatel = $a and townsmesuziv.mesto = townsmes.id");
echo(mysql_error());
while ($row = mysql_fetch_array($odpoved)) {
echo $row["meno"]." (".$row["prava"]." / ".$row["id"].")<a href=\"?delu=$a&amp;delm=".$row["id"]."\">smazat</a>/ ";
}
mysql_free_result($odpoved);
}





if($_GET["delu"]){
/*echo*/mysql_query("DELETE from townsmesuziv WHERE uzivatel='".$_GET["delu"]."' AND mesto='".$_GET["delm"]."'");
}
if($_GET["del"]){
$odpoved = mysql_query("select townsmes.id,townsmes.meno, townsmesuziv.prava from townsmes,townsmesuziv WHERE townsmesuziv.uzivatel = '".$_GET["del"]."' and townsmesuziv.mesto = townsmes.id");
while ($row = mysql_fetch_array($odpoved)) {
mysql_query("DELETE from townsmes WHERE id='".$row["id"]."'");
mysql_query("UPDATE towns2 SET obrazok='0' , cas='1' , vlastnik='1' WHERE vlastnik='".$row["id"]."'");
}
mysql_free_result($odpoved);
mysql_query("DELETE from townsuziv WHERE id='".$_GET["del"]."'");
mysql_query("DELETE from townszpr WHERE komu='".$_GET["del"]."'");
mysql_query("DELETE from townsmesuziv WHERE uzivatel='".$_GET["del"]."'");
}
?>
<table width="654" border="0">
  <tr>
    <th width="31" bgcolor="#CCCCCC"><a href="users.php">id</a></th>
	<th width="84" bgcolor="#CCCCCC"></th>
    <th width="84" bgcolor="#CCCCCC"></th>
    <th width="293" bgcolor="#CCCCCC"></th>
    <th width="140" bgcolor="#CCCCCC"></th>
  </tr>
<?php
$odpoved = mysql_query("select * from townsuziv");
while ($row = mysql_fetch_array($odpoved)) {
echo("
  <tr>
    <td>".$row["id"]."</td>
    <td>".$row["meno"]."</td>
    <td>".(typuziv($row["typ"]))."</td>
    <td>");
mestaa($row["id"]);
echo("</td>
    <td><a href=\"?del=".$row["id"]."\">smazat</a></td>
  </tr>
");
}
mysql_free_result($odpoved);


?>
</table>
