<br />
<h1><?php echo $GLOBALS["ssurowiny1"]; ?></h1>
<?php
$cashsz=0;
$cashsk=0;
$cashsd=0;
$cash="";
foreach(hnet2("towns2","SELECT obrazok,xc,yc,(SELECT xc FROM towns2 towns2_2 WHERE  IF(towns2.obrazok='tdrevo','les',IF(towns2.obrazok='tzelezo','zelezo','kamen')) = towns2_2.obrazok ORDER BY sqrt(pow(towns2_2.xc-towns2.xc,2)+pow(towns2_2.yc-towns2.yc,2)) LIMIT 0,1),(SELECT yc FROM towns2 towns2_2  WHERE IF(towns2.obrazok='tdrevo','les',IF(towns2.obrazok='tzelezo','zelezo','kamen')) = towns2_2.obrazok ORDER BY sqrt(pow(towns2_2.xc-towns2.xc,2)+pow(towns2_2.yc-towns2.yc,2)) LIMIT 0,1) FROM towns2 WHERE (obrazok='tkamen' OR obrazok='tzelezo' OR obrazok='tdrevo') AND vlastnik='".$_SESSION["id"]."' ORDER by obrazok,xc,yc") as $row){
$vzdalenost = ((intval(0.5+(10*(sqrt(pow($row[3]-$row["xc"],2)+pow($row[4]-$row["yc"],2))))))/10);
if($vzdalenost != 0){
$surovin = intval((100/$vzdalenost)+0.5);

if($row["obrazok"] == "tzelezo"){ $typxx = $GLOBALS["sviac4"]; $cashsz=$cashsz+$surovin; }
if($row["obrazok"] == "tkamen"){ $typxx = $GLOBALS["sviac3"]; $cashsk=$cashsk+$surovin; }
if($row["obrazok"] == "tdrevo"){ $typxx = $GLOBALS["sviac5"]; $cashsd=$cashsd+$surovin; }

$cash = $cash.("
<tr>
<td>".$typxx."</td>
<td>".qpxy($row["xc"],$row["yc"])."</td>
<td>".qpxy($row[3],$row[4])."</td>
<td>".$vzdalenost."</td>
<td>".$surovin."</td>
</tr>
");
}
}
echo("<b>" . $GLOBALS["sviac3"] . ": </b>".$cashsk." + 20<br />");
echo("<b>" . $GLOBALS["sviac4"] . ": </b>".$cashsz." + 20<br />");
echo("<b>" . $GLOBALS["sviac5"] . ": </b>".$cashsd." + 20");
//<td><a href=\"".gv("?dir=casti/mapa/dragzprac.php&coco=0&coxc=".$row["xc"]."&coyc=".$row["yc"]."")."\">zbourat budovu</a></td>
/*
za hod:
100/vzdalenost
echo("<h1>dřevo</h1><br />");
$odpoved =mysql_query("SELECT xc,yc,(SELECT towns2_2.xc  FROM towns2_ towns2_2 WHERE sqrt(pow(towns2_2.xc-towns2_.xc,2)+pow(towns2_2.yc-towns2_.yc,2)) < 10 AND towns2_2.obrazok = 'les' LIMIT 1),(SELECT towns2_2.yc  FROM towns2_ towns2_2 WHERE sqrt(pow(towns2_2.xc-towns2_.xc,2)+pow(towns2_2.yc-towns2_.yc,2)) < 10 AND towns2_2.obrazok = 'les' LIMIT 1) from towns2_ where obrazok = 'tdrevo' AND vlastnik = '".$_SESSION["mestoid"]."' AND (SELECT towns2_2.xc  FROM towns2_ towns2_2 WHERE sqrt(pow(towns2_2.xc-towns2_.xc,2)+pow(towns2_2.yc-towns2_.yc,2)) < 10 AND towns2_2.obrazok = 'les' LIMIT 1) ORDER by towns2_.xc,towns2_.yc");
while ($row = mysql_fetch_array($odpoved)) {
echo(pxy($row["xc"],$row["yc"])." na ".pxy($row["2"],$row["3"])."<br />");
}
echo("dohromady ".(mysql_num_rows($odpoved))." <br />");
mysql_free_result($odpoved);

echo("<h1>kámen</h1><br />");
$odpoved =mysql_query("SELECT xc,yc,(SELECT towns2_2.xc  FROM towns2_ towns2_2 WHERE sqrt(pow(towns2_2.xc-towns2_.xc,2)+pow(towns2_2.yc-towns2_.yc,2)) < 10 AND towns2_2.obrazok = 'kamen' LIMIT 1),(SELECT towns2_2.yc  FROM towns2_ towns2_2 WHERE sqrt(pow(towns2_2.xc-towns2_.xc,2)+pow(towns2_2.yc-towns2_.yc,2)) < 10 AND towns2_2.obrazok = 'kamen' LIMIT 1) from towns2_ where obrazok = 'tkamen' AND vlastnik = '".$_SESSION["mestoid"]."' AND (SELECT towns2_2.xc  FROM towns2_ towns2_2 WHERE sqrt(pow(towns2_2.xc-towns2_.xc,2)+pow(towns2_2.yc-towns2_.yc,2)) < 10 AND towns2_2.obrazok = 'kamen' LIMIT 1) ORDER by towns2_.xc,towns2_.yc");
while ($row = mysql_fetch_array($odpoved)) {
echo(pxy($row["xc"],$row["yc"])." na ".pxy($row["2"],$row["3"])."<br />");
}
echo("dohromady ".(mysql_num_rows($odpoved))." <br />");
mysql_free_result($odpoved);


echo("<h1>železo</h1><br />");
$odpoved =mysql_query("SELECT xc,yc,(SELECT towns2_2.xc  FROM towns2_ towns2_2 WHERE sqrt(pow(towns2_2.xc-towns2_.xc,2)+pow(towns2_2.yc-towns2_.yc,2)) < 10 AND towns2_2.obrazok = 'zelezo' LIMIT 1),(SELECT towns2_2.yc  FROM towns2_ towns2_2 WHERE sqrt(pow(towns2_2.xc-towns2_.xc,2)+pow(towns2_2.yc-towns2_.yc,2)) < 10 AND towns2_2.obrazok = 'zelezo' LIMIT 1) from towns2_ where obrazok = 'tzelezo' AND vlastnik = '".$_SESSION["mestoid"]."' AND (SELECT towns2_2.xc  FROM towns2_ towns2_2 WHERE sqrt(pow(towns2_2.xc-towns2_.xc,2)+pow(towns2_2.yc-towns2_.yc,2)) < 10 AND towns2_2.obrazok = 'zelezo' LIMIT 1) ORDER by towns2_.xc,towns2_.yc");
while ($row = mysql_fetch_array($odpoved)) {
echo(pxy($row["xc"],$row["yc"])." na ".pxy($row["2"],$row["3"])."<br />");
}
echo("dohromady ".(mysql_num_rows($odpoved))." <br />");
mysql_free_result($odpoved);
*/
?>
<h1><?php echo $GLOBALS["ssurowiny2"]; ?></h1>
<table  width="570">
<tr bgcolor="#dddddd">
<th><?php echo $GLOBALS["ssurowiny3"]; ?></th>
<th><?php echo $GLOBALS["ssurowiny4"]; ?></th>
<th><?php echo $GLOBALS["ssurowiny5"]; ?></th>
<th><?php echo $GLOBALS["ssurowiny6"]; ?></th>
<th><?php echo $GLOBALS["ssurowiny7"]; ?></th>
</tr>

<?php echo($cash); ?>

</table>