<?php
if($_POST["pecpr"]){
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsank");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$poradie = $pocet1+1;

alog("new anketa",1);

/*echo*/mysql_query("INSERT INTO `townsank` ( `id` , `autor` , `schvaleno` , `otazka` , `hraci` , `o1` , `p1` , `o2` , `p2` , `o3` , `p3` , `o4` , `p4` , `o5` , `p5` ) 
VALUES (
'$poradie', '".$_SESSION["id"]."', '0', '".$_POST["otazka"]."' , 'p' , '".$_POST["o1"]."' , '0', '".$_POST["o2"]."' , '0', '".$_POST["o3"]."' , '0', '".$_POST["o4"]."' , '0', '".$_POST["o5"]."' , '0'
)");
}

if($_GET["del"]){
mysql_query("DELETE FROM townsank WHERE id = ".$_GET["del"]." AND autor = ".$_SESSION["id"]);
}
?>
<h3>přidat anketu: </h3>
<form id="form1" name="form1" method="post" action="">
  <label><strong>otázka:
  </strong>
  <input name="otazka" type="text" id="otazka" size="55" />
  </label>
  <label></label>
  <br />
  <label><strong>odpověď 1: </strong>
  <input name="o1" type="text" id="o1" size="50" />
  </label>
  <label></label>
  <br />
  <label><strong>odpověď 2: </strong>
  <input name="o2" type="text" id="o2" size="50" />
  </label>
  <label></label>
  <br />
  <label><strong>odpověď 3: </strong>
  <input name="o3" type="text" id="o3" size="50" />
  </label>
  <label></label>
  <br />
  <label><strong>odpověď 4: </strong>
  <input name="o4" type="text" id="o4" size="50" />
  </label>
  <label></label>
  <br />
  <label><strong>odpověď 5: </strong>
  <input name="o5" type="text" id="o5" size="50" />
  </label>
  <label></label>
  <br />
  <strong>přečetl jsem si pravidla  </strong>
  <label>
  <input name="pecpr" type="checkbox" id="pecpr" value="1" />
  <br />
  <input type="submit" name="Submit" value="přidej" />
  </label>
</form>
<h3>vaše anketu: </h3>

<table width="480" border="0">
  <tr bgcolor="#CCCCCC">
    <th width="170" bgcolor="#CCCCCC">otázka</th>
    <th width="166" bgcolor="#CCCCCC">odpovědi</th>
    <th width="80" bgcolor="#CCCCCC">stav</th>
    <td width="46" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
<?php
$odpoved =mysql_query("select * from townsank where autor = '".$_SESSION["id"]."'");
while ($row = mysql_fetch_array($odpoved)) {
if($row["schvaleno"] == "1"){ $stuff = "schváleno"; }else{ $stuff = "čeká na schválení"; }

echo("
  <tr bgcolor=\"#EBEBEB\">
    <td><strong>".$row["otazka"]."</strong></td>
    <td><p><strong>".$row["o1"]."<br />
    ".$row["o2"]."<br />
    ".$row["o3"]."<br />
    ".$row["o4"]."<br />
    ".$row["o5"]."</strong></p></td>
    <td><em><strong>".$stuff."</strong></em></td>
    <td bgcolor=\"#FFFFFF\"><a href=\"?del=".$row["id"]."\"><img src=\"casti/desing/no.bmp\" width=\"20\" height=\"20\" /></a></td>
  </tr>
");
}
mysql_free_result($odpoved);
?>
</table>
<br />
<h3>nápověda &amp; pravidla: </h3>
<p><br />
  1) zákaz používání neslušných slov
  <br />
  2) za každý klik od uživatele na vaši anketu dostanete 10 peněz </p>
