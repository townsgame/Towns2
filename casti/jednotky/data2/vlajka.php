<?php
$odpoved =mysql_query("select vlastnik from towns where xc = ".$xc." AND yc = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$vlastnik = $row["vlastnik"];
}
mysql_free_result($odpoved);

echo("$xtatovlajka ".(profilm($vlastnik)).".");
?>