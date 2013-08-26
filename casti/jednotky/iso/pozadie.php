<?php
$quit = 0;


//echo("../jednotky/iso/pozadie/trava/index.gif"); 

//*
$xc = $_SESSION["xcs"]+$_SESSION["nove"];
$yc = $_SESSION["ycs"]+$_SESSION["novey"];

$_SESSION["nove"]=$_SESSION["nove"]+1;
if($_SESSION["nove"]==$_SESSION["zooms"]+1){
  $_SESSION["nove"] = 1;
  $_SESSION["novey"] = $_SESSION["novey"]+1;
}

$odpoved =mysql_query("select pozadie from towns where xc = ".($xc-1)." AND yc = ".($yc-1));

while ($row = mysql_fetch_array($odpoved)) {
echo("../jednotky/iso/pozadie/".$row["pozadie"]."/index.gif"); 

$quit = 1;
}

mysql_free_result($odpoved);
if(!$quit){
echo("../jednotky/iso/pozadie/0/index.gif"); 
}
//*/
?>
