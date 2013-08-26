<?php
echo("<b>dřevo</b><br/>");
$odpoved =mysql_query("SELECT xc,yc,(SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'les' LIMIT 1),(SELECT towns2.yc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'les' LIMIT 1) from towns where obrazok = 'tdrevo' AND vlastnik = '".$_SESSION["mestoid"]."' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'les' LIMIT 1) ORDER by towns.xc,towns.yc");
while ($row = mysql_fetch_array($odpoved)) {
echo(pxy($row["xc"],$row["yc"])." na ".pxy($row["2"],$row["3"])."<br/>");
}
echo("dohromady ".(mysql_num_rows($odpoved))." <br/>");
mysql_free_result($odpoved);

echo("<b>kámen</b><br/>");
$odpoved =mysql_query("SELECT xc,yc,(SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'kamen' LIMIT 1),(SELECT towns2.yc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'kamen' LIMIT 1) from towns where obrazok = 'tkamen' AND vlastnik = '".$_SESSION["mestoid"]."' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'kamen' LIMIT 1) ORDER by towns.xc,towns.yc");
while ($row = mysql_fetch_array($odpoved)) {
echo(pxy($row["xc"],$row["yc"])." na ".pxy($row["2"],$row["3"])."<br/>");
}
echo("dohromady ".(mysql_num_rows($odpoved))." <br/>");
mysql_free_result($odpoved);


echo("<b>železo</b><br/>");
$odpoved =mysql_query("SELECT xc,yc,(SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'zelezo' LIMIT 1),(SELECT towns2.yc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'zelezo' LIMIT 1) from towns where obrazok = 'tzelezo' AND vlastnik = '".$_SESSION["mestoid"]."' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'zelezo' LIMIT 1) ORDER by towns.xc,towns.yc");
while ($row = mysql_fetch_array($odpoved)) {
echo(pxy($row["xc"],$row["yc"])." na ".pxy($row["2"],$row["3"])."<br/>");
}
echo("dohromady ".(mysql_num_rows($odpoved))." <br/>");
mysql_free_result($odpoved);
?>