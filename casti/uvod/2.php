<br />
<style type="text/css">
<!--
.online {color: #000000}
.xchotina {color: #004400}
.xten {color: #008800}
.xdyten {color: #00cc00}
.xoffline {color: #00ff00}
-->
</style>
<div align="center"><table width="570" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th bgcolor="#CCCCCC" scope="col" width="1"></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["afourth5"]; ?></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["ssurowiny3"]; ?></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["uvsecond1"]; ?></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["ssurowiny4"]; ?></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["htmlindex4"]; ?></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["sviac7"]; ?></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["sviac6"]; ?></th>
  </tr>
  <?php
if(!$_SESSION["statuziv"]){
$odpoved =mysql_query("select poradie from townsuziv WHERE id='".$_SESSION["id"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$_SESSION["statuziv"] = $row[0]-10;
}
mysql_free_result($odpoved);
}
 
  
  
if($_MYGET["statuziv"]){
$_SESSION["statuziv"] = $_MYGET["statuziv"];
}
if($_SESSION["statuziv"] < 2){
$_SESSION["statuziv"] = 1;
}
$statuziv = $_SESSION["statuziv"];

//$spesl="(SELECT meno FROM townsmes WHERE id = (SELECT townsmesuziv.mesto FROM townsmesuziv WHERE townsmesuziv.uzivatel = townsuziv.id LIMIT 1 ))";
//$odpoved =mysql_query("select id,meno,poradie,ali,body,typ,farba from townsuziv WHERE poradie!= 0 order by poradie LIMIT ".($statuziv-1).",20");
//echo(mysql_error());
//while ($row = mysql_fetch_array($odpoved)) {

$dotaz = ("SELECT id,meno,poradie,ali,body,typ,farba,hlbudovaxc,hlbudovayc,ludia,ludiamax FROM townsuziv WHERE ppp AND poradie!= 0 order by poradie");
foreach(hnet2("townsuziv",$dotaz,($statuziv-1).",20") as $row){

if($_SESSION["id"]==$row["id"]){
$bg = "CCCCCC";
}else{
$bg = "FFFFFF";
}

//poradie
//jméno
//typ
//aktivita
//pozice
//aliance
//populace
//body

echo("
  <tr>
      <th bgcolor=\"#$bg\" scope=\"col\">".$row["poradie"]."</th>
    <th bgcolor=\"#$bg\" scope=\"col\">".profilid($row["id"],$row["meno"],$row["farba"])."</th>
    <th bgcolor=\"#$bg\" scope=\"col\">".(typuziv($row["typ"]))."</th>
	<th bgcolor=\"#$bg\" scope=\"col\">".(aktivita($row["id"]))."</th>
	<th bgcolor=\"#$bg\" scope=\"col\">".(qmpxy($row["hlbudovaxc"],$row["hlbudovayc"]))."</th>
    <th bgcolor=\"#$bg\" scope=\"col\">".(profila($row["ali"]))."</th>
	<th bgcolor=\"#$bg\" scope=\"col\">".($row["ludia"]."/".$row["ludiamax"])."</th>
    <th bgcolor=\"#$bg\" scope=\"col\">".(zformatovat($row["body"]))."</th>
  </tr>
");

}
//mysql_free_result($odpoved);
?>
</table>
<?php
$max = hnet("townsuziv","SELECT COUNT(id) FROM townsuziv WHERE ppp AND poradie!= 0");

if(($statuziv-20) < 0){}else{ $prve = "<a href=\"".gv("?statuziv=".($statuziv-20)."")."\">&lt;&lt;</a>"; }
if(($statuziv+20) > $max){}else{ $druhe = "<a href=\"".gv("?statuziv=".($statuziv+20)."")."\">&gt;&gt;</a>"; }

echo($prve."--".$druhe);
?></div>