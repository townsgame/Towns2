<?php include("casti/jednotky/data/$obrazok.php"); ?>
<?php
$odpoved =mysql_query("select uroven from towns where xc = ".$xc." AND yc = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$uroven = $row["uroven"]+1;
}
mysql_free_result($odpoved);
?>
<?php
if($_GET["uroven"]){ 
mysql_query("UPDATE towns SET uroven = '$uroven' WHERE xc=$xc AND yc=$yc");
}
?>



<?php /* <h3><a href="?dir=casti/mapa/policko.php&amp;uroven=1&amp;xc=<?php echo($xc); ?>&amp;yc=<?php echo($yc); ?>">rozšířit na úroveň <?php echo($uroven); ?></a></h3> */ ?>
<h3><a href="?dir=casti/admin/smazat.php&amp;xc=<?php echo($xc); ?>&amp;yc=<?php echo($yc); ?>"><?php echo $xzbourattutobudovu; ?></a></h3>
