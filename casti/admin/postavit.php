<?php
/*echo*/$odpoveda =mysql_query("select * from townsuni where obrazok = '".$_GET["co"]."'");
//echo(mysql_error());
while ($row = mysql_fetch_array($odpoveda)) {
eval($row["stavanie"]);

if(zsur("drevo",$row["drevo"]) and zsur("kamen",$row["kamen"])){
if(!$nie){



surovina("drevo","-",$row["drevo"]);
surovina("kamen","-",$row["kamen"]);

mysql_query("UPDATE `towns` SET obrazok = '".$_GET["co"]."', vlastnik = '".$_SESSION["mestoid"]."' WHERE xc = '".$_GET["xc"]."' AND yc = '".$_GET["yc"]."'");
mysql_query("UPDATE `towns` SET zivot = (SELECT zivot from townsuni WHERE townsuni.obrazok = towns.obrazok),cas = '2', casovac= '".time()."' +(SELECT casovac2 FROM townsuni WHERE obrazok = '".$_GET["co"]."') WHERE xc = '".$_GET["xc"]."' AND yc = '".$_GET["yc"]."'");

chyba2($xpostaveno);
}else{
chyba1($nie);
}
}else{
chyba1($xnedostateksur);
}
}

mysql_free_result($odpoveda);




?>
 <a href="?dir=casti/mapa/index.php"><?php echo $xzpet; ?></a>