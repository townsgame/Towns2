<?php
require("casti/funkcie/index.php"); 
if($_SESSION["typ"]!="1"){
die();
}

if($_GET["del"]){
mysql_query("DELETE from townstem WHERE id='".$_GET["del"]."'");
mysql_query("DELETE from townsdis WHERE tema='".$_GET["del"]."'");
}
?>
<table width="654" border="0">
  <tr>
    <th width="31" bgcolor="#CCCCCC"><a href="dis.php">id</a></th>
	<th width="84" bgcolor="#CCCCCC">meno</th>
    <th width="140" bgcolor="#CCCCCC">akce</th>
  </tr>
<?php
$odpoved = mysql_query("select * from townstem");
while ($row = mysql_fetch_array($odpoved)) {
echo("
  <tr>
    <td>".$row["id"]."</td>
    <td>".$row["tema"]."</td>
    <td><a href=\"?del=".$row["id"]."\">smazat</a></td>
  </tr>
");
}
mysql_free_result($odpoved);


?>
</table>
