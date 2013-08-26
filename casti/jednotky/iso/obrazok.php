<?php
$quit = 0;

$xc=$xc-1;
$yc=$yc-1;

//echo("($xc,$yc)");
$odpoved =mysql_query("select obrazok,cas,rand from towns where xc = ".$xc." AND yc = ".$yc);

while ($row = mysql_fetch_array($odpoved)) {
if($row["cas"]==1){
$cislo=$row["rand"];
}
if($row["cas"]==2){
$cislo="6";
}
if($row["cas"]==3 or $row["cas"]==4){
$cislo="7";
}

	echo("../jednotky/iso/obrazky/".$row["obrazok"]."/$cislo.gif"); 



  $quit = 1;
}

mysql_free_result($odpoved);
if(!$quit){
	echo("../jednotky/iso/obrazky/0.gif"); 
}

?>
