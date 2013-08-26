<strong><?php echo($xnateto); ?></strong><br /> 
<?php
$odpoved =mysql_query("select napis from towns where xc = ".$xc." AND yc = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$napis = $row["napis"];
}
mysql_free_result($odpoved);
echo($napis);
?>