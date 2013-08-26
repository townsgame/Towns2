<?php
require("casti/funkcie/index.php");

$odpoved =mysql_query("SELECT (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'les' LIMIT 1),(SELECT towns2.yc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'les' LIMIT 1) from towns where obrazok = 'tdrevo' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'les' LIMIT 1) ORDER by towns.xc,towns.yc");
while ($row = mysql_fetch_array($odpoved)) {
mysql_query("UPDATE towns SET obrazok = '0' WHERE xc=".$row[0]." and yc=".$row[1]);
}
$kolko = mysql_num_rows($odpoved);
mysql_free_result($odpoved);

if(rand(1,2) == 1){
$xcxc = "+1";
}else{
$xcxc = "-1";
}
if(rand(1,2) == 1){
$ycyc = "+1";
}else{
$ycyc = "-1";
}


$odpoved =mysql_query("SELECT 1,xc,yc FROM towns WHERE obrazok = '0' AND (SELECT obrazok From towns towns2 WHERE obrazok = 'les' AND towns2.xc = towns.xc$xcxc and towns2.yc = towns.yc$ycyc)='les' UNION SELECT 2,xc,yc FROM towns WHERE obrazok='0' ORDER BY 1,rand() LIMIT 0,$kolko");
while ($row = mysql_fetch_array($odpoved)) {

mysql_query("UPDATE towns SET obrazok = 'les' WHERE xc=".$row["xc"]." and yc=".$row["yc"]);
echo(pxy($row["xc"],$row["yc"]));
}
mysql_free_result($odpoved);


$odpoved =mysql_query("SELECT (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'kamen' LIMIT 1),(SELECT towns2.yc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'kamen' LIMIT 1) from towns where obrazok = 'tkamen' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'kamen' LIMIT 1) ORDER by towns.xc,towns.yc");
while ($row = mysql_fetch_array($odpoved)) {
mysql_query("UPDATE towns SET obrazok = '0' WHERE xc=".$row[0]." and yc=".$row[1]);
}
$kolko = mysql_num_rows($odpoved);
mysql_free_result($odpoved);

if(rand(1,2) == 1){
$xcxc = "+1";
}else{
$xcxc = "-1";
}
if(rand(1,2) == 1){
$ycyc = "+1";
}else{
$ycyc = "-1";
}


$odpoved =mysql_query("SELECT 1,xc,yc FROM towns WHERE obrazok = '0' AND (SELECT obrazok From towns towns2 WHERE obrazok = 'kamen' AND towns2.xc = towns.xc$xcxc and towns2.yc = towns.yc$ycyc)='kamen' UNION SELECT 2,xc,yc FROM towns WHERE obrazok='0' ORDER BY 1,rand() LIMIT 0,$kolko");
while ($row = mysql_fetch_array($odpoved)) {

mysql_query("UPDATE towns SET obrazok = 'kamen' WHERE xc=".$row["xc"]." and yc=".$row["yc"]);
echo(pxy($row["xc"],$row["yc"]));
}
mysql_free_result($odpoved);


$odpoved =mysql_query("SELECT (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'zelezo' LIMIT 1),(SELECT towns2.yc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'zelezo' LIMIT 1) from towns where obrazok = 'tzelezo' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'zelezo' LIMIT 1) ORDER by towns.xc,towns.yc");
while ($row = mysql_fetch_array($odpoved)) {
mysql_query("UPDATE towns SET obrazok = '0' WHERE xc=".$row[0]." and yc=".$row[1]);
}
$kolko = mysql_num_rows($odpoved);
mysql_free_result($odpoved);

if(rand(1,2) == 1){
$xcxc = "+1";
}else{
$xcxc = "-1";
}
if(rand(1,2) == 1){
$ycyc = "+1";
}else{
$ycyc = "-1";
}


$odpoved =mysql_query("SELECT 1,xc,yc FROM towns WHERE obrazok = '0' AND (SELECT obrazok From towns towns2 WHERE obrazok = 'zelezo' AND towns2.xc = towns.xc$xcxc and towns2.yc = towns.yc$ycyc)='zelezo' UNION SELECT 2,xc,yc FROM towns WHERE obrazok='0' ORDER BY 1,rand() LIMIT 0,$kolko");
while ($row = mysql_fetch_array($odpoved)) {

mysql_query("UPDATE towns SET obrazok = 'zelezo' WHERE xc=".$row["xc"]." and yc=".$row["yc"]);
echo(pxy($row["xc"],$row["yc"]));
}
mysql_free_result($odpoved);


?>