<?php
$quit = 0;

$xc = $_SESSION["xc"]+$_SESSION["nove"];
$yc = $_SESSION["yc"]+$_SESSION["novey"];

$_SESSION["nove"]=$_SESSION["nove"]+1;
if($_SESSION["nove"]==$_SESSION["zoom"]+1){
  $_SESSION["nove"] = 1;
  $_SESSION["novey"] = $_SESSION["novey"]+1;
}

$odpoved =mysql_query("select pozadie from towns where xc = ".($xc-1)." AND yc = ".($yc-1));

while ($row = mysql_fetch_array($odpoved)) {
echo("../jednotky/let/pozadie/".$row["pozadie"]."/index.gif"); 

$quit = 1;
}

mysql_free_result($odpoved);
if(!$quit){
echo("../jednotky/let/pozadie/0/index.gif"); 
}

?>
