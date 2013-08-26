<?php
//$xc = $_GET["xc"];
//$yc = $_GET["yc"];
$quit = 0;


$odpoved =mysql_query("select * from towns where xc = ".$xc." AND yc = ".$yc);

while ($row = mysql_fetch_array($odpoved)) {

$hrac = $row["vlastnik"];
$obrazok = $row["obrazok"];
$cas = $row["cas"];

  $quit = 1;
}

mysql_free_result($odpoved);
if(!$quit){
die("$xtadysenada  <a href=\"?dir=casti/mapa/link.txt\">zpět</a>");
}

if($obrazok){
if($cas == 1){
require("casti/mapa/zbourat.php");
}else{
if($cas == 2){
echo($xtatobudovax1);
}else{
echo($xtatobudovax2);
}
}
}else{
require("casti/mapa/postavit.php");
}
?>