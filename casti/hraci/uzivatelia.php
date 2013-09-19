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
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["mbuild1"]; ?></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["ssurowiny3"]; ?></th>
<?php /*<th bgcolor="#CCCCCC" scope="col">aktivita</th>*/ ?>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["ssurowiny4"]; ?></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["htmlindex4"]; ?></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["sviac7"]; ?></th>
    <th bgcolor="#CCCCCC" scope="col"><?php echo $GLOBALS["sviac6"]; ?></th>
  </tr>
  <?php
//if(!$_SESSION["statuziv"]){ }
//$tmp = vyberhraca();
if(!$tmp){ $tmp = $_SESSION["id"]; }
if($_SESSION["id"]){
$_SESSION["statuziv"] = hnet("towns2_uziv","select poradie from towns2_uziv WHERE id=".$_SESSION["id"])-10;
}/*$odpoved =mysql_query("select poradie from towns2_uziv WHERE id='".$_SESSION["id"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$_SESSION["statuziv"] = $row[0]-10;
}
mysql_free_result($odpoved);
}*/
 
  
  
if($_MYGET["statuziv"]){
$_SESSION["statuziv"] = $_MYGET["statuziv"];
}
if($_SESSION["statuziv"] < 2){
$_SESSION["statuziv"] = 1;
}
$statuziv = $_SESSION["statuziv"];

//$spesl="(SELECT meno FROM towns2_mes WHERE id = (SELECT towns2_mesuziv.mesto FROM towns2_mesuziv WHERE towns2_mesuziv.uzivatel = towns2_uziv.id LIMIT 1 ))";
//$odpoved =mysql_query("select id,meno,poradie,ali,body,typ,farba from towns2_uziv WHERE poradie!= 0 order by poradie LIMIT ".($statuziv-1).",20");
//echo(mysql_error());
//while ($row = mysql_fetch_array($odpoved)) {

$dotaz = ("SELECT id,meno,poradie,ali,body,typ,farba,hlbudovaxc,hlbudovayc,ludia,ludiamax FROM towns2_uziv WHERE ppp AND poradie!= 0 AND meno LIKE '%".$_POST["zadanyhrac"]."%' order by if(id=0".$_SESSION["id"].",poradie-0.5,poradie)");
foreach(hnet2("towns2_uziv",$dotaz,($statuziv-1).",20") as $row){

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
if($row["id"] != "0"){
echo("
  <tr>
      <td bgcolor=\"#$bg\" scope=\"col\">".($row["poradie"])."</td>
    <td bgcolor=\"#$bg\" scope=\"col\">".profilid($row["id"],$row["meno"],$row["farba"])."</td>
    <td bgcolor=\"#$bg\" scope=\"col\">".(typuziv($row["typ"]))."</td>
	"/*<td bgcolor=\"#$bg\" scope=\"col\">".(aktivita($row["id"]))."</td>*/."
	<td bgcolor=\"#$bg\" scope=\"col\">".(qpxy($row["hlbudovaxc"],$row["hlbudovayc"]))."</td>
    <td bgcolor=\"#$bg\" scope=\"col\">".(profila($row["ali"]))."</td>
	<td bgcolor=\"#$bg\" scope=\"col\">".($row["ludia"]."/".$row["ludiamax"])."</td>
    <td bgcolor=\"#$bg\" scope=\"col\">".(zformatovat($row["body"]))."</td>
  </tr>
");
}
}
//mysql_free_result($odpoved);
?>
</table>
<?php
$max = hnet("towns2_uziv","SELECT COUNT(id) FROM towns2_uziv WHERE ppp AND poradie!= 0");

if(($statuziv-20) < -19 and 1==0){}else{ $prve = "<a href=\"".gv("?statuziv=".($statuziv-20)."")."\">&lt;&lt;</a>"; }
if(($statuziv+20) > $max+19 and 1==0){}else{ $druhe = "<a href=\"".gv("?statuziv=".($statuziv+20)."")."\">&gt;&gt;</a>"; }

echo("<b>".$prve."--".$druhe."</b>");
?></div>  <!--<form method="POST"><?php zadajhraca(); ?><input type="submit" name="Submit" value="hledat" /></form>-->