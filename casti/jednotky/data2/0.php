<?php

//------------------------------------------
$odpoved =mysql_query("select vlastnik from towns where xc = ".($_GET["xc1"]+1)." AND yc = ".$_GET["yc1"]." AND vlastnik='".$_SESSION["mestoid"]."'");
//echo(mysql_error());
while ($row = mysql_fetch_array($odpoved)) { $vlastnik1 = $row["vlastnik"]; }
mysql_free_result($odpoved);
//------------------------------------------
$odpoved =mysql_query("select vlastnik from towns where xc = ".($_GET["xc1"]-1)." AND yc = ".$_GET["yc1"]." AND vlastnik='".$_SESSION["mestoid"]."'");
while ($row = mysql_fetch_array($odpoved)) { $vlastnik2 = $row["vlastnik"]; }
mysql_free_result($odpoved);
//------------------------------------------
$odpoved =mysql_query("select vlastnik from towns where xc = ".$_GET["xc1"]." AND yc = ".($_GET["yc1"]+1)." AND vlastnik='".$_SESSION["mestoid"]."'");
while ($row = mysql_fetch_array($odpoved)) { $vlastnik3 = $row["vlastnik"]; }
mysql_free_result($odpoved);
//------------------------------------------
$odpoved =mysql_query("select vlastnik from towns where xc = ".$_GET["xc1"]." AND yc = ".($_GET["yc1"]-1)." AND vlastnik='".$_SESSION["mestoid"]."'");
while ($row = mysql_fetch_array($odpoved)) { $vlastnik4 = $row["vlastnik"]; }
mysql_free_result($odpoved);
//------------------------------------------

if($vlastnik1 or $vlastnik2 or $vlastnik3 or $vlastnik4){
require("casti/mapa/postavit.php");
}else{
chyba1("Na tomto políčku si nemůžete nic postavit, protože není vedle vaší budovy.");
}
/*
if($_GET["kradez"]==1){

mysql_query("
UPDATE `towns` SET
`vlastnik` = '".$_SESSION["mestoid"]."'
WHERE `xc` =".$_GET["xc"]." AND `yc` =".$_GET["yc"].";
");
chyba2($xtotopolicko);
}else{
chyba1($xprivlastnit);
}
}
?>
<a href="?dir=casti/mapa/policko.php&amp;xc=<?php echo($_GET["xc1"]); ?>&amp;yc=<?php echo($_GET["yc1"]); ?>&amp;kradez=1"><?php echo($xprivlastnitpol); ?></a>
*/
?>