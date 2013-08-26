<?php
surovina("kamen","-",100);

mysql_query("UPDATE `towns` SET pozadie = '".$_GET["co"]."' WHERE xc = '".$_GET["xc"]."' AND yc = '".$_GET["yc"]."'");
?>
<a href="?dir=casti/mapa/index.php"><?php echo $xzpet; ?></a>